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
        Schema::create('main_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_id');
            $table->string('name');
            $table->integer('duration')->comment('number per month')->nullable();
            $table->float('amount',10,2);
            $table->boolean('best_seller')->default(false);
            $table->timestamps();

            $table->foreign('app_id')
                ->references('id')
                ->on('cms_apps')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_plans');
    }
};
