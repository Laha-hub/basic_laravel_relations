<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // どの投稿に結びつくかを指定するカラム
            // post_idという名前にしておくと、postsテーブルのidカラムにlaravelが紐付けてくれる
            $table->unsignedBigInteger('post_id');
            $table->string('body');
            $table->timestamps();
            $table
                // postsテーブルに存在しないidを読み込まないよう外部キー制約を用いる
                ->foreign('post_id')
                ->references('id')
                ->on('posts')
                // postsテーブルで該当レコードが削除されたら、commentsテーブルでも連動してレコード削除
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
