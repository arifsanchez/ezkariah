<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProfilAhlisTable extends Migration
{
    public function up()
    {
        Schema::table('profil_ahlis', function (Blueprint $table) {
            $table->unsignedInteger('team_id')->nullable();

            $table->foreign('team_id', 'team_fk_632411')->references('id')->on('teams');

            $table->unsignedInteger('ictype_id')->nullable();

            $table->foreign('ictype_id', 'ictype_fk_632483')->references('id')->on('jenis_pengenalan_diris');

            $table->unsignedInteger('jantina_id')->nullable();

            $table->foreign('jantina_id', 'jantina_fk_632490')->references('id')->on('jantinas');
        });
    }
}
