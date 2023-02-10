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
        Schema::create('navigations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('icon')->nullable()->comment('favicon');
            $table->boolean('sub_nav')->default(1)->comment('0: No, 1: Yes');
            $table->integer('is_show')->default(1)->comment('0: No, 1: Yes');
            $table->string('route')->nullable();
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
        Schema::dropIfExists('navigations');
    }
};
