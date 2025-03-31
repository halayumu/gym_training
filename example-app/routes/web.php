<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingDetailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/TrainingInput', [TrainingDetailController::class, 'record']); //入力画面
Route::post('/TrainingDetail', [TrainingDetailController::class, 'record']); //詳細画面
Route::post('/TrainingMenuAdd', [TrainingDetailController::class, 'create']); //トレーニングメニュー登録
Route::get('/Home', [TrainingDetailController::class, 'Home']); //ホーム画面
Route::post('/Home/firstMenu', [TrainingDetailController::class, 'firstMenu']); //ホーム画面のファーストメニュー
Route::post('/Home/search', [TrainingDetailController::class, 'searchMenu']); //メニュー検索
Route::get('/AddTraining', [TrainingDetailController::class, 'addViewMenu']); //トレーニング追加画面
Route::post('/AddTraining', [TrainingDetailController::class, 'menuRegistration']); //トレーニング追加