<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemosTemporaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memos_temporary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',10)->nullable();
            $table->string('spot',40)->nullable();
            $table->string('log',80)->nullable();
            $table->string('feel',200)->nullable();
            $table->string('userid',100)->nullable();
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
        Schema::dropIfExists('memos_temporary');
    }
}
