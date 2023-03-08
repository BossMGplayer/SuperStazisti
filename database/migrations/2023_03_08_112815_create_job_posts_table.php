<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['offer', 'request']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('job_title');
            $table->enum('workplace',['on-site', 'hybrid', 'remote']);
            $table->enum('employment_type',['full_time','part_time','contract', 'temporary', 'volunteer', 'internship', 'other']);
            $table->string('address');
            $table->string('region');
            $table->integer('pay');
            $table->text('description');
            $table->string('email');
            $table->string('phone_number');
            $table->string('tags')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
}
