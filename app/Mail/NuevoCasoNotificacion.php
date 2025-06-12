<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Casos;

class NuevoCasoNotificacion extends Mailable
{
    use Queueable, SerializesModels;

    public $caso;
    public $medico;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($caso, $medico)
    {
        $this->caso = $caso;
        $this->medico = $medico;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo caso asignado para revisión')
                    ->view('emails.nuevo_caso');
    }
}
