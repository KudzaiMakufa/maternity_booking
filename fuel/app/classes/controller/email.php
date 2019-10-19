<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH.'classes/phpmailer/src/Exception.php';
require APPPATH.'classes/phpmailer/src/PHPMailer.php';
require APPPATH.'classes/phpmailer/src/SMTP.php';


class Controller_Email extends Controller_Template
{

    public function action_index()
	{
    

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'tls://smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'kidkudzy@gmail.com';                     // SMTP username
            $mail->Password   = 'passwordremoved';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('kidkudzy@gmail.com', 'Mailer');
            $mail->addAddress('promiseksystems@gmail.com', 'Joe User');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            // // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        // // Create an instance
        // $email = Email::forge();

        // // Set the from address
        // $email->from('kidkudzy@gmail.com');

        // // Set the to address
        // $email->to('kidkudzy@gmail.com', 'Johny Squid');

        // // Set a subject
        // $email->subject('This is the subject');

        // // Set multiple to addresses

    

        // // And set the body.
        // $email->body('This is my message');

        // try
        // {
        //     if( $email->send()){
        //     $num = 1 ;

        //     Debug::dump($num);die;
        // }
        // }
        // catch(\EmailValidationFailedException $e)
        // {
        // // The validation failed
        // }
        // catch(\EmailSendingFailedException $e)
        // {
        // // The driver could not send the email
        // }
        
        

     $this->template->title = "Email";
	 $this->template->content = View::forge('test/test');

	}


}