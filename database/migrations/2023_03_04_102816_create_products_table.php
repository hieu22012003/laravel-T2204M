<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("thumbnail")->nullable();
            $table->decimal("price",12,4)->default(0);
            $table->unsignedInteger("qty")->default(0);
            $table->text("description")->nullable();
            $table->string("unit",50);
            $table->boolean("status")->default(true);
            $table->unsignedBigInteger("category_id");// kiểu dữ liệu khớp với ->id()
            $table->foreign("category_id")->references("id")->on("categories");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
