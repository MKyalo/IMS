<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->engine = 'InnoDB';
            $table->id();
            $table->timestamps();
            $table->string('serial_no');
            $table->string('product_name');
            $table->string('description');
            $table->date('purchase_date');
            $table->integer('purchase_price');
            $table->integer('retail_price');
            $table->biginteger('category_id')->unsigned()->default('00');
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('set default');
            $table->biginteger('supplier_id')->unsigned()->default('00');
           // $table->foreign('supplier_id') ->references('id')->on('suppliers')->onDelete('set default');
            $table->integer('quantity');

           
          
            

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
