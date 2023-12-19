<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PurchaseMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendCampaignEmail($email, $subject, $message): array|string
    {
            $mailData = [
                'email_address' => $email,
                'subject' => $subject,
                'message' => $message,
            ];
            $mail = Mail::to($email_address)->send(new PurchaseMail($mailData));
            if($mail){
                return true;
            }else{
                return false;
            }
        }
}
