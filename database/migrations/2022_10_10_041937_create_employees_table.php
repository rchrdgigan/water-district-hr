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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('generated_id');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('gender');
            $table->string('address');
            $table->dateTime('birthdate');
            $table->string('contact');
            $table->time('time_in_am', 0);
            $table->time('time_out_am', 0);
            $table->time('time_in_pm', 0);
            $table->time('time_out_pm', 0);
            $table->string('sss');
            $table->string('philhealth');
            $table->string('pagibig');
            $table->string('position');
            $table->string('rate_per_day');
            $table->string('image');
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
        Schema::dropIfExists('employees');
    }
};
