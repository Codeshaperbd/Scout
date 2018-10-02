<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('broker_info_id')->unsigned();
            $table->foreign('broker_info_id')->references('id')->on('broker_infos')->onDelete('cascade');
            $table->string('title',100);
            $table->text('description');
            $table->string('industry')->nullable();
            $table->string('JobCategory',50)->nullable();
            $table->string('location')->nullable();
            $table->string('byemailapply')->nullable();
            $table->string('byurlapply')->nullable();
            $table->string('employment_type',50)->nullable();
            $table->string('education')->nullable();
            $table->integer('qualifications')->nullable();
            $table->text('experience')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('skills')->nullable();
            $table->integer('work_hour')->nullable();
            $table->string('estimated_salary')->nullable();
            $table->string('incentive')->nullable();
            $table->string('base_salary')->nullable();
            $table->boolean('is_active')->default(0);
            $table->softDeletes();
            $table->string('slug');
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
        Schema::dropIfExists('job_posts');
    }
}
