<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlusturTabloGalleryTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_translation', function (Blueprint $table) {
            $table->Increments('id');

            $table->unsignedInteger('gallery_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();

            $table->unique(['gallery_id','locale']);
            $table->foreign('gallery_id')->references('id')->on('gallery')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_translation');
    }
}
