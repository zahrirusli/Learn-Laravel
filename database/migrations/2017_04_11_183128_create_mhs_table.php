<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhs', function (Blueprint $table) {
            //$table->increments('id');
            $table->string('nrp',10);
            $table->primary('nrp');
            $table->string('namamhs',100);
            $table->string('nipdosenwali',10)
            	  ->index();
            $table->timestamps();
        });
        Schema::table('mhs',function($table){
        	$table->foreign('nipdosenwali')
        	 	  ->references('nip')
        		  ->on('dosens')
        		  ->onUpdate('cascade')
        		  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mhs');
    }
}
