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
        Schema::create('lists', function (Blueprint $table) {
            //$table->increments('id');
            $table->uuid('id');
            $table->boolean('email_type_option');
            $table->string('mailchimpId');
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
