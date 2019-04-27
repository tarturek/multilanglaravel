<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlusturTabloMainpagesettingTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainpagesetting_translation', function (Blueprint $table) {
            $table->Increments('id');

            $table->unsignedInteger('mainpagesetting_id');
            $table->string('locale')->index();
            $table->string('textheader')->nullable();
            $table->text('text')->nullable();

            $table->unique(['mainpagesetting_id','locale']);
            $table->foreign('mainpagesetting_id')->references('id')->on('mainpagesetting')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mainpagesetting_translation');
    }
}
