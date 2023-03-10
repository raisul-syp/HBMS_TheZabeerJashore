<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Hotel Reservation";
        return $this->from('reservation@thezabeerjashore.com', 'The Zabeer Jashore Reservation Team')
                    ->to([$this->data['guest_email'], 'reservation@thezabeerjashore.com'])
                    ->cc(['branding@thezabeerjashore.com', 'fo@thezabeerjashore.com'])
                    ->subject($subject)
                    ->with($this->data)
                    ->view('mail-template.booking');
    }

}
