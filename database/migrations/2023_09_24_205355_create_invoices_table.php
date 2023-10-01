<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
//            $table->id();
            $table->string('invoice_nummber');
            $table->foreignId('invoice_id')->constrained('invoices')->onDelete('cascade');
            $table->string('product_name');
            $table->string('unit');
            $table->decimal('quantity', 8,2)->default(0.00);
            $table->decimal('unit_price', 8,2)->default(0.00);
            $table->decimal('row_sub_total', 8,2)->default(0.00);
            $table->decimal('total', 8,2)->default(0.00);
            $table->string('status',50);
            $table->string('rate_vat');
            $table->string('discount');
            $table->string('section');
            $table->string('product');
            $table->date('due_date');
            $table->date('invoice_date');
            $table->text('note')->nullable();
            $table->string('user');
            $table->string('status',50);
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
