<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailchimpListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailchimp_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mailchimp_list_id', 20)->nullable();
            $table->string('list_name', 20)->nullable();
            $table->integer('shop_id')->unsigned();
            $table->boolean('is_active')->default(false);            
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
        Schema::dropIfExists('mailchimp_lists');
    }
}
