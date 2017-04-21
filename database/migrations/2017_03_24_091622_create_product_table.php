<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sale')->unsigned();
            $table->foreign('id_sale')
                ->references('id')
                ->on('sales')
                ->onDelete('cascade');
            $table->integer('id_supplier')->unsigned();
            $table->foreign('id_supplier')
                ->references('id')
                ->on('suppliers')
                ->onDelete('cascade');
            $table->integer('id_item')->unsigned();
            $table->foreign('id_item')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->longText('detail_product');
            $table->longText('detail_size');
            $table->longText('detail_infomation');
            $table->longText('material_storage');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
    }
}
