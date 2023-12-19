<?php

namespace App\Services;

use App\Mail\PurchaseMail;
use Illuminate\Support\Facades\Mail;

class MailService 
{
    public function sendPurchaseInfo($user, $subject, $message): array|string
    {
            $mailData = [
                'email_address' => $user['email'],
                'subject' => $subject,
                'message' => $message,
            ];
            
            $mail = Mail::to($user['email'])->send(new PurchaseMail($mailData));
            // Attach the QR code to the email
            // Mail::send('emails.qrcode', ['mailData' => $mailData], function ($message) use ($mailData) {
            //     $message->to($mailData['email_address'])->subject($mailData['subject']);
            //     foreach($$mailData['message'] as $key => $qrCode){
            //         $message->attachData($qrCode, "qrcode{{$key}}.png");
            //     }
            // });
            if($mail){
                return true;
            }else{
                return false;
            }
        }
}
