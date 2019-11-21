<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilAhlisTable extends Migration
{
    public function up()
    {
        Schema::create('profil_ahlis', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nama_penuh');

            $table->string('no_kad_pengenalan')->unique();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
