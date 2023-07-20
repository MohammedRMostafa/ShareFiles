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
        Schema::create('share_files', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('code', 50); //for download
            $table->string('file_name', 255);
            $table->string('file_path', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('share_files');
    }
};
