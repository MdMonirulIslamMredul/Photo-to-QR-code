<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeLicence extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * Assuming your migration creates the table 'trade_licences'.
     * You MUST verify this name matches the one used in your Schema::create() call.
     *
     * @var string
     */
    protected $table = 'trade_licences';

    /**
     * The attributes that are mass assignable.
     * Includes all fields from your migration except 'id' and timestamps.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Account & License Details

        'email',
        'password',
        'applicant_image',
        't_issue_date',
        't_issue_time',
        'licence_number',

        // Business & Applicant Details
        'business_name',
        'applicant_name',
        'father_husband_name',
        'mother_name',
        'business_nature',
        'business_type',
        'business_address',
        'regional',
        'area',
        'word_no',
        'nid_number',
        'mobile_number',
        'fiscal_year',
        'business_start_date',

        // Present Address Details
        'pres_holding',
        'pres_road',
        'pres_village',
        'pres_postcode',
        'pres_thana',
        'pres_district',
        'pres_division',

        // Permanent Address Details
        'perm_holding',
        'perm_road',
        'perm_village',
        'perm_postcode',
        'perm_thana',
        'perm_district',
        'perm_division',

        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     * Use the modern casts() method for password hashing and dates.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // Security: Ensures the password is automatically hashed before saving
            'password' => 'hashed',

        ];
    }
}
