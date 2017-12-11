<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectActivitiesAndGroups extends Migration
{
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('groups');

        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            # tablename + fk field name + the word "foreign"
            $table->dropForeign('activities_group_id_foreign');
            $table->dropColumn('group_id');
        });
    }
}
