<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'body',
    ];

    // view に$comment というデータを渡した場合、comment->postで関連する投稿を取得できれば便利
    // そのためには、同名のメソッドを定義し、Postモデルとのリレーションを設定する必要がある
    public function post()
    {
        // モデル同士の関係を指定する
        // 今回のケースでは、コメントに対して、ポストはひとつなので、belongsTo()を使う
        // return $this->belongsTo('App\Models\Post');
        // return $this->belongsTo(App\Models\Post::class);
        return $this->belongsTo(Post::class);
    }
}
