<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('carts',function(Blueprint $table)
    {
        $table->dropForeign('carts_user_id_foreign');
        $table->dropForeign('carts_product_id_foreign');
        $table->dropColumn('user_id');
        $table->dropColumn('product_id');
    });
    }
}
