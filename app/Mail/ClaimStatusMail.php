<?php

namespace App\Mail;

use App\Models\Claim;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClaimStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $claim;

    public function __construct(Claim $claim)
    {
        $this->claim = $claim;
    }

    public function build()
    {
        $subject = $this->claim->status === 'Disetujui' 
            ? 'Klaim Anda Disetujui - ReturnLy' 
            : 'Klaim Anda Ditolak - ReturnLy';

        return $this->subject($subject)
                    ->view('emails.claim.status')
                    ->with([
                        'claimNumber' => $this->claim->claim_number,
                        'itemName' => $this->claim->foundItem->item_name,
                        'status' => $this->claim->status,
                        'adminNotes' => $this->claim->admin_notes,
                        'claimantName' => $this->claim->claimant_name,
                        'claimDate' => $this->claim->created_at->format('d M Y'),
                    ]);
    }
}