<?php

use App\Models\User;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('thumbnail')->nullable();
            // Text is more than 255 characters
            $table->text('excerpt');
            $table->text('body');
            $table->string('slug')->unique();
            $table->timestamp('published_at')->nullable();
            // Foreign key
            $table->foreignId('category_id');
            $table->foreignIdFor(User::class, 'author_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
