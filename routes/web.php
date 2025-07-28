<?php
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingDetailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [TrainingDetailController::class, 'top']); //top画面
Route::get('/TrainingInput', [TrainingDetailController::class, 'record']); //入力画面
Route::post('/TrainingDetail', [TrainingDetailController::class, 'record']); //詳細画面
Route::post('/TrainingMenuAdd', [TrainingDetailController::class, 'create']); //トレーニングメニュー登録
Route::get('/Home', [TrainingDetailController::class, 'Home']); //ホーム画面
Route::post('/Home/firstMenu', [TrainingDetailController::class, 'firstMenu']); //ホーム画面のファーストメニュー
Route::post('/Home/search', [TrainingDetailController::class, 'searchMenu']); //メニュー検索
Route::get('/AddTraining', [TrainingDetailController::class, 'addViewMenu']); //トレーニング追加画面
Route::post('/AddTraining', [TrainingDetailController::class, 'menuRegistration']); //トレーニング追加
Route::post('/TrainingDetail', [TrainingDetailController::class, 'trainingRecord']); //トレーニング記録


require __DIR__ . '/auth.php';
