<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->double('price')->unsigned()->default(0);
            $table->text('description')->nullable();
            $table->string('direction')->default('front');
            $table->string('image_front')->default('assets/images/no_img.png');
            $table->string('image_back')->default('assets/images/no_img.png');
            $table->boolean('can_customize')->default(false);
            $table->boolean('bestseller')->default(false);

            $table->bigInteger("category_id")->unsigned();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
