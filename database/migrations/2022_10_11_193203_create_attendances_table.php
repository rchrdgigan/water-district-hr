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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->date('date');
            $table->time('time_in_am')->nullable();
            $table->double('num_hr_am')->nullable();
            $table->integer('status_am')->nullable();
            $table->time('time_out_am')->nullable();
            $table->time('time_in_pm')->nullable();
            $table->double('num_hr_pm')->nullable();
            $table->integer('status_pm')->nullable();
            $table->time('time_out_pm')->nullable();
            $table->double('num_hr')->nullable();
            $table->string('status')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('attendances');
    }
};
