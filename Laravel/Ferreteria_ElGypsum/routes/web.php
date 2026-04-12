<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\PagoController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\VentaController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('tienda.lomasnuevo');
});

Route::get('/bano', function () {
    return view('tienda.bano');
});

Route::get('/compra', function () {
    return view('tienda.compra');
});

Route::get('/energy', function () {
    return view('tienda.energy');
});

Route::get('/tools', function () {
    return view('tienda.tools');
});

Route::get('/pinturas', function () {
    return view('tienda.pinturas');
});

Route::get('/plumb', function () {
    return view('tienda.plumb');
});

Route::get('/security', function () {
    return view('tienda.security');
});

Route::get('/soporte', function () {
    return view('tienda.soporte');
});

Route::resource('variants', ProductVariantController::class);



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

        // 🔥 AQUÍ VA EL POS
        Route::get('ventas-pos', [VentaController::class, 'pos'])->name('ventas.pos');
        Route::post('ventas-pos', [VentaController::class, 'storePOS'])->name('ventas.storePOS');

});


//Route::middleware(['auth','role:admin'])->prefix('admin')->name('admin.')->group(function () {

    //Route::resource('clientes', ClienteController::class);
   // Route::resource('ventas', VentaController::class);
   // Route::resource('pagos', PagoController::class);

//});



require __DIR__.'/auth.php';
