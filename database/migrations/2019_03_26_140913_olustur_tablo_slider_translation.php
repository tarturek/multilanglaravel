<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlusturTabloSliderTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_translation', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('slider_id');
            $table->string('locale')->index();
            $table->string('text1')->nullable();

            $table->string('buttontext')->nullable();


            $table->unique(['slider_id','locale']);
            $table->foreign('slider_id')->references('id')->on('slider')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_translation');
    }
}
