<?php

// Migration: create_employees_table
// This migration creates the 'employees' table with columns for name, position, and system_working_on.
// Migrations allow you to version-control your database schema in Laravel.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This method is called when you run `php artisan migrate`.
     * It creates the 'employees' table with the specified columns.
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Employee's name
            $table->string('position'); // Employee's position
            $table->string('system_working_on'); // System the employee is working on
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     * This method is called when you run `php artisan migrate:rollback`.
     * It drops the 'employees' table.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
