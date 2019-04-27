<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlusturTabloProjectTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_translation', function (Blueprint $table) {
            $table->Increments('id');

            $table->unsignedInteger('project_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('client')->nullable();
            $table->string('location')->nullable();
            $table->string('type')->nullable();
            $table->text('content')->nullable();
            $table->string('slug')->nullable();

            $table->unique(['project_id','locale']);
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_translation');
    }
}
