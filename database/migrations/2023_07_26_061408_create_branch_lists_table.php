<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_lists', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('education_type')->default(0);
            // $table->unsignedBigInteger('institute_university_id')->default(0);
            $table->string('branch_name')->default('null');
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
        Schema::dropIfExists('branch_lists');
    }
}