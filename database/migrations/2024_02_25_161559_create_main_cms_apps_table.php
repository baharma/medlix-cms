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
        Schema::create('main_cms_apps', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('app_url');
            $table->string('logo')->nullable();
            $table->string('app_address')->nullable();
            $table->string('app_mail')->nullable();
            $table->string('app_phone')->nullable();
            $table->string('app_wa')->nullable();
            $table->longText('app_gmaps')->nullable();
            $table->string('favicon')->nullable();
            $table->longText('extend')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_cms_apps');
    }
};
