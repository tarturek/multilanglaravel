<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlusturTabloMpagesettingTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpagesetting_translation', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('mpage_setting_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('text')->nullable();


            $table->unique(['mpage_setting_id','locale']);
            $table->foreign('mpage_setting_id')->references('id')->on('mpagesetting')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mpagesetting_translation');
    }
}
