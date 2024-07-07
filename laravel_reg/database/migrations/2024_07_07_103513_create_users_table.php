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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id',100)->primary();
            $table->varchar('family_name',100);
            $table->varchar('last_name',100);
            $table->varchar('family_name_kana',100);
            $table->varchar('last_name_kana',100);
            $table->varchar('mail',255);
            $table->varchar('password',255);
            $table->int('gender',1);
            $table->int('postal_code',7);
            $table->varchar('prefecture',100);
            $table->varchar('address_1',100);
            $table->varchar('address_2',255);
            $table->int('authority',1);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
