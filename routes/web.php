<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Site\EntityController::class, 'index']);

/*Route::get('/{any}', static function () {
    return view('index');
})->where('any', '.*');*/
