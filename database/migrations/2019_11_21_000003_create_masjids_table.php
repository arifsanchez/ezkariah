<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasjidsTable extends Migration
{
    public function up()
    {
        Schema::create('masjids', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nama');

            $table->string('location')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
