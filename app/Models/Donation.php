<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'victim_id',
        'construction_status',
    ];

    /**
     * Get the user associated with the Donation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get the victim associated with the Donation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function victim()
    {
        return $this->hasOne(victim::class, 'id', 'victim_id');
    }

    /**
     * Get the DonationInvoice associated with the Donation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function DonationInvoice()
    {
        return $this->hasOne(DonationInvoice::class, 'donation_id', 'id');
    }
}
