<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->unique();
            $table->string('category_slug')->unique();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_menu')->default(0);
            $table->boolean('is_footer')->default(0);
            $table->boolean('status')->default(0);
            $table->integer('parent_id')->default(0);
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
        Schema::dropIfExists('categories');
    }
}
