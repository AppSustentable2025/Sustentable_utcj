<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarCredencialesMail extends Mailable
{
    use Queueable, SerializesModels;

    public $matricula;
    public $password;

    public function __construct($matricula, $password)
    {
        $this->matricula = $matricula;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Tus Credenciales de Acceso')
                    ->view('emails.credenciales')
                    ->with([
                        'matricula' => $this->matricula,
                        'password' => $this->password,
                    ]);
    }
}
