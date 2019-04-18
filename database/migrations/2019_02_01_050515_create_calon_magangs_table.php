<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalonMagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_magangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_posisi')->unsigned();
            $table->foreign('id_posisi')->references('id')->on('posisis')->onDelete('cascade');
            $table->string('kampus');
            $table->string('nama');
            $table->string('jurusan');
            $table->string('telp');
            $table->string('email');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('cv');
            $table->string('portofolio');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->text('alasan');
            $table->text('alasan_posisi');
            $table->integer('id_info')->unsigned();
            $table->foreign('id_info')->references('id')->on('info_magangs')->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('calon_magangs');
    }
}
