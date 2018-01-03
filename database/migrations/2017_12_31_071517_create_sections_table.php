<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('about_title');
            $table->text('about_description');
            $table->string('skill_title');
            $table->text('skill_description');
            $table->string('portfolio_title');
            $table->text('portfolio_description');
            $table->string('service_title');
            $table->text('service_description');
            $table->string('blog_title');
            $table->text('blog_description');
            $table->string('contact_title');
            $table->text('contact_description');
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
        Schema::dropIfExists('sections');
    }
}
