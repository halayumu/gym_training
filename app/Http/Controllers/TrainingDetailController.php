<?php

namespace App\Http\Controllers;

use App\Models\TrainingDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class TrainingDetailController extends Controller
{
    /**
     * フォームの入力情報を取得する
     */
    public function record(Request $request)
    {
        $weight = $request->input('weight') ?? "";
        $rep = $request->input('rep') ?? "";


        if (!empty($weight) && !empty($rep)) {
            session(['weight' => $weight, 'rep' => $rep]);
            $weight = session('weight');
            $rep = session('rep');

            return view('TrainingDetailIndex', compact('weight', 'rep'));
        } else {
            return view('TrainingDetail');
        }
    }

    /**
     * top画面
     */
    public function top()
    {
        return view('top');
    }

    /**
     * ホーム画面
     */
    public function home()
    {
        return view('Home');
    }


    /**
     * ホーム画面用のファーストメニューを表示させる
     */
    public function firstMenu(Request $request)
    {
        $user_id = $request->input('user_id');
        $trainingDetail = new TrainingDetail();
        $menuGet = $trainingDetail->getAllMenu($user_id);

        return response()->json(['eventNameJson' => $menuGet], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * トレーニングメニューを追加
     */
    public function create(Request $request)
    {
        $trainingDetail = new TrainingDetail();
        $trainingDetail->addTrainingMenu($request->weight, $request->rep);

        return view('TrainingDetail');
    }

    /**
     * メニュー検索
     */
    public function searchMenu(Request $request)
    {
        $eventName = $request->input('eventName');

        $trainingDetail = new TrainingDetail();
        $menuGet = $trainingDetail->searchMenu($eventName);

        return response()->json(['eventNameJson' => $menuGet], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * トレーニング追加に関しての選択メニューを表示させる
     */
    public function addViewMenu()
    {
        $menuPart = $this->menuPart();
        $menuDay = $this->menuDay();

        return view('AddTraining', compact('menuPart', 'menuDay'));
    }

    /**
     * トレーニング情報を表示する
     */
    public function menuPart()
    {
        $part = ['胸', '肩', '腕', '背中', '脚'];
        return $part;
    }

    /**
     * トレーニング曜日を表示させる
     */
    public function menuDay()
    {
        $day = ['月', '火', '水', '木', '金', '土', '日'];
        return $day;
    }

    /**
     * 新規でトレーニングメニューを登録する
     */
    public function menuRegistration(Request $request)
    {
        $part = $request->input("addMenu.part");
        $trainingExerciseName = $request->input("addMenu.trainingExerciseName");
        $weekday = $request->input("addMenu.weekday");

        $trainingDetail = new TrainingDetail();
        $result = $trainingDetail->addtoreMenu($part, $trainingExerciseName, $weekday);

        return response()->json(['addTreResultJson' => $result], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     *  トレーニング記録を登録する
     */
    public function trainingRecord(Request $request)
    {
        $tore = $request->all();

        $trainingDetail = new TrainingDetail();
        $allSucceeded = $trainingDetail->trainingRecordDb($tore);

        return response()->json($allSucceeded);
    }
}
