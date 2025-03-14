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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_measurement')->nullable();

            $table->tinyInteger('mk')->default(0);
            $table->tinyInteger('mkcold')->default(0);
            $table->tinyInteger('osv')->default(0);
            $table->tinyInteger('osvEvak')->default(0);
            $table->tinyInteger('sh')->default(0);
            $table->tinyInteger('shobSgr')->default(0);
            $table->tinyInteger('shokolSr')->default(0);
            $table->tinyInteger('vent')->default(0);
            $table->tinyInteger('klim')->default(0);
            $table->tinyInteger('f0')->default(0);
            $table->tinyInteger('z')->default(0);
            $table->tinyInteger('m')->default(0);
            $table->tinyInteger('izol')->default(0);
            $table->tinyInteger('dtz')->default(0);

            $table->string('way_of_showing_documentation')->nullable();
            $table->string('certificate_number')->nullable();
            $table->date('certificate_date')->nullable();

            $table->date('date_of_next_measurement')->nullable();

            $table->tinyInteger('mk_next')->default(0);
            $table->tinyInteger('mkcold_next')->default(0);
            $table->tinyInteger('osv_next')->default(0);
            $table->tinyInteger('osvEvak_next')->default(0);
            $table->tinyInteger('sh_next')->default(0);
            $table->tinyInteger('shobSgr_next')->default(0);
            $table->tinyInteger('shokolSr_next')->default(0);
            $table->tinyInteger('vent_next')->default(0);
            $table->tinyInteger('klim_next')->default(0);
            $table->tinyInteger('f0_next')->default(0);
            $table->tinyInteger('z_next')->default(0);
            $table->tinyInteger('m_next')->default(0);
            $table->tinyInteger('izol_next')->default(0);
            $table->tinyInteger('dtz_next')->default(0);

            $table->string('invoice')->nullable();
            $table->string('payment_method')->nullable();
            $table->date('invoice_date')->nullable();
            $table->double('price_no_vat')->nullable();

            $table->tinyInteger('paid')->default(0);
            $table->double('contractor_sum')->nullable();
            $table->double('total_sum')->nullable();

            $table->unsignedBigInteger('client_id');//->onDelete('cascade'); //->nullable()
            $table->unsignedBigInteger('contractor_id')->nullable();
            $table->string('contractor')->nullable();
            $table->text('courrier_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
