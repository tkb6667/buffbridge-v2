<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('house_number')->nullable(); // บ้านเลขที่
            $table->string('village')->nullable(); // หมู่บ้าน/หมู่ที่
            $table->string('subdistrict')->nullable(); // ตำบล
            $table->string('district')->nullable(); // อำเภอ
            $table->string('province')->nullable(); // จังหวัด
            $table->string('postal_code')->nullable(); // รหัสไปรษณีย์
            $table->enum('membership_status', ['regular', 'vip', 'premium'])->default('regular');
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn([
                'phone', 'house_number', 'village', 'subdistrict', 
                'district', 'province', 'postal_code', 'membership_status'
            ]);
        });
    }
};
