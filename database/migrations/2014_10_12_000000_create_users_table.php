<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id'); 
            $table->string('u_email')->default(0);
            $table->string('u_password');
            $table->string('mobile_no');
            $table->unsignedBigInteger('registration_type')->default(0);
            $table->string('payment_proof')->default('null'); 
            $table->string('project_presentation')->default('null'); 
            $table->string('ip_address')->default('null');
            $table->boolean('is_project_uploaded')->default(false);
            $table->boolean('is_payment_done')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('users');
    }
}
