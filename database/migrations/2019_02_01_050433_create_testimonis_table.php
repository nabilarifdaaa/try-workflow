<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */  
    public function up()
    {
        Schema::create('testimonis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('id_posisi')->unsigned();
            $table->foreign('id_posisi')->references('id')->on('posisis')->onDelete('cascade');
            $table->string('gambar');
            $table->text('content');
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
        Schema::dropIfExists('testimonis');
    }
}
