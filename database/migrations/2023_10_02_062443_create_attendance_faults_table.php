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
        Schema::create('attendance_faults', function (Blueprint $table) {
            $table->id();
        
            $table->unsignedBigInteger('attendance_id');
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();
            
            $table->foreign('attendance_id')->references('id')->on('attendances');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_faults');
    }
};
