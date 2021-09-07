<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminGenerated extends Mailable
{
    use Queueable, SerializesModels;

    private $admin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin)
    {
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.admin.generated')
                    ->from('no-reply@example.com', config('app.name'))
                    ->subject(config('app.name') .': Admin Generated')
                    ->with(['admin' => $this->admin]);
    }
}
