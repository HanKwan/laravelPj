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
        Schema::create('fresh_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_img');
            $table->integer('prize');
            $table->string('brand_name')->nullable();
            $table->integer('weight')->nullable();            
            $table->foreignId('fresh_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('fresh_products');
    }
};
