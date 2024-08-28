<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');           
            $table->float('price',10,3);
            $table->integer('quantity');
            $table->integer('product_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_details',function(Blueprint $table){
            $table->dropForeign('order_details_product_id_foreign');
        });
        Schema::table('products',function(Blueprint $table){
            $table->dropForeign('order_details_oreder_id_foreign');
        });
        Schema::dropIfExists('order_details');
    }
};
