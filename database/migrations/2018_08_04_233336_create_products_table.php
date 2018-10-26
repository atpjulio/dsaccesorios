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
            $table->increments('id');
            $table->decimal('price', 10, 2);
            $table->string('name', 50);
            $table->text('description');
            $table->unsignedInteger('quantity');
            $table->text('picture');
            $table->unsignedTinyInteger('category_id')->nullable();
            $table->unsignedInteger('purchases')->default(0); // Times that has been purchased
            $table->unsignedInteger('counter')->default(0);   // Quantity that has been purchased
            $table->unsignedInteger('likes')->default(0);
            $table->unsignedInteger('created_by')->default(1);
            $table->boolean('show')->default(1);
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
        Schema::dropIfExists('products');
    }
}
