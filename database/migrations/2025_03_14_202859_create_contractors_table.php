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
        Schema::create('contractors', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('contractor_name');
            $table->string('contractor_uic');
            $table->string('contractor_vat')->nullable();
            $table->string('contractor_contact_person');
            $table->string('contractor_phone_number');
            $table->string('contractor_more_info')->nullable();
            $table->integer('commission_percentage');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractors');
    }
};
