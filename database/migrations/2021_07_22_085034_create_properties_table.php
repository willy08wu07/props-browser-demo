<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('display_name')->comment('產品名稱');
            $table->foreignId('brand_id')
                ->comment('廠牌 ID')
                ->index()
                ->constrained()
                ->restrictOnDelete();
            $table->bigInteger('original_price')->comment('原價');
            $table->bigInteger('special_price')->comment('特價');
            $table->string('img_url')->comment('產品圖片檔路徑');
            $table->index(['special_price', 'brand_id']);
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
        Schema::dropIfExists('properties');
    }
}
