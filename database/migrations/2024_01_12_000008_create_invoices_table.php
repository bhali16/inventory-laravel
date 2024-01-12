<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_no')->unique();
            $table->date('invoice_date');
            $table->string('delivery_method')->nullable();
            $table->string('account');
            $table->string('job_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('delivery_address');
            $table->string('delivery_phone');
            $table->string('billing_address')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('notes')->nullable();
            $table->decimal('subtotal', 15, 2);
            $table->decimal('tax', 15, 2)->nullable();
            $table->decimal('delivery_charges', 15, 2)->nullable();
            $table->decimal('freight', 15, 2)->nullable();
            $table->decimal('handling', 15, 2)->nullable();
            $table->integer('restocking')->nullable();
            $table->integer('other_charges')->nullable();
            $table->decimal('total', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
