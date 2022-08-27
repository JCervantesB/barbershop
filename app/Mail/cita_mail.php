<?php

namespace App\Mail;

use App\Models\citas;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class cita_mail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
         
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    //redireccionando la vista de el mensaje que se enviara por mail
    public function build()
    {  $citas = citas::where('user_id',auth()->user()->id)->get();
       
        return $this->view('mails.email_cita',[
                                              'citas' => $citas
                                            ]);
    }
}
