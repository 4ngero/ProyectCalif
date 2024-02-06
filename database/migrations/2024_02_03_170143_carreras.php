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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
        DB::table('carreras')->insert([
            ['Nombre' => 'Ingeniería en Sistemas', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Ingeniería en Mecatrónica', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Ingeniería en Manufactura', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
