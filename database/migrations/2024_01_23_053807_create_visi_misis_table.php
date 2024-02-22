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
        Schema::create('visi_misis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_id');
            $table->longText('visi');
            $table->longText('misi');
            $table->longText('visi_img')->nullable();
            $table->longText('misi_img')->nullable();
            $table->longText('detail_img')->nullable();
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
        Schema::dropIfExists('visi_misis');
    }
};
