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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('person_name');//追記
            $table->date('date_of_birth');
            // $table->integer('age');
            // integerからstringに手打ちで修正↓
            $table->string('gender')->nullable();
            $table->string('profile_image')->nullable();
			$table->text('disability_name')->nullable();//追記
			$table->integer('jukyuusha_number');
			$table->string('jukyuu_town')->nullable();
			$table->integer('kubun_number');
			$table->integer('futan_max_money')->nullable();
			$table->date('service_start')->nullable();
			$table->date('service_end')->nullable();
			$table->integer('keiyaku_number')->nullable();
			$table->date('keiyaku_date')->nullable();
			$table->date('keiyaku_end')->nullable();
			$table->integer('keiyaku_shikyuu')->nullable();
			$table->string('shokikasann')->nullable();
			$table->string('rehabilitation_kasann')->nullable();
			$table->string('plan_misakusei')->nullable();
			$table->integer('jigyousho_number')->nullable();
			$table->string('jigyousho_name')->nullable();
			$table->string('max_money_result')->nullable();
			$table->integer('manage_max_money')->nullable();
			$table->string('max_money_kasann')->nullable();
			$table->date('special_start')->nullable();
			$table->date('special_end')->nullable();
			$table->integer('special_year_days')->nullable();
			$table->integer('special_this_month')->nullable();
			$table->integer('special_month_days')->nullable();
			$table->string('billing_target')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
};
