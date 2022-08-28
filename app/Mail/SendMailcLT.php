<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailcLT extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nom;
    public $mail;
    public $tel;
    public $sujet; 
    public $msg;

    public function __construct($nom,$mail,$tel,$sujet,$msg)
    {
        $this->nom  =$nom ;
        $this->mail  =$mail ;
        $this->tel  =$tel ;
        $this->sujet  =$sujet ;
        $this->msg  =$msg ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('DIANYS - CLIENT')->markdown('emails.messageClt');
    }
}
