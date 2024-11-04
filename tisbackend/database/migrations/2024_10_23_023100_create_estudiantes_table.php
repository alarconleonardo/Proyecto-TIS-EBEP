<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id('ID_estudiante');
            $table->string('cod_sis')->nullable()->unique();
            $table->string('tipo_est')->nullable();
            $table->string('rol_scrum')->nullable();
            $table->unsignedBigInteger('ID_usuario')->unique();
            $table->foreign('ID_usuario')
                ->references('ID_usuario')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                $table->unsignedBigInteger('ID_empresa')->unique()->nullable();
                $table->foreign('ID_empresa')
                    ->references('ID_empresa')
                    ->on('grupo_empresas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};