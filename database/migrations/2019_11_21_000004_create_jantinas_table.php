<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJantinasTable extends Migration
{
    public function up()
    {
        Schema::create('jantinas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nama')->nullable();

            $table->timestamps();
        });
    }
}
