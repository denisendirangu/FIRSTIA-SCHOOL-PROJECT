<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_name');
            $table->string('unit_code')->unique();
            $table->longText('unit_desc');
            $table->integer('unit_chapters');
            $table->string('unit_lecturer');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_units');
    }
}
