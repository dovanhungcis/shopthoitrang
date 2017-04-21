<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceProductTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('invoice_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_invoice')->unsigned();
            $table->foreign('id_invoice')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade');
            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')
                ->references('id')
                ->on('product_quantities')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('invoice_product');
    }
}