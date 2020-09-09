<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('web_title');
            $table->string('service_header');
            $table->string('service_title');
            $table->text('service_description');
            $table->string('company_title');
            $table->string('company_header');
            $table->string('about_video');
            $table->string('about_img');
            $table->string('features_header');
            $table->string('features_title');
            $table->text('features_description');
            $table->string('contact_header');
            $table->string('contact_title');
            $table->string('contact_number');
            $table->string('contact_email')->unique();
            $table->string('contact_address');
            $table->string('blog_header');
            $table->string('blog_title');
            $table->text('blog_description');
            $table->text('about_description');
            $table->text('about_title');
            $table->string('privacy_policy_title');
            $table->string('privacy_policy_description');
            $table->string('footer_description');
            $table->string('footer');
            $table->text('map_url');
            $table->string('color');
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
        Schema::dropIfExists('generals');
    }
}
