<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectRolesAndUsers extends Migration
{
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            # tablename + fk field name + the word "foreign"
            $table->dropForeign('roles_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
