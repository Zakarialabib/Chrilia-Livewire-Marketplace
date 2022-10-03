<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('discount_price', 150)->nullable();
            $table->string('flash_price,', 80)->nullable();
            $table->string('quantity', 150)->nullable();
            $table->string('brand_id', 80)->nullable();
            $table->string('category_id', 80)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
