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
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->timestamps();
        });

        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('image')->nullable(false);
            $table->text('description');
            $table->unsignedInteger('price')->nullable(false);
            $table->bigInteger('quantity')->default(0);
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable(false);
            $table->unsignedBigInteger('book_id')->nullable(false);
            $table->unsignedInteger('price')->nullable(false);
            $table->bigInteger('quantity')->nullable(false);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('user_id');
            $table->string('cus_name')->nullable(false);
            $table->string('cus_phone')->nullable(false);
            $table->string('type')->nullable(false);
            $table->string('ship_to_address')->nullable(false);
            $table->bigInteger('total')->nullable(false);
            $table->string('payment_method')->nullable(false);
            $table->string('status')->nullable(false);
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('level')->after('remember_token');
            $table->string('avatar')->nullable(false)->after('level');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('order_detail', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
