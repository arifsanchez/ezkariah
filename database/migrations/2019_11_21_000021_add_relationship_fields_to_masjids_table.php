<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMasjidsTable extends Migration
{
    public function up()
    {
        Schema::table('masjids', function (Blueprint $table) {
            $table->unsignedInteger('negeri_id')->nullable();

            $table->foreign('negeri_id', 'negeri_fk_632148')->references('id')->on('negeris');
        });
    }
}
