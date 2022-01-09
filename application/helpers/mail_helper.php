<?php


function setEmail()
{
    try {
        $user_mail = "52d0335c854270";
        $user_pass = "01bf37851631c1";
        $mail_host = "smtp.mailtrap.io";
        $mail_port = 2525;
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => $mail_host,
            'smtp_port' => $mail_port,
            'smtp_user' => $user_mail,
            'smtp_pass' => $user_pass, // informasi rahasia ini jangan di gunakan sembarangan
            // 'smtp_crypto' => 'ssl',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        return $config;
    } catch (\Throwable $th) {
        throw $th;
    }
}
