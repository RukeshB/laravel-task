<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageDobLocationidGenderColumnInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('image')->nullable();
            $table->date('dob');
            $table->enum('gender',['male','female']);
            $table->bigInteger('loctaion_id')->unsigned();
            $table->foreign('loctaion_id')->references('id')->on('location');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); //disableForeignKeyConstraints
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('dob');
            $table->dropColumn('gender');
            $table->dropForeign('users_loctaion_id__foreign');
            $table->dropColumn('loctaion_id');
        });
    }
}
