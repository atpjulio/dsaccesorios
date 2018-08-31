<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->text('products'); // In JSON format e.g.: "{"1":3,"93":1,"17":3}" products id:quantity
            $table->decimal('sub_total', 10, 2);
            $table->decimal('shipping', 10, 2);
            $table->decimal('tax', 3, 2)->nullable();
            $table->decimal('total', 10, 2);
            $table->string('status', 10)->nullable(); // Pending or API Response
            $table->longText('transaction_id')->nullable();
            $table->longText('trazability_code')->nullable();
            $table->longText('response_code')->nullable();
            $table->longText('extra_parameters')->nullable();
            $table->longText('card_number')->nullable(); // Encrypted
            $table->string('card_name', 50)->nullable();
            $table->string('exp_month', 2)->nullable();
            $table->string('exp_year', 4)->nullable();
            $table->string('cvv_number', 4)->nullable();
            $table->string('address_country', 2)->default('CO');
            $table->string('address_state', 2)->nullable();
            $table->string('address_city', 50)->nullable();
            $table->string('address_1', 50)->nullable();
            $table->string('address_2', 50)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('notes', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
