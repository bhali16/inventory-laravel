<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_code')->unique();
            $table->string('product_name');
            $table->string('product_mfg')->nullable();
            $table->decimal('product_price', 15, 2);
            $table->string('product_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
