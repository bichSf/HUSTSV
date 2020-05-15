<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailRegister extends Mailable
{
    /**
     * Send mail verified
     *
     * @param array $infoSendMail
     */
    public function sendMailVerified(array $infoSendMail)
    {
        Mail::send('register/form_mail', ['link' => $infoSendMail['link_verified']], function ($message) use ($infoSendMail) {
            $message->from('tranbichbk@gmail.com', 'HUSTSV');
            $message->to($infoSendMail['email'], 'HUSTSV')->subject(trans('mail_attributes.mail_register.title'));
        });
    }
}
