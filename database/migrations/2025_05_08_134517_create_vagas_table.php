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
        Schema::create('vaga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // empresa
            $table->string('title');
            $table->text('description');
            $table->text('requirements')->nullable();
            $table->string('salary')->nullable();
            $table->string('location')->nullable();
            $table->enum('modality', ['remoto', 'presencial', 'híbrido'])->default('presencial');
            $table->string('level')->nullable(); // Júnior, Pleno, etc.
            $table->boolean('is_active')->default(true);
            $table->date('expires_at')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaga');
    }
};
