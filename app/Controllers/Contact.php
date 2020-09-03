<?php namespace App\Controllers;
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
class Contact extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }
 
    public function index()
    {
        echo view('layouts/header');
        echo view('v_contact');
        echo view('layouts/footer');
    }
 
    public function send()
    {
        $to                 = $this->request->getPost('to');
        $subject            = $this->request->getPost('subject');
        $message            = $this->request->getPost('message');
 
        $mail = new PHPMailer(true);
 
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.googlemail.com';   
            $mail->SMTPAuth   = true;
            $mail->Username   = 'email_gmail_anda@gmail.com'; // silahkan ganti dengan alamat email Anda
            $mail->Password   = 'password_email_gmail_anda'; // silahkan ganti dengan password email Anda
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
 
            $mail->setFrom('email_gmail_anda@gmail.com', 'CACAN'); // silahkan ganti dengan alamat email Anda
            $mail->addAddress($to);
            $mail->addReplyTo('blog.cacan.id@gmail.com', 'BLOG CACAN'); // silahkan ganti dengan alamat email Anda
            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
 
            $mail->send();
            session()->setFlashdata('success', 'Send Email successfully');
            return redirect()->to(site_url('contact')); 
        } catch (Exception $e) {
            session()->setFlashdata('error', "Send Email failed. Error: ".$mail->ErrorInfo);
            return redirect()->to(site_url('contact'));
        }
    }
}