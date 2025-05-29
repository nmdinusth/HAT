<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpNofitication extends Mailable
{
    use Queueable, SerializesModels;

    public $otp_code;
    public $expiresAt;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($otp_code, $expiresAt)
    {
        $this->otp_code = $otp_code;
        $this->expiresAt = $expiresAt->format('H:i d/m/Y');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Mã OTP xác thực 2 bước',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'clients.mail.otp_activation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
