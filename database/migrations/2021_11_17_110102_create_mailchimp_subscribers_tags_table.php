<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailchimpSubscribersTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailchimp_subscribers_tags', function (Blueprint $table) {            

            $table->unsignedBigInteger('mailchimp_subscriber_id');

            $table->foreign('mailchimp_subscriber_id')->references('id')->on('mailchimp_subscribers');

            $table->unsignedInteger('mailchimp_tag_id');
            $table->foreign('mailchimp_tag_id')->references('id')->on('mailchimp_tags');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailchimp_subscribers_tags');
    }
}
