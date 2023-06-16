<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('home_page_title');
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->string('og_title');
            $table->string('og_description');
            $table->text('page_text');
            $table->string('blogs_page_title');
            $table->text('blogs_page_meta_keywords');
            $table->text('blogs_page_meta_description');
            $table->text('blogs_page_og_title');
            $table->text('blogs_page_og_description');
            $table->integer('blogs_per_page')->default(12);
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
        Schema::dropIfExists('site_settings');
    }
};
