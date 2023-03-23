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
        Schema::create('tbl_catalogo', function (Blueprint $table) {
            $table->id('id_catalogo');
            $table->string('nombrep', 40);
            $table->integer('precio');
            $table->string('contenido_neto',40);
            $table->string('foto');
            $table->string('estado');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('usuario_id', 'fk_tbl_catalogo_usuario_id_users')->references('id_usuario')
                ->on('tbl_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_catalogo');
    }
};
