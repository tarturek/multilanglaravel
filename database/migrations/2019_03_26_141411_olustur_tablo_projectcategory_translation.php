<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OlusturTabloProjectcategoryTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectcategory_translation', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('projectcategory_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();




            $table->unique(['projectcategory_id','locale']);
            $table->foreign('projectcategory_id')->references('id')->on('projectcategory')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projectcategory_translation');
    }
}
