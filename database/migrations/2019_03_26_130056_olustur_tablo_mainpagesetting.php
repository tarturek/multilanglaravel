<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlusturTabloMainpagesetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainpagesetting', function (Blueprint $table) {
            $table->Increments('id');

            $table->string('blog')->default('evet')->nullable(); // anasayfada blog goster evet/hayir
            $table->string('project')->default('evet')->nullable(); // anasayfada projeler goster evet/hayir
            $table->string('service')->default('evet')->nullable(); // anasayfada hizmetler goster evet/hayir

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
        Schema::dropIfExists('mainpagesetting');
    }
}
