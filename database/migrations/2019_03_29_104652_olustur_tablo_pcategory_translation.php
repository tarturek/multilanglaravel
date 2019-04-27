<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlusturTabloPcategoryTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcategory_translation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('pcategory_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();

            $table->unique(['pcategory_id','locale']);
            $table->foreign('pcategory_id')->references('id')->on('pcategory')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pcategory_translation');
    }
}
