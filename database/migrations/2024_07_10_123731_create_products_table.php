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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150);
            $table->float('price',10,3);
            $table->float('sale_price',10,3)->default(0);
            $table->string('img')->nullable();
            $table->string('content')->nullable();
            $table->integer(('brand_id'))->unsigned();
            $table->integer(('category_id'))->unsigned();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('brand_id')->references('id')->on('brand_sps');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products',function(Blueprint $table){
            $table->dropForeign('products_brand_id_foreign');
        });
        Schema::table('products',function(Blueprint $table){
            $table->dropForeign('products_category_id_foreign');
        });
        Schema::dropIfExists('products');
    }
};
