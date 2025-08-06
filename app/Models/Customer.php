<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    protected $fillable = [
        'package_id',
        'name',
        'email',
        'phone',
        'id_number',
        'passport_number',
        'visa_number',
        'birth_date',
        'address',
        'gender',
        'status',
        'total_payment',
        'paid_amount',
        'notes',
        'travel_date',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'travel_date' => 'date',
        'total_payment' => 'decimal:2',
        'paid_amount' => 'decimal:2',
    ];

    /**
     * Get the package that owns the customer.
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get the status badge color.
     */
    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
            'confirmed' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
            'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
            default => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
        };
    }

    /**
     * Get the gender label.
     */
    public function getGenderLabelAttribute(): string
    {
        return match($this->gender) {
            'male' => 'Laki-laki',
            'female' => 'Perempuan',
            default => '-',
        };
    }

    /**
     * Get the remaining amount.
     */
    public function getRemainingAmountAttribute(): float
    {
        return $this->total_payment - $this->paid_amount;
    }

    /**
     * Get the payment status.
     */
    public function getPaymentStatusAttribute(): string
    {
        if ($this->paid_amount >= $this->total_payment) {
            return 'lunas';
        } elseif ($this->paid_amount > 0) {
            return 'dana_masuk';
        } else {
            return 'belum_bayar';
        }
    }

    /**
     * Get the payment status badge color.
     */
    public function getPaymentStatusBadgeAttribute(): string
    {
        return match($this->payment_status) {
            'lunas' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
            'dana_masuk' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
            'belum_bayar' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
            default => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
        };
    }

    /**
     * Get the payment status label.
     */
    public function getPaymentStatusLabelAttribute(): string
    {
        return match($this->payment_status) {
            'lunas' => 'Lunas',
            'dana_masuk' => 'Dana Masuk',
            'belum_bayar' => 'Belum Bayar',
            default => 'Unknown',
        };
    }

    /**
     * Get the excess amount if overpaid.
     */
    public function getExcessAmountAttribute(): float
    {
        return max(0, $this->paid_amount - $this->total_payment);
    }

    /**
     * Check if customer has overpaid.
     */
    public function getIsOverpaidAttribute(): bool
    {
        return $this->paid_amount > $this->total_payment;
    }
}
