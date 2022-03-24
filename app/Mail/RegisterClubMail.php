<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterClubMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;
    
    
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->data["subject"])
                        ->view('functionalities.clubs.mailtemplate')
                        ->with([
                            "receiver"=>$this->data["receiver"], 
                            "email"=>$this->data["email"],
                            "pwd"=>$this->data["pwd"]
                        ]);
    }
}
