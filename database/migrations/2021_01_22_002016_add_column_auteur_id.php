<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAuteurId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examplaires', function (Blueprint $table) {
            $table->BigInteger('auteur_id')->unsigned()->after('genre_id');
            $table->foreign('auteur_id')->references('id_auteur')->on('auteurs')->constrainted()->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examplaires', function (Blueprint $table) {
            $table->dropForeign(['auteur_id']);
            $table->dropColumn('auteur_id');
        });
    }
}
