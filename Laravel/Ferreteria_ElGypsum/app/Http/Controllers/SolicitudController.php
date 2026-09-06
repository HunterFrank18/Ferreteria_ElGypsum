<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use App\Models\Solicitud;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SolicitudController extends Controller
{
    private const SELLER_PHONE = '505865023595';

    public function store(Request $request)
    {
        $data = $request->validate([
            'tipo' => 'required|in:cotizacion,apartado',
            'cliente_nombre' => 'required|string|max:120',
            'cliente_telefono' => 'required|string|max:30',
            'cliente_correo' => 'nullable|email|max:160',
            'nota' => 'nullable|string|max:1000',
            'items' => 'required|array|min:1',
            'items.*.id' => 'required|integer',
            'items.*.cantidad' => 'required|integer|min:1|max:999',
            'items.*.titulo' => 'nullable|string|max:180',
            'items.*.precio' => 'nullable|numeric|min:0',
        ]);

        $prefix = $data['tipo'] === 'apartado' ? 'APT' : 'PRO';
        $codigo = $this->makeCode($prefix);

        $solicitud = Solicitud::create([
            'codigo' => $codigo,
            'tipo' => $data['tipo'],
            'estado' => 'nueva',
            'cliente_nombre' => $data['cliente_nombre'],
            'cliente_telefono' => $data['cliente_telefono'],
            'cliente_correo' => $data['cliente_correo'] ?? null,
            'nota' => $data['nota'] ?? null,
            'total' => 0,
            'expires_at' => $data['tipo'] === 'apartado'
                ? now()->addHours(48)
                : now()->addDays(7),
        ]);

        $total = 0;

        foreach ($data['items'] as $item) {
            $variant = ProductVariant::with(['product', 'brand'])->find($item['id']);
            $quantity = (int) $item['cantidad'];
            $price = $variant ? (float) $variant->price : (float) ($item['precio'] ?? 0);
            $subtotal = $price * $quantity;

            $solicitud->detalles()->create([
                'product_variant_id' => $variant?->id,
                'product_name' => $variant?->product?->name ?? $item['titulo'] ?? 'Producto no disponible',
                'brand_name' => $variant?->brand?->name,
                'presentation' => $variant?->presentation,
                'color' => $variant?->color,
                'sku' => $variant?->sku,
                'quantity' => $quantity,
                'price' => $price,
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }

        $solicitud->update(['total' => $total]);
        $solicitud->load('detalles');

        $pdfPath = $this->storePdf($solicitud);
        $whatsappUrl = $this->makeWhatsappUrl($solicitud);

        $solicitud->update([
            'pdf_path' => $pdfPath,
            'whatsapp_url' => $whatsappUrl,
            'notified_at' => now(),
        ]);

        return response()->json([
            'ok' => true,
            'codigo' => $solicitud->codigo,
            'download_url' => route('solicitudes.pdf', $solicitud->codigo),
            'whatsapp_url' => $whatsappUrl,
            'admin_message' => 'Solicitud creada correctamente.',
        ]);
    }

    public function download(Solicitud $solicitud)
    {
        abort_unless($solicitud->pdf_path && Storage::disk('public')->exists($solicitud->pdf_path), 404);

        return Storage::disk('public')->download(
            $solicitud->pdf_path,
            $solicitud->codigo . '.pdf'
        );
    }

    private function makeCode(string $prefix): string
    {
        do {
            $code = $prefix . '-' . now()->format('Ymd') . '-' . Str::upper(Str::random(5));
        } while (Solicitud::where('codigo', $code)->exists());

        return $code;
    }

    private function storePdf(Solicitud $solicitud): string
    {
        $pdf = Pdf::loadView('tienda.pdf.solicitud', compact('solicitud'))
            ->setPaper('letter', 'portrait');

        $path = 'solicitudes/' . $solicitud->codigo . '.pdf';
        Storage::disk('public')->put($path, $pdf->output());

        return $path;
    }

    private function makeWhatsappUrl(Solicitud $solicitud): string
    {
        $type = $solicitud->tipo === 'apartado' ? 'apartado' : 'proforma';
        $message = "Hola Eliezer, soy {$solicitud->cliente_nombre}.\n";
        $message .= "Telefono: {$solicitud->cliente_telefono}\n";
        $message .= "Acabo de realizar una {$type}.\n";
        $message .= "Codigo: {$solicitud->codigo}\n";
        $message .= "Total: C$ " . number_format((float) $solicitud->total, 2) . "\n";
        $message .= "PDF: " . route('solicitudes.pdf', $solicitud->codigo);

        return 'https://wa.me/' . self::SELLER_PHONE . '?text=' . rawurlencode($message);
    }
}
