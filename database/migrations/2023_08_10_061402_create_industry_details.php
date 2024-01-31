<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustryDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
               Schema::create('industry_details', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('user_id')->default(0); 
            $table->string('project_title')->default(0); 
            $table->string('payment_type')->default('null');
            $table->string('transaction_details')->default('null');
            $table->unsignedBigInteger('industry_type')->default(0);
            $table->string('industry_name')->default('null');
            $table->string('product_type')->default('null');
            $table->string('industry_code')->default('null');
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
        Schema::dropIfExists('industry_details');
    }
}
