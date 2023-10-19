<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('toilets', function (Blueprint $table) {
            // 新しい ben_condition カラムを追加
            $table->string('ben_condition');

            // 古い ben_one、ben_two、ben_three カラムを削除
            $table->dropColumn('ben_one');
            $table->dropColumn('ben_two');
            $table->dropColumn('ben_three');
        });
    }

    public function down()
    {
        Schema::table('toilets', function (Blueprint $table) {
            // ロールバック時の操作をここに記述する場合があります
        });
    }
};
