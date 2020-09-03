<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosCategoriasItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_categorias_items', function (Blueprint $table) {
            $table->BigInteger('prod_id')->unsigned();
            $table->BigInteger('cat_id')->unsigned();
            $table->BigInteger('item_id')->unsigned();

            $table->foreign('prod_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');

            $table->primary(['prod_id','cat_id','item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_categorias_items');
    }
}
