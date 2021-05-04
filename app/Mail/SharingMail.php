<?php

namespace App\Mail;

use App\Models\Document;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class SharingMail extends Mailable
{
    use Queueable, SerializesModels;

    private $document_hashid;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($hashid)
    {
        $this->document_hashid = $hashid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $document = Document::where('hashid', $this->document_hashid)->first();
        
        return $this->markdown('emails.send', ['document'=> $document]);
    }
}
