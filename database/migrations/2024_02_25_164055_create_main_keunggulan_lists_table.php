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
        Schema::create('main_keunggulan_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('keunggulan_id');
            $table->string('title')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
            $table->foreign('keunggulan_id')
            ->references('id')
            ->on('keunggulans')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_keunggulan_lists');
    }
};
