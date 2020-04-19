<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiedRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verified_registers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->comment('email');
            $table->string('password')->comment('password');
            $table->tinyInteger('role')->comment('0 - normal_user, 1 - leader, 2 - admin');
            $table->string('verified_token', 25)->comment('verified token');
            $table->date('expiry_time')->comment('expiry time');
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
        Schema::dropIfExists('verified_registers');
    }
}
