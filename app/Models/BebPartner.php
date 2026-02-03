<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BebPartner extends Model
{
    protected $fillable = [
        'name',
        'contact_name',
        'phone',
        'email',
        'code',
        'discount_type',
        'discount_value',
        'is_active',
        'valid_from',
        'valid_until',
        'notes',
    ];

    protected $casts = [
        'discount_value' => 'decimal:2',
        'is_active' => 'boolean',
        'valid_from' => 'date',
        'valid_until' => 'date',
    ];

    /**
     * Scope per B&B attivi
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope per B&B con sconto valido (attivo + nel periodo di validità)
     */
    public function scopeValid($query)
    {
        $today = now()->toDateString();
        return $query->where('is_active', true)
            ->where(function ($q) use ($today) {
                $q->whereNull('valid_from')->orWhere('valid_from', '<=', $today);
            })
            ->where(function ($q) use ($today) {
                $q->whereNull('valid_until')->orWhere('valid_until', '>=', $today);
            });
    }

    /**
     * Ottieni lo sconto formattato
     */
    public function getFormattedDiscountAttribute()
    {
        if ($this->discount_type === 'percentage') {
            return $this->discount_value . '%';
        }
        return '€' . number_format($this->discount_value, 2, ',', '.');
    }

    /**
     * Ottieni il link per il B&B
     */
    public function getLinkAttribute()
    {
        return url('/pranzo?code=' . $this->code);
    }
}
