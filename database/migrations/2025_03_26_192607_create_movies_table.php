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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('cover_image');
            
            // Video hosting options
            $table->enum('hosting_type', ['self', 'vimeo', 'youtube', 'aws'])->default('self');
            $table->string('video_path')->nullable(); // For self-hosted files
            $table->string('external_id')->nullable(); // ID for third-party services (e.g., Vimeo ID)
            $table->string('streaming_url')->nullable(); // Direct streaming URL if using AWS/S3
            
            // Common video metadata
            $table->string('trailer_url')->nullable();
            $table->integer('duration_minutes');
            $table->date('release_date');
            $table->boolean('is_published')->default(false);
            $table->timestamps();
            $table->softDeletes()->default(null)->nullable(); // Adds deleted_at column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
