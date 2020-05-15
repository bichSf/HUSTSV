<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unique();
            $table->string('image')->nullable();
            $table->string('name');
            $table->date('date_of_birth')->nullable();
            $table->string('home_town')->nullable();
            $table->string('email');
            $table->string('mssv');
            $table->integer('id_faculties');
            $table->integer('id_class');
            $table->tinyInteger('gender')->comment('0 - man, 1- women');
            $table->string('start_tenure');
            $table->string('end_tenure');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
