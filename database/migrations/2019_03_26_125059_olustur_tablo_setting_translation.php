<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlusturTabloSettingTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translation', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('setting_id');
            $table->string('locale')->index();
            $table->string('sitename');
            $table->string('footer_text')->nullable();
            $table->string('adress')->nullable();

            $table->unique(['setting_id','locale']);
            $table->foreign('setting_id')->references('id')->on('setting')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_translation');
    }
}
