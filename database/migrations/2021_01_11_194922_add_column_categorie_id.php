<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCategorieId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examplaires', function (Blueprint $table) {
            $table->BigInteger('categorie_id')->unsigned()->after('description');
            $table->foreign('categorie_id')->references('id_categorie')->on('categories');
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
            $table->dropForeign(['categorie_id']);
            $table->dropCulomn('categorie_id');
        });
    }
}
