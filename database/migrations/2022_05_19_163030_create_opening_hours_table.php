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
        Schema::create('opening_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id");
            $table->time('monday_first_start');
            $table->time('monday_first_end');
            $table->time('monday_second_start');
            $table->time('monday_second_end');
            $table->time('tuesday_first_start');
            $table->time('tuesday_first_end');
            $table->time('tuesday_second_start');
            $table->time('tuesday_second_end');
            $table->time('wednesday_first_start');
            $table->time('wednesday_first_end');
            $table->time('wednesday_second_start');
            $table->time('wednesday_second_end');
            $table->time('thursday_first_start');
            $table->time('thursday_first_end');
            $table->time('thursday_second_start');
            $table->time('thursday_second_end');
            $table->time('friday_first_start');
            $table->time('friday_first_end');
            $table->time('friday_second_start');
            $table->time('friday_second_end');
            $table->time('saturday_first_start');
            $table->time('saturday_first_end');
            $table->time('saturday_second_start');
            $table->time('saturday_second_end');
            $table->time('sunday_first_start');
            $table->time('sunday_first_end');
            $table->time('sunday_second_start');
            $table->time('sunday_second_end');
            $table->string('exceptions')->nullable();
            $table->boolean('enabled')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opening_hours');
    }
};
