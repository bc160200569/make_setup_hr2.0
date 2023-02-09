<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevel2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_2', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('level_1_id')->constrained("level_1")->onUpdate('cascade');
            $table->string('name', 70)->unique();
            $table->boolean('is_active')->default(1)->nullable();
            $table->bigInteger('created_by')->index()->unsigned()->nullable();
            $table->bigInteger('updated_by')->index()->unsigned()->nullable();
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
        Schema::dropIfExists('level_2');
    }
}
