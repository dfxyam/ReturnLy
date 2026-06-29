<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Claim extends Model
{
    protected $fillable = [
        'found_item_id',
        'claimant_name',
        'email',
        'phone_number',
        'class_name',
        'proof_description',
        'proof_photo',
        'claim_number',
        'status',
        'admin_notes',
        'processed_at',
    ];

    protected $casts = [
        'processed_at' => 'datetime',
    ];

    // Relationship: Claim belongs to FoundItem
    public function foundItem(): BelongsTo
    {
        return $this->belongsTo(FoundItem::class);
    }

    // Generate unique claim number
    public static function generateClaimNumber(): string
    {
        $date = now()->format('Ymd');
        $random = strtoupper(substr(uniqid(), -6));
        return "CLM-{$date}-{$random}";
    }

    // Scope: Get pending claims
    public function scopePending($query)
    {
        return $query->where('status', 'Pending');
    }

    // Scope: Get approved claims
    public function scopeApproved($query)
    {
        return $query->where('status', 'Disetujui');
    }

    // Scope: Get rejected claims
    public function scopeRejected($query)
    {
        return $query->where('status', 'Ditolak');
    }
}