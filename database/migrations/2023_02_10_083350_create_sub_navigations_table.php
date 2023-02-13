<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_navigations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name', 20);
            $table->integer('is_show')->default(1)->comment('0: No, 1: Yes');
            $table->string('route')->nullable();
            $table->foreignId('nav_id')
            ->constrained('navigations')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('sub_navigations');
    }
};
