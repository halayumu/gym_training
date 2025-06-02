<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TrainingDetail extends Model
{

    /**
     * トレーニングメニューの追加
     * 
     * ①ログインしているユーザidを取得
     * ②メニューテーブルに①のユーザーidを外部キーとして追加
     * 
     * @param $weight 重量
     * @param $rep 回数
     */
    public function addTrainingMenu($weight, $rep)
    {
        $userId = 2; //ログインしているユーザのユーザidを習得

        // 仮データ
        $part = '胸';
        $trainingExerciseName = 'ベンチプレス';
        $set = 3;
        $rep = 10;
        $weight = 100;
        $supportHeight = 100;
        $chairHeight = 4;
        $supportHeight = 5;
        $memo = 'メモ';

        // menuテーブルに値を追加する
        DB::table('menu')->insert([
            'part' => $part,
            'trainingExerciseName' => $trainingExerciseName,
            'set' => $set,
            'rep' => $rep,
            'weight' => $weight,
            'chairHeight' => $chairHeight,
            'supportHeight' => $supportHeight,
            'memo' => $memo,
            'user_id' => $userId,
        ]);
    }

    /**
     * メニューの初期表示
     * 
     * ①
     * ②
     * 
     * @param $weight 重量
     * @param $rep 回数
     */
    public function firstMenu()
    {
        $userId = 1; //テストデータ

        $menu = DB::table('new_menu')
            ->where('user_id', $userId)
            ->get();

        return $menu;
    }

    /**
     * トレーニングメニューの検索
     * 
     * ①タップしたメニュータブからメニュー名取得
     * ②メニューテーブルからメニュー名を検索
     * 
     * @param $weight 重量
     * @param $rep 回数
     */
    public function searchMenu($eventName)
    {
        $userId = 1; //テストデータ
        $part = $eventName;

        if ($part == 'all') {
            $menu = DB::table('new_menu')
                ->where('user_id', $userId)
                ->get();
        } else {
            $menu = DB::table('new_menu')
                ->where('user_id', $userId)
                ->where('part', $part)
                ->get();
        }

        return $menu;
    }

    /**
     * トレーニングメニューを全件取得する
     */
    public function getAllMenu($userId)
    {
        $menu = DB::table('new_menu')
            ->where('user_id', $userId)
            ->get();

        return $menu;
    }

    /**
     * 新規でトレーニングメニューを登録する
     */
    public function addtoreMenu($part, $trainingExerciseName, $weekday)
    {
        $userId = 1; //テストデータ

        $result = DB::table('new_menu')->insert([
            'part' => $part,
            'trainingExerciseName' => $trainingExerciseName,
            'weekday' => $weekday,
            'user_id' => $userId,
        ]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * トレーニング記録を登録する
     */
    public function trainingRecordDb($tore)
    {
        // APIの最上位に位置する配列(URLパラメータからの値)
        $userId = $tore["user_id"];
        $exerciseName = $tore["exercise_name"];
        $part = $tore["part"];

        foreach ($tore["todoArray"] as $toreAdd) {
            DB::table('menu')->insert([
                'user_id' => $userId,
                'trainingExerciseName' => $exerciseName,
                'set' => $toreAdd['setNo'],
                'part' => $part,
                'weight' => $toreAdd['weight'],
                'rep' => $toreAdd['rep'],
                'chairHeight' => $toreAdd['chair_height'],
                'supportHeight' => $toreAdd['chair_backrest'],
                'memo' => $toreAdd['memo'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // Log::info('Received data:', $tore);
        // ここでログを出力
        // Log::info('trainingRecordDb: メニュー登録が完了しました', ['count' => count($tore)]);
    }
}
