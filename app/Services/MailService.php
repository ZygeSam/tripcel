<?php

namespace App\Services;

use App\Mail\PurchaseMail;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;

class MailService 
{
    public function sendPurchaseInfo($user, $subject, $qrCodes): array|string
    {

        $mailData=[
            "email_address"=>$user,
            "subject" => $subject,
            "message" => $qrCodes
        ];
        $mail =Mail::to($user)->send(new PurchaseMail($mailData));
            if($mail){
                foreach ($mailData['message'] as $key => $item) {
                    unlink(public_path($item));
                }
                return true;
            }else{
                return false;
            }
        }
}
