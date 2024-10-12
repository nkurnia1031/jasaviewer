<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom baru
            $table->dropColumn('name');
            $table->string('nama')->comment('Nama');
            $table->string('email')->comment('Email')->change();
            $table->string('nohp')->unique()->comment('No Hp');
            $table->string('password')->comment('Password')->change();
            $table->integer('deposit')->default(0)->comment('Deposit');
            $table->integer('point')->default(0)->comment('Point');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom yang ditambahkan
            $table->string('name');
            $table->dropColumn('nama');
            $table->dropColumn('nohp');
            $table->dropColumn('deposit');
            $table->dropColumn('point');
        });
    }
}
