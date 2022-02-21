<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->text('embed_video')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 10,0);
            $table->decimal('wholesale_price', 10,0)->nullable();
            $table->enum('category',['none','1','2','3','4'])->default('none');
            $table->text('description')->nullable();
            $table->integer('status')->default(0);
            $table->integer('stock')->default(0);
            $table->foreignId('vendor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('set null');
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
        Schema::dropIfExists('products');
    }
}
