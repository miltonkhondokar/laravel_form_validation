<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id()->unsigned()->unique();
            $table->integer('amount', false, true)->nullable()->length(10);
            $table->string('buyer')->length(255);
            $table->string('receipt_id')->length(20);
            $table->string('items')->nullable()->length(255);
            $table->string('buyer_email')->length(50);
            $table->ipAddress('buyer_ip')->length(20);
            $table->text('note')->nullable();
            $table->string('city')->nullable()->length(20);
            $table->string('phone')->length(20);
            $table->string('hash_key')->length(255);
            $table->date('entry_at');
            $table->integer('entry_by');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
