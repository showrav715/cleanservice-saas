<?php

namespace App\Http\Helpers;

use App\Models\Generalsetting;
use App\Models\User;
use App\Models\UserGeneralsetting;
use PHPMailer\PHPMailer\PHPMailer;

class EmailHelper
{

    private $mail;
    private $gs;
    public function __construct()
    {
        $this->gs = Generalsetting::first();
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = $this->gs->smtp_host;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $this->gs->smtp_user;
        $this->mail->Password = $this->gs->smtp_pass;
        if ($this->gs->mail_encryption == 'ssl') {
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } else {
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }
        $this->mail->Port = $this->gs->smtp_port;
    }

    public function customMail(array $data)
    {
        try {
            $this->mail->setFrom($this->gs->from_email, $this->gs->from_name);
            $this->mail->addAddress($data['email'], $data['name']);
            $this->mail->addReplyTo($this->gs->from_email, $this->gs->from_name);
            $this->mail->isHTML(true);
            $this->mail->Subject = $data['subject'];
            $this->mail->Body = $data['body'];
            $this->mail->send();
        } catch (\Throwable $th) {
            //dd($th);
        }
    }

    public function sellerMail(array $data)
    {
        
        $gs = UserGeneralsetting::where('user_id', $data['seller_id'])->first();
        $seller = User::findOrFail($data['seller_id']);
        try {
            $this->mail->setFrom($this->gs->from_email, $this->gs->from_name);
            $this->mail->addAddress($data['email'], $data['name']);
            $this->mail->addReplyTo($gs->email, $seller->name);
            $this->mail->isHTML(true);
            $this->mail->Subject = $data['subject'];
            $this->mail->Body = $data['body'];
            $this->mail->send();
        } catch (\Throwable $th) {
            //dd($th);
        }
    }

}
