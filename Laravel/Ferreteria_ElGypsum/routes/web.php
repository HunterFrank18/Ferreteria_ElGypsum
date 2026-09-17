<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\CorteCajaController;
use App\Http\Controllers\Admin\PagoController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\SolicitudController as AdminSolicitudController;
use App\Http\Controllers\Admin\VentaController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudController;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Http\Controllers\Admin\UserRoleController;
use Illuminate\Support\Facades\Route;
Route::get('/debug-views', function () { return response()->json(scandir(resource_path('views/admin'))); });

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('tienda.index');
})->name('home');

Route::get('/index', function () {
    return view('tienda.index');
});

Route::get('/lomasnuevo', function () {
    $productos = Product::with(['category', 'variants.brand'])
        ->where('status', 1)
        ->latest()
        ->take(8)
        ->get();

    return view('tienda.lomasnuevo', compact('productos'));
});

Route::get('/compra', function () {
    return view('tienda.compra');
});

Route::post('/solicitudes', [SolicitudController::class, 'store'])->name('solicitudes.store');
Route::get('/solicitudes/{solicitud:codigo}/pdf', [SolicitudController::class, 'download'])->name('solicitudes.pdf');


Route::get('/paint', function () {
    $productos = Product::with([
            'category',
            'variants' => function ($query) {
                $query->with('brand')
                    ->where('stock', '>', 0)
                    ->orderBy('presentation')
                    ->orderBy('price');
            }
        ])
        ->where('status', 1)
        ->whereHas('category', function ($query) {
            $query->where('name', 'Pinturas');
        })
        ->whereHas('variants', function ($query) {
            $query->where('stock', '>', 0);
        })
        ->orderBy('name')
        ->get();

    return view('tienda.paint', compact('productos'));
});

Route::get('/screw', function () {
    $productos = Product::with([
            'category',
            'variants' => function ($query) {
                $query->with('brand')
                    ->where('stock', '>', 0)
                    ->orderBy('presentation')
                    ->orderBy('price');
            }
        ])
        ->where('status', 1)
        ->whereHas('category', function ($query) {
            $query->where('name', 'Tornillería')
                ->orWhere('name', 'Tornilleria');
        })
        ->whereHas('variants', function ($query) {
            $query->where('stock', '>', 0);
        })
        ->orderBy('name')
        ->get();

    return view('tienda.screw', compact('productos'));
});

Route::get('/soporte', function () {
    return view('tienda.soporte');
});


Route::resource('variants', ProductVariantController::class);


Route::get('/', function () {
    $productosNuevos = ProductVariant::with(['product.category', 'brand'])
        ->where('stock', '>', 0)
        ->latest()
        ->take(4)
        ->get();

    $masVendidos = ProductVariant::with(['product.category', 'brand'])
        ->where('stock', '>', 0)
        ->inRandomOrder()
        ->take(4)
        ->get();

    return view('tienda.index', compact('productosNuevos', 'masVendidos'));
})->name('home');


Route::get('/lomasnuevo', function () {
    $productos = Product::with(['category', 'variants.brand'])
        ->where('status', 1)
        ->latest()
        ->take(8)
        ->get();

    return view('tienda.lomasnuevo', compact('productos'));
});

Route::get('/energy', function () {
    $productos = Product::with([
            'category',
            'variants' => function ($query) {
                $query->with('brand')
                    ->where('stock', '>', 0)
                    ->orderBy('price');
            }
        ])
        ->where('status', 1)
        ->whereHas('category', function ($query) {
            $query->where('name', 'Electricidad');
        })
        ->whereHas('variants', function ($query) {
            $query->where('stock', '>', 0);
        })
        ->orderBy('name')
        ->get();

    return view('tienda.energy', compact('productos'));
});


Route::get('/bano', function () {
    $productos = Product::with([
            'category',
            'variants' => function ($query) {
                $query->with('brand')
                    ->where('stock', '>', 0)
                    ->orderBy('price');
            }
        ])
        ->where('status', 1)
        ->whereHas('category', function ($query) {
            $query->where('name', 'Baño');
        })
        ->whereHas('variants', function ($query) {
            $query->where('stock', '>', 0);
        })
        ->orderBy('name')
        ->get();

    return view('tienda.bano', compact('productos'));
});

Route::get('/plumb', function () {
    $productos = Product::with([
            'category',
            'variants' => function ($query) {
                $query->with('brand')
                    ->where('stock', '>', 0)
                    ->orderBy('presentation')
                    ->orderBy('price');
            }
        ])
        ->where('status', 1)
        ->whereHas('category', function ($query) {
            $query->where('name', 'Plomería')
                ->orWhere('name', 'Plomeria');
        })
        ->whereHas('variants', function ($query) {
            $query->where('stock', '>', 0);
        })
        ->orderBy('name')
        ->get();

    return view('tienda.plumb', compact('productos'));
});



Route::get('/security', function () {
    $productos = Product::with([
            'category',
            'variants' => function ($query) {
                $query->with('brand')
                    ->where('stock', '>', 0)
                    ->orderBy('presentation')
                    ->orderBy('price');
            }
        ])
        ->where('status', 1)
        ->whereHas('category', function ($query) {
            $query->where('name', 'Seguridad');
        })
        ->whereHas('variants', function ($query) {
            $query->where('stock', '>', 0);
        })
        ->orderBy('name')
        ->get();

    return view('tienda.security', compact('productos'));
});


Route::get('/tools', function () {
    $productos = Product::with([
            'category',
            'variants' => function ($query) {
                $query->with('brand')
                    ->where('stock', '>', 0)
                    ->orderBy('presentation')
                    ->orderBy('price');
            }
        ])
        ->where('status', 1)
        ->whereHas('category', function ($query) {
            $query->where('name', 'Herramientas');
        })
        ->whereHas('variants', function ($query) {
            $query->where('stock', '>', 0);
        })
        ->orderBy('name')
        ->get();

    return view('tienda.tools', compact('productos'));
});





/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('variants', ProductVariantController::class);

        Route::resource('clientes', ClienteController::class);
        Route::resource('ventas', VentaController::class);
        Route::resource('pagos', PagoController::class);
        Route::get('solicitudes', [AdminSolicitudController::class, 'index'])->name('solicitudes.index');
        Route::get('solicitudes/{solicitud}', [AdminSolicitudController::class, 'show'])->name('solicitudes.show');
        Route::patch('solicitudes/{solicitud}', [AdminSolicitudController::class, 'update'])->name('solicitudes.update');

        Route::get('users/roles', [UserRoleController::class, 'index'])->name('users.roles');
        Route::patch('users/{user}/roles', [UserRoleController::class, 'update'])->name('users.roles.update');
        Route::post('roles', [UserRoleController::class, 'storeRole'])->name('roles.store');
        Route::patch('roles/{role}', [UserRoleController::class, 'updateRole'])->name('roles.update');
        Route::delete('roles/{role}', [UserRoleController::class, 'destroyRole'])->name('roles.destroy');
        Route::patch('users/{user}/password', [UserRoleController::class, 'updatePassword'])->name('users.password.update');

        Route::post('caja/abrir', [CorteCajaController::class,'abrir'])->name('caja.abrir');
        Route::post('caja/cerrar', [CorteCajaController::class,'cerrar'])->name('caja.cerrar');
        Route::get('reportes/diario', [AdminController::class,'reporteDiario'])
        ->name('reportes.diario');

        Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');

        // 🔥 AQUÍ VA EL POS
        Route::get('ventas-pos', [VentaController::class, 'pos'])->name('ventas.pos');
        Route::post('ventas-pos', [VentaController::class, 'storePOS'])->name('ventas.storePOS');
        Route::get('pagos/{id}/print', [PagoController::class, 'print'])
         ->name('pagos.print');

});


//Route::middleware(['auth','role:admin'])->prefix('admin')->name('admin.')->group(function () {

    //Route::resource('clientes', ClienteController::class);
   // Route::resource('ventas', VentaController::class);
   // Route::resource('pagos', PagoController::class);

//});



require __DIR__.'/auth.php';
