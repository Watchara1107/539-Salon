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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->default("ลูกค้าไม่ได้กรอกข้อมูล");
            $table->string('phone');
            $table->date('date');
            $table->time('time');
            $table->string('beautician');
            $table->string('manu');
            $table->string('manu2')->nullable()->default("ลูกค้าไม่ได้กรอกข้อมูล");
            $table->string('status')->default("รอรับคิว");
            $table->boolean('service')->default(0);
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
        Schema::dropIfExists('bookings');
    }
};
