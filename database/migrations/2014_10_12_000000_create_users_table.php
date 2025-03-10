<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Artisan::call('config:cache');
        $appDebug = env('APP_DEBUG');
        if ($appDebug) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('mail')->nullable()->unique();
                $table->timestamp('mail_verified_at')->nullable();
                $table->string('pass')->nullable();
                $table->ipAddress('ipv4')->nullable();
                $table->ipAddress('ipv6')->nullable();
                $table->string('timezone')->nullable();
                $table->rememberToken();
                // timezone <-config/app.php[timezone]
                $table->timestamps();
                $table->softDeletes();
            });     
        } else if ($appDebug == false) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('mail')->unique();
                $table->timestamp('mail_verified_at')->nullable();
                $table->string('pass');
                $table->ipAddress('ipv4')->nullable();
                $table->ipAddress('ipv6')->nullable();
                $table->string('timezone')->default(config('app.timezone'));
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
