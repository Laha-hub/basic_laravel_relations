<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
    ];

    // view に$postというデータを渡した場合、$post->commentsで関連するコメントを取得できれば便利
    // そのためには、同名のメソッドを定義し、Commentモデルとのリレーションを設定する必要がある
    public function comments ()
    {
        // モデル同士の関係を指定する
        // 今回のケースでは、特定のポストに対して、コメントは複数あるので、hasMany()を使う
        // return $this->hasMany('App\Models\Comment');
        // return $this->hasMany(App\Models\Comment::class);
        return $this->hasMany(Comment::class);
    }
}
