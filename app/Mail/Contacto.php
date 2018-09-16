<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contacto extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $mail;
    public $subject;
    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$mail,$subject,$msg)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->subject = $subject;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contacto')
            ->with(['name'=>$this->name,
                'mail'=>$this->mail,
                'subject'=>$this->subject,
                'msg'=>$this->msg]
            );
    }
}
