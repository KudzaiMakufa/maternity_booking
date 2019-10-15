<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH.'classes/phpmailer/src/Exception.php';
require APPPATH.'classes/phpmailer/src/PHPMailer.php';
require APPPATH.'classes/phpmailer/src/SMTP.php';

class Controller_Message extends Controller_Template
{

	public function action_index()
	{

		list(, $userid) = Auth::get_user_id();
		$data['messages'] = Model_Message::find(array('where'=>array('user_id'=>$userid),'order_by'=>array('id'=>'desc')));
		$this->template->title = "Messages";
		$this->template->content = View::forge('message/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('message');

		$data['message'] = Model_Message::find_by_pk($id);

		$this->template->title = "Message";
		$this->template->content = View::forge('message/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Message::validate('create');

			list(, $userid) = Auth::get_user_id();
			$name = Model_Maternity::find_one_by_user_id(Input::post('patient'));

			//DEbug::dump(Input::post('patient'));die;
			
			if ($val->run())
			{
				$message = Model_Message::forge(array(
					'user_id' => Input::post('patient'),
					'patient' => $name->first_name,
					'message'=>Input::post('message'),
					'isread'=>false,
					'created_at' => time(),
					'updated_at' => 0,
				));
				//$mail = new PHPMailer(true);

				try {
					// //Server settings
					// $mail->SMTPDebug = 2;                                       // Enable verbose debug output
					// $mail->isSMTP();                                            // Set mailer to use SMTP
					// $mail->Host       = 'tls://smtp.gmail.com';  // Specify main and backup SMTP servers
					// $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
					// $mail->Username   = 'kidkudzy@gmail.com';                     // SMTP username
					// $mail->Password   = 'laplazean';                               // SMTP password
					// $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
					// $mail->Port       = 587;                                    // TCP port to connect to
				
					// //Recipients
					// $mail->setFrom('kidkudzy@gmail.com', 'Mailer');
					// $mail->addAddress('promiseksystems@gmail.com', 'Joe User');     // Add a recipient
					// // $mail->addAddress('ellen@example.com');               // Name is optional
					// // $mail->addReplyTo('info@example.com', 'Information');
					// // $mail->addCC('cc@example.com');
					// // $mail->addBCC('bcc@example.com');
				
					// // // Attachments
					// // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					// // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
				
					// // Content
					// $mail->isHTML(true);                                  // Set email format to HTML
					// $mail->Subject = 'Here is the subject';
					// $mail->Body    = Input::post('message');
					// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				
					// $mail->send();
					if ($message and $message->save())
					{
						Session::set_flash('success', 'Send message #'.$message->id.'.');
						Response::redirect('message');
					}
					
				} catch (Exception $e) {
					
						Session::set_flash('error', 'Could not send email.Are you connected to the internet?');
				
					//echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}

				
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Messages";
		$this->template->content = View::forge('message/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('message');

		$message = Model_Message::find_one_by_id($id);

		$message->isread = 1;

		if ($message->save())
			{
				Session::set_flash('success', 'Marked message as read #'.$id);
				Response::redirect('message');
			}
			else
			{
				Session::set_flash('error', 'Nothing updated.');
				Response::redirect('message');
			}

		$this->template->set_global('message', $message, false);
		$this->template->title = "Messages";
		$this->template->content = View::forge('message/edit');

	}

	public function action_delete($id = null)
	{
		if ($message = Model_Message::find_one_by_id($id))
		{
			$message->delete();

			Session::set_flash('success', 'Deleted message #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete message #'.$id);
		}

		Response::redirect('message');

	}

}
