<?php


class SendInvoice extends CI_Controller
{

    private $user_mail = "";
    private $user_pass = "";
    private $mail_host = "";
    private $mail_port = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_mail = "52d0335c854270";
        $this->user_pass = "01bf37851631c1";
        $this->mail_host = "smtp.mailtrap.io";
        $this->mail_port = 2525;
    }

    public function send($receiver, $message)
    {
        try {
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => $this->mail_host,
                'smtp_port' => $this->mail_port,
                'smtp_user' => $this->user_mail,
                'smtp_pass' => $this->user_pass, // informasi rahasia ini jangan di gunakan sembarangan
                // 'smtp_crypto' => 'ssl',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']);
            $this->email->to($receiver);
            $this->email->subject('Invoice');
            $this->email->message($message);

            return $this->email->send();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
