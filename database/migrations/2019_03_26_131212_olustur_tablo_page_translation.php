<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlusturTabloPageTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_translation', function (Blueprint $table) {
            $table->Increments('id');

            $table->unsignedInteger('page_id');
            $table->string('locale')->index();

            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('slug')->nullable();

            $table->unique(['page_id','locale']);
            $table->foreign('page_id')->references('id')->on('page')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_translation');
    }
}
