<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
}
