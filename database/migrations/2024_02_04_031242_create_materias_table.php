<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        DB::table('materias')->insert([
            ['Nombre' => 'Diseño de Interfaces', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Programación Orientada a Objetos', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Álgebra', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Administración de Base de Datos', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Administración de Proyectos', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Interconexión de Redes', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Fundamentos de Programación Orientada a Objetos', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Ingeniería de Software', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Física para Ingeniería', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Estructura de Datos', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Probabilidad y Estadística', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Introducción a las Tecnologías de la Información', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Electricidad y Magnetismo', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Química', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
