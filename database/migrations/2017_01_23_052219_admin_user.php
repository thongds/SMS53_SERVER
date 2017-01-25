<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('admin_user', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
//        });
        Schema::create('admin_user', function (Blueprint $table) {
            $this->generateTable($table);
            $table->string('user_name');
            $table->string('password');
            $table->unsignedInteger('admin_role_id');
            $table->foreign('admin_role_id')->references('id')->on('admin_role');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user');
    }
}
