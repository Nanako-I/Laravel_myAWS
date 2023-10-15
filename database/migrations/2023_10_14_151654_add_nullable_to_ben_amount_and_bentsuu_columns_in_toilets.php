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
            $table->string('ben_amount')->nullable()->change();
            $table->string('bentsuu')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ben_amount_and_bentsuu_columns_in_toilets', function (Blueprint $table) {
            //
        });
    }
};
