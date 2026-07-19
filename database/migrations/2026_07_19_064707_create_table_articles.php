<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('table_articles', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('table_users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->enum('article_type', ['blog', 'service']);
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('content');
            $table->boolean('is_published');
            $table->datetime('created');
            $table->datetime('updated');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table_articles');
    }
};
