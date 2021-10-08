<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_documento_id');
            $table->foreign('tipo_documento_id')->references('id')
                        ->on('tipos_documentos')->onDelete('cascade');

            $table->string('numero_documento');
            $table->string('nombre1');
            $table->string('nombre2');
            $table->string('apellido1');
            $table->string('apellido2');

            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id')->references('id')
                    ->on('tipo_generos')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')
            ->on('departamentos')
            ->onDelete('cascade');

            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')
            ->on('municipios')
            ->onDelete('cascade');
            
            $table->string('foto');
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
        Schema::dropIfExists('pacientes');
    }
}
