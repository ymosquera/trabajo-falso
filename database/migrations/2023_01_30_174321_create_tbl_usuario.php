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
        Schema::create('tbl_usuario', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fotop');
            $table->unsignedBigInteger('rol_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('rol_id', 'fk_users_rol_id_tbl_rol')->references('id_rol')
                ->on('tbl_rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_usuarios');
    }
};
