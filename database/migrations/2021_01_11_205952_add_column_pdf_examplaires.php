<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPdfExamplaires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examplaires', function (Blueprint $table) {
            $table->string('pdf')->nullable()->after('is_disponible');


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
            $table->dropColumn('pdf');
        });
    }
}
