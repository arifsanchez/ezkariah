<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPengenalanDirisTable extends Migration
{
    public function up()
    {
        Schema::create('jenis_pengenalan_diris', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nama')->nullable();

            $table->timestamps();
        });
    }
}
