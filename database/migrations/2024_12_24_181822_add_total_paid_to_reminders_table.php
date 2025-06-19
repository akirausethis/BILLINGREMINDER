<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalPaidToRemindersTable extends Migration
{
    public function up()
    {
        Schema::table('reminders', function (Blueprint $table) {
            $table->decimal('total_paid', 15, 2)->default(0)->change(); // Mengubah kolom total_paid untuk memastikan default 0
        });
    }

    public function down()
    {
        Schema::table('reminders', function (Blueprint $table) {
            // Anda bisa menghapus kolom ini jika perlu, atau mengubahnya kembali
            $table->dropColumn('total_paid'); // Hati-hati dengan ini, pastikan Anda tidak kehilangan data
        });
    }
}