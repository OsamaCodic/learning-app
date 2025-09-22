<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PostEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $subjectTxt, $messageTxt;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subject, $msg)
    {
        $this->subjectTxt = $subject;
        $this->messageTxt = $msg;
    }

    public function build()
    {
        return $this->subject($this->subjectTxt)
            ->view('emails.body')
            ->with([
                'subject' => $this->subjectTxt,
                'msg' => $this->messageTxt
            ]);
    }
}
