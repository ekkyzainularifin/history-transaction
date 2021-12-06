<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryDataTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_transaction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('transactionable');
            $table->text('field')->nullable();
            $table->string('user_id', 20)->nullable();
            $table->text('original_value')->nullable();
            $table->text('new_valuew')->nullable();
            $table->string('ip', 100)->nullable();
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
        Schema::dropIfExists('log_transaction');
    }
}
