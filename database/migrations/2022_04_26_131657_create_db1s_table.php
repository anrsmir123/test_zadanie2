<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('id_contact');
            $table->string('name_contact');
            $table->string('numphone_contact');
            $table->timestamps();
        });
        Schema::create('mains', function (Blueprint $table) {
            $table->id();
            $table->string('sdlID');
            $table->string('sdl_name');
            $table->timestamps();
        });
        Schema::create('sdl_cont_ids', function (Blueprint $table) {
            $table->id();
            $table->string('id_sdl');
            $table->string('id_cont');
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
        Schema::dropIfExists('contact');
        Schema::dropIfExists('main');
        Schema::dropIfExists('sdl_cont_id');
    }
};
