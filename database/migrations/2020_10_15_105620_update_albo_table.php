<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAlboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albo', function (Blueprint $table) {
            $table->integer('numero');
            $table->string('titolo', 511);
            $table->integer('collana_id');
            $table->integer('editore_id');
        });

        Schema::table('albo', function (Blueprint $table) {
            $table->foreign('collana_id')->references('id')->on('collana');
            $table->foreign('editore_id')->references('id')->on('editore');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
