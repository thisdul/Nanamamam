<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->integer('users_id');
            // Hapus
            $table->string('shipping_method');
            // hapus
            $table->integer('delivery_fee');
            // Hapus
            $table->integer('total_product');
            $table->integer('total_price');
            $table->string('transaction_status');//    UNPAID/PENDING/SUCCESS/FAILED




            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
};
