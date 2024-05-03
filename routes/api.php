<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserInterfaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix'=> 'user'], function () {
    Route::get('/categories', [UserInterfaceController::class, 'getCategories']);
    Route::get('/categories/{categoryId}/types', [UserInterfaceController::class, 'getTypes']);
    Route::get('/categories/{categoryId}/types/{typeId}/products', [UserInterfaceController::class, 'getProducts']);
    Route::get('/products/{id}', [UserInterfaceController::class, 'getProductDetails']);

    Route::post('/order', [OrderController::class, 'create'])

    /* TODO:
    Műveletek
    - GET /order - Megrendelés adatai
    - POST /order - Megrendelés létrehozása
    - POST /order/product/{id} - Termék hozzáadása a rendeléshez
        - megj.: ha nincs megrendelés szám, akkor új megrendelés nyitása!
    - PUT /order/product/{id} - Termék mennyiségének növelése/csökkentése
    - DELETE /order/product/{id} - Termék törlése a rendelésből
    Befejezés
    - PUT /order - Megrendelés véglegesítése
    */
});

Route::group(['prefix'=> 'admin'], function () {
    // TODO
});

Route::group(['prefix'=> 'kitchen'], function () {
    // TODO
});
