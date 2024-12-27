<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


use App\Models\User;
use App\Models\Author;
use App\Models\Language;
use App\Models\Topic;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->double('price');
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Author::class)->constrained();
            $table->foreignIdFor(Language::class)->constrained();
            $table->foreignIdFor(Topic::class)->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
