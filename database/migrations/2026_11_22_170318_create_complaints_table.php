<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();

            $table->string('ticket_number')->unique();

            $table->foreignId('user_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->string('title');
            $table->string('category');
            $table->text('description');

            $table->string('status')->default('Baru');

            $table->text('admin_response')->nullable();

            $table->foreignId('responded_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('responded_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
