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
        Schema::create('project_details', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('user_id')->default(0); 
            $table->string('project_title')->default(0); 
            $table->unsignedBigInteger('academic_year')->default(0);
            $table->unsignedBigInteger('education_type')->default(0);
            $table->string('institute_other_name')->default('null');
            $table->string('payment_type')->default('null');
            $table->string('transaction_details')->default('null');
            $table->unsignedBigInteger('name_of_institute')->default(0);
            $table->string('name_of_institute_other')->default('null');
            $table->unsignedBigInteger('branch_details')->default(0);
            $table->string('other_branch_details')->default('null');
            $table->string('project_code')->default('null');


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
        Schema::dropIfExists('project_details');
    }
};