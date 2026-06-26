<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('advisory_documents', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['advisories', 'rate-schedule', 'others'])->index();
            $table->string('title');
            $table->date('document_date');
            $table->enum('status', ['published', 'draft'])->default('published')->index();
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->string('url')->nullable()->unique()->comment('URL slug — used for customer-facing page routing (e.g. erc-sample-document)');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->foreignId('ctrd_user')->nullable()->constrained('users')->noActionOnDelete();
            $table->foreignId('upd_user')->nullable()->constrained('users')->noActionOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('advisory_documents');
    }
};
