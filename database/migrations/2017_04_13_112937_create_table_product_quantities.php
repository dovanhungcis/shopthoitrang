<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductQuantities extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('product_quantities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->integer('size_id')->unsigned();
            $table->foreign('size_id')
                ->references('id')
                ->on('product_sizes')
                ->onDelete('cascade');
            $table->integer('color_id')->unsigned();
            $table->foreign('color_id')
                ->references('id')
                ->on('product_colors')
                ->onDelete('cascade');
            $table->integer('price');
            $table->integer('price_sale');
            $table->integer('quantity');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('product_quantities');
    }
}
