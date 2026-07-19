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
        Schema::create('table_contacts', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('fullname')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('notes')->nullable(false);
            $table->boolean('is_read')->nullable(false)->default(false);
            $table->datetime('created');
            $table->datetime('updated');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_contacts');
    }
};
