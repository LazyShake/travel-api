<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Удаляем ненужные поля, если они есть
            if (Schema::hasColumn('users', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('users', 'email')) {
                $table->dropUnique(['email']);
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('users', 'email_verified_at')) {
                $table->dropColumn('email_verified_at');
            }
            if (Schema::hasColumn('users', 'remember_token')) {
                $table->dropColumn('remember_token');
            }

            // Добавляем нужные поля
            if (!Schema::hasColumn('users', 'login')) {
                $table->string('login')->unique()->after('id');
            }
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->after('password');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Восстанавливаем старые поля (по необходимости)
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            // Удаляем поля, добавленные для теста
            $table->dropUnique(['login']);
            $table->dropColumn(['login', 'role']);
        });
    }
};
