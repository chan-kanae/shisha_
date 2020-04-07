<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('log_id');
            $table->unsignedinteger('user_id');
            // $table->primary(['log_id','user_id']);
            $table->timestamps();

            // $table->index('log_id');
            // $table->index('user_id');

            // 外部キー制約
            $table->foreign('log_id')
            ->references('id')
            ->on('logs')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('log_user');
    }
}
