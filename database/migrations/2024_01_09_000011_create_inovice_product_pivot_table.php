<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInoviceProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('inovice_product', function (Blueprint $table) {
            $table->unsignedBigInteger('inovice_id');
            $table->foreign('inovice_id', 'inovice_id_fk_9375924')->references('id')->on('inovices')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_9375924')->references('id')->on('products')->onDelete('cascade');
        });
    }
}
