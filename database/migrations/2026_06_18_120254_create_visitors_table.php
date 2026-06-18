<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitors', function (Blueprint $table) {

            $table->id();

            $table->string('ip_address')->nullable();

            $table->string('browser')->nullable();
            $table->string('browser_version')->nullable();

            $table->string('platform')->nullable();
            $table->string('platform_version')->nullable();

            $table->string('device')->nullable();

            $table->boolean('is_mobile')->default(false);
            $table->boolean('is_tablet')->default(false);
            $table->boolean('is_desktop')->default(false);
            $table->boolean('is_robot')->default(false);

            $table->text('user_agent')->nullable();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};