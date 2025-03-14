<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use OpenApi\Annotations as OA;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /**
         * @OA\Schema(
         *     schema="Client",
         *     type="object",
         *     required={"name", "email", "phone"},
         *     @OA\Property(property="id", type="integer"),
         *     @OA\Property(property="name", type="string"),
         *     @OA\Property(property="email", type="string"),
         *     @OA\Property(property="phone", type="string"),
         *     @OA\Property(property="created_at", type="string", format="date-time"),
         *     @OA\Property(property="updated_at", type="string", format="date-time")
         * )
         */

        Schema::create('clients', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('client_name');
            $table->string('client_uic');
            $table->string('client_vat')->nullable();
            $table->string('client_contact')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->text('more_info')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
