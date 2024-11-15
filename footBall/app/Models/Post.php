<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
//Postというモデルを定義し、Modelクラスを継承する
{
    use HasFactory;
    //factoryを使用するための機能。データベースのレコードを簡単に生成するための作成、使用ができるようになる。
    protected $fillable=['title', 'body', 'team_id', 'user_id'];
    
    public function getPaginateByLimit(int $limit_count = 5)
    //getPaginateByLimit()で、取得するデータを制限することで、ページが見やすくなる、ページ読み込み速度などのpフォーマスンス向上など。
    {
        return $this->orderby('updated_at', 'DESC')->paginate($limit_count);
        //orderby()=特定のカラムを基準に並べ替える。updated_at=更新日時の自動更新。DESC=降順(古い順、または大きい順)。
        //$Limit_count=件数を制限する。今回の場合はgetPaginateByLimit()で取得制限の数を指定している。
    }
    public function team(){
        return $this->belongsTo('App\Models\Team');
    }
}
