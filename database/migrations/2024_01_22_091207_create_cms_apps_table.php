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
        Schema::create('cms_apps', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('app_url');
            $table->string('logo')->nullable();
            $table->string('app_title')->nullable();
            $table->string('app_sub_title')->nullable();
            $table->string('app_hero_img')->nullable();
            $table->string('app_address')->nullable();
            $table->string('app_mail')->nullable();
            $table->string('app_phone')->nullable();
            $table->string('app_wa')->nullable();
            $table->string('app_gmaps')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_apps');
    }
};
