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
        Schema::create('trade_licences', function (Blueprint $table) {

            $table->id();

            $table->string('email')->nullable();
            $table->string('applicant_image')->nullable();

            $table->string('t_issue_date')->nullable();
            $table->string('t_issue_time')->nullable();

            $table->string('licence_number')->nullable();


            $table->string('business_name')->nullable();
            $table->string('applicant_name');
            $table->string('father_husband_name')->nullable();
            $table->string('mother_name')->nullable();

            $table->string('business_nature')->nullable();
            $table->string('business_type')->nullable();
            $table->string('business_address')->nullable();
            $table->string('regional_area')->nullable();
            $table->string('word_no')->nullable();

            $table->string('nid_number')->nullable();
            $table->string('mobile_number')->nullable();

            $table->string('fiscal_year')->nullable();
            $table->string('business_start_date')->nullable();

            $table->string('pres_holding')->nullable();
            $table->string('pres_road')->nullable();
            $table->string('pres_village')->nullable();
            $table->string('pres_postcode')->nullable();
            $table->string('pres_thana')->nullable();
            $table->string('pres_district')->nullable();
            $table->string('pres_division')->nullable();

            $table->string('perm_holding')->nullable();
            $table->string('perm_road')->nullable();
            $table->string('perm_village')->nullable();
            $table->string('perm_postcode')->nullable();
            $table->string('perm_thana')->nullable();
            $table->string('perm_district')->nullable();
            $table->string('perm_division')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_licences');
    }
};





