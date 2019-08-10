<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_control', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('kpass');
            $table->string('father_name');
            $table->string('phone_number');
            $table->date('dob');
            $table->string('gender');
            $table->string('religion');
            $table->string('blood_group');
            $table->string('sec');
            $table->date('doa');
            $table->bigInteger('cnic');
            $table->string('attendance');
            $table->string('comments');
            $table->bigInterger('eng');
            $table->bigInterger('urdu');
            $table->bigInterger('maths');
            $table->bigInterger('cptr');
            $table->bigInterger('isl');
            $table->bigInterger('pakstd');
            $table->bigInterger('phy');
            $table->bigInterger('chem');
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
        Schema::dropIfExists('admin');
    }
}
