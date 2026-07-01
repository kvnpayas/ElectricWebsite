<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_documents', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['corporate-governance', 'disclosures', 'investor-relations', 'press-materials'])->index();
            $table->string('title');
            $table->date('document_date');
            $table->enum('status', ['published', 'draft'])->default('published')->index();
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->foreignId('ctrd_user')->nullable()->constrained('users')->noActionOnDelete();
            $table->foreignId('upd_user')->nullable()->constrained('users')->noActionOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_documents');
    }
};
