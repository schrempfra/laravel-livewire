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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string("name");
            $table->string("logo");
            $table->string("email")->nullable();
            $table->string("type");
            $table->string("city");
            $table->string("street");
            $table->string("street_number");
            $table->string("phone_number")->nullable();
            $table->string("zip_code");
            $table->text("description");
            $table->string("lat")->nullable();
            $table->string("lng")->nullable();
            $table->string("google_maps");
            $table->string("website")->nullable();
            $table->string("facebook")->nullable();
            $table->string("twitter")->nullable();
            $table->string("instagram")->nullable();
            $table->boolean("enabled")->default(1);
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
        Schema::dropIfExists('companies');
    }
};
