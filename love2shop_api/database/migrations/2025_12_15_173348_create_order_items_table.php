<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const TABLE = 'order_items';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Table intended as a join table between orders and a hypothetical items table that
        // is not implemented here
        Schema::create(self::TABLE, function (Blueprint $table) {
            // ID might not be needed for items, but this could be useful in an ordering system
            // so we'll keep it here
            $table->id();
            $table->integer('order_id')->unsigned();
            $table->integer('item_id');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
};
