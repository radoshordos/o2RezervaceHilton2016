<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rezervace extends Migration
{
    public function up()
    {
        Schema::create('rezervace', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean("registration_complete")->default(0);
            $table->string("secure_code",64)->unique();
            $table->string("fullname", 128);
            $table->string("telefon", 16);
            $table->string("email", 128)->unique();
            $table->integer("tikets")->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('rezervace');
    }
}