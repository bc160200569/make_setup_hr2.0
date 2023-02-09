<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevel4Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_4', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->foreignId('level_1_id')->constrained("level_1")->onUpdate('cascade');
            $table->string('level_1_name', 70);
            $table->foreign('level_1_name')->references('name')->on('level_1')->onDelete('restrict')->onUpdate('cascade');

            $table->foreignId('level_2_id')->constrained("level_2")->onUpdate('cascade');
            $table->string('level_2_name', 70);
            $table->foreign('level_2_name')->references('name')->on('level_2')->onDelete('restrict')->onUpdate('cascade');
            
            $table->foreignId('level_3_id')->constrained("level_3")->onUpdate('cascade');
            $table->string('level_3_name', 70);
            $table->foreign('level_3_name')->references('name')->on('level_3')->onDelete('restrict')->onUpdate('cascade');
            
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
        Schema::dropIfExists('level_4');
    }
}
