<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// return new class extends Migration
class ChangeToiletsCreatedAtColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('toilets', function (Blueprint $table) {
            // Change 'created_at' column to disallow NULL values
            // $table->timestamp('created_at')->useCurrent()->nullable(false)->change();
            $table->dateTime('created_at')->useCurrent()->nullable(false)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
