<?php

use App\Http\Controllers\FileImportAndExportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Default page route
Route::get('/', [FileImportAndExportController::class, 'index']);

// 2. Imported Data Visulation route,
Route::get('/diamonds', [FileImportAndExportController::class, 'visualizeImportedData']);

// 3. Import and Export handler routes
// handles file import
Route::post('import', [FileImportAndExportController::class, 'importFile']);
// handles file export
Route::get('export/{slug}', [FileImportAndExportController::class, 'exportFile']);
// End of import and Export handler routes

