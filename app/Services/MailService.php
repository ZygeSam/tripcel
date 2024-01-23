<?php

namespace App\Services;

use App\Mail\PurchaseMail;
use App\Mail\DataPurchaseMail;
use App\Mail\ForgotPasswordMail;
use App\Mail\VerifyEmail;
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

    public function sendDataPurchaseInfo($email, $subject, $message): array|string
    {
            $mailData = [
                'email_address' => $email,
                'subject' => $subject,
                'message' => $message,
            ];
            $mail = Mail::to($email)->send(new DataPurchaseMail($mailData));
            if($mail){
                return true;
            }else{
                return false;
            }
    }

    public function sendForgotPasswordInfo($email, $message){
        $mailData = [
            'message' => $message,
        ];
        $mail = Mail::to($email)->send(new ForgotPasswordMail($mailData));
        if($mail){
            return true;
        }else{
            return false;
        }
    }

    public function sendEmailVerification($email, $message)
    {
        try {
            $mailData = [
                'message' => $message,
            ];
            $mail = Mail::to($email)->send(new VerifyEmail($mailData));
    
            if ($mail) {
                return true; // Email sent successfully
            } else {
                return false; // Email sending failed
            }
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Email sending failed: ' . $e->getMessage());
            return false; // Return false to indicate that the email sending failed
        }
    }

}
