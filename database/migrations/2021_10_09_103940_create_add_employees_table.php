<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_number', 100);
            $table->string('select_gender',100);
            $table->string('first_name',100);
            $table->string('middle_name',100);
            $table->string('last_name',100);
            $table->string('age',100);
            $table->string('email',100);
            $table->string('contact',100);
            $table->string('file',100);
            $table->string('select_department',100);
            $table->string('select_designation',100);
            $table->string('username',100);
            $table->string('passsword',100);
            $table->integer('status');
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
        Schema::dropIfExists('add_employees');
    }
}
