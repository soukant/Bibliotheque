<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnExamplaireId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->BigInteger('examplaire_id')->unsigned()->after('user_id');
            $table->foreign('examplaire_id')->references('id')->on('examplaires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropForeign(['examplaire_id']);
            $table->dropColumn('examplaire_id');
        });
    }
}
