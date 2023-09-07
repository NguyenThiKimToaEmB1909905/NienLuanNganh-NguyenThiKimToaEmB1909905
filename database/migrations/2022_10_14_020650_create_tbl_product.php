<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->Increments('product_id');
            $table->integer('category_id');//mã danh mục
            $table->integer('brand_id');// mã thương hiệu
            $table->text('product_desc');// mô tả
            $table->text('product_content');// nội dung sản phẩm
            $table->string('product_price');// giá 
            $table->string('product_image');// hình ảnh
            $table->integer('product_status');// hiện trang, trạng thái
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
        Schema::dropIfExists('tbl_product');
    }
}
