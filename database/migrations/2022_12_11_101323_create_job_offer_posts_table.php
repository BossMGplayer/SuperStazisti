<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOfferPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_offer_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('job_title');
            $table->enum('workplace',['on-site', 'hybrid', 'remote']);
            $table->enum('employment_type',['full_time','part_time','contract', 'temporary', 'volunteer', 'internship', 'other']);
            $table->string('address');
            $table->integer('pay');
            $table->text('description');
            $table->string('type')->default('offer');
            $table->string('email');
            $table->string('phone_number');
            $table->text('tags')->nullable();
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
        Schema::dropIfExists('job_offer_posts');
    }
}
