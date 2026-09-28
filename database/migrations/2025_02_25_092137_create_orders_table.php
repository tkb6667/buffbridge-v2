<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->decimal('total_price', 10, 2);
            $table->string('billing_first_name');
            $table->string('billing_house_number');
            $table->string('billing_subdistrict');
            $table->string('billing_district');
            $table->string('billing_province');
            $table->string('billing_postcode');            
            $table->string('billing_phone');
            $table->string('billing_email');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
