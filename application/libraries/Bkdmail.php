<?php

/**
* 
*/

require_once APPPATH.'/third_party/swiftmailer/vendor/autoload.php';


class Bkdmail 
{
	
	function __construct()
	{
		# code...
	}

	public function kirim_konfirmasi_dosen($email_to='')
	{
		// Create the Transport
		$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
		->setUsername('firmawaneiwan@gmail.com')
		->setPassword('Wew-satu123')
		;

		// Create the Mailer using your created Transport
		$mailer = new Swift_Mailer($transport);

		// Create a message
		$message = (new Swift_Message('Wonderful Subject'))
			->setFrom(['firmawaneiwan@gmail.com' => 'Admin BKD'])
			->setTo([$email_to])
			->setBody('Here is the message itself');

		// Send the message
		return $mailer->send($message);
	}
}