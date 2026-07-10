<?php

namespace App\Mail;

use App\Models\Claim;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClaimSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $claim;

    public function __construct(Claim $claim)
    {
        $this->claim = $claim;
    }

    public function build()
    {
        return $this->subject('Konfirmasi Pengajuan Klaim - ReturnLy')
                    ->view('emails.claim.submitted')
                    ->with([
                        'claimNumber' => $this->claim->claim_number,
                        'itemName' => $this->claim->foundItem->item_name,
                        'claimantName' => $this->claim->claimant_name,
                        'foundDate' => $this->claim->foundItem->found_date->format('d M Y'),
                        'locationName' => $this->claim->foundItem->location->name,
                    ]);
    }
}