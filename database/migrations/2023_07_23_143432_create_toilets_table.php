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
        Schema::create('toilets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('people_id');
            // onDelete('cascade')は、外部キーの参照先のpeopleテーブルのidのレコードが削除された場合に、このレコードも一緒に削除されるようにする
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->string('urine_one')->nullable();
            $table->string('urine_two')->nullable();
            $table->string('urine_three')->nullable();
            $table->string('ben_one')->nullable();
            $table->string('ben_two')->nullable();
            $table->string('ben_three')->nullable();
            $table->string('filename')->nullable();
            $table->string('bikou')->nullable();
            // $table->timestamp('created_at')->nullable(false);
            $table->timestamps();
        });
        }

    /**
    /**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
    {
        // Schema::dropIfExists('toilets');
    }
};