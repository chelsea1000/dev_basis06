<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * teams_table作成方法
     * 
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id(); //idカラムを追加
            $table->string('name', 50); //string文字列,('name=カラム名(id,titleなど)',50(文字数の上限))
            $table->timestamps(); //timestamps=created_at(作成日時のタイムスタンプ),updated_at(更新日時のタイムスタンプ)Laravelが自動で入れてくれる
            $table->softDeletes(); //softdeletes=データが削除されたときのタイムスタンプ
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
