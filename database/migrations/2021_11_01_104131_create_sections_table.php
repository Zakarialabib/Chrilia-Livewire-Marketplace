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
            $table->text('title');
            $table->string('image')->nullable();
            $table->text('featured_title')->nullable();
            $table->text('label')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1);
            $table->string('bg_color')->nullable();
            $table->enum('position',['none','1','2','3','4'])->default('none');
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
