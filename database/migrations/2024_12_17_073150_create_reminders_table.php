<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('reminder_name');
            $table->string('reminder_desc');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('frequency_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->decimal('reminder_amount', 15, 2)->nullable();
            $table->decimal('total_paid', 15, 2)->default(0); // Tambahkan kolom total_paid
            $table->date('start_date');
            $table->string('status')->default('pending');
            $table->timestamps();


            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('frequency_id')->references('id')->on('frequencies')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reminders');
    }
}