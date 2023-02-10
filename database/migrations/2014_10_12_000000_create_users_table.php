<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('username', 50)->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->string('password');
            $table->integer('is_password_change')->default(0);
            $table->string('image')->nullable();
            $table->integer('is_email_verified')->default(0);
            $table->integer('is_bad_attempts')->default(0);
            $table->integer('officer_id')->nullable();
            $table->foreignId('role_id')
            ->constrained('roles')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->rememberToken();
            $table->boolean('is_active')->default(1)->comment('0: Inactive, 1: Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
