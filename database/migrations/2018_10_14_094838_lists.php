<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_chimp_lists', function (Blueprint $table) {
            //$table->increments('id');
            $table->string('campaign_defaults');
            $table->string('contact');
            $table->boolean('email_type_option');
            $table->uuid('id');
            $table->string('mail_chimp_id');
            $table->string('name');
            $table->string('notify_on_subscribe');
            $table->string('notify_on_unsubscribe');
            $table->string('permission_reminder');
            $table->string('use_archive_bar');
            $table->string('visibility');
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
        Schema::dropIfExists('lists');
    }
}
