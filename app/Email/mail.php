<?php
   namespace App\Email;

   use \App\Email\PHPMailer;
   use Redirect;
   use Exception;
   
class mail{

  private  $mail;

   function __construct() {
   	$this->mail=new PHPMailer();
	  $this->mail->IsHTML(true);
	  $this->mail->IsSMTP();
	  $this->mail->SMTPAuth = true; // enable SMTP authentication
	  $this->mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	  $this->mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	  $this->mail->Port = 465; // set the SMTP port for the GMAIL server
	  $this->mail->Username = "tscwebmaster0@gmail.com"; // GMAIL username
	  $this->mail->Password = "tsckusrc"; // GMAIL password	  
   }
  
  public function sendEmail($contact,$name,$message){   

  $this->mail->From = "tscwebmaster0@gmail.com"; // "name@yourdomain.com";
  //$this->mail->AddReplyTo = "support@thaicreate.com"; // Reply
  $this->mail->FromName = "=?UTF-8?B?".base64_encode("ระบบแจ้งซ่อม คณะวิศวกรรมศาสตร์ศรีราชา")."?=";
  $this->mail->Subject  ="=?UTF-8?B?".base64_encode("แจ้งผลงานซ่อมของคุณ")."?=";
  $this->mail->Body = $message;  
  $this->mail->AddAddress($contact, $name); // to Address
  //$this->mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
  //$this->mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
  //$this->mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low
	/* if( $this->mail->Send()){ 
	    $message= "ส่งอีเมล์ถึง ".$name." เสร็จสิ้นแล้ว";
   return Redirect::to('/')->with('success', true)->with('message',$message);
	  }
	  else {
	    $message= "ระบบส่งอีเมล์ผิดพลาด";
      return view('emails.test',['message'=>$message]);
	  }
*/
    try {
 
      $this->mail->Send();
      $message= "ส่งอีเมล์ถึง ".$name." เสร็จสิ้นแล้ว";
      return Redirect::to('/')->with('success', true)->with('message',$message);
      
    } catch (Exception $e) {

        $message= "ระบบส่งอีเมล์ผิดพลาด".$e->getMessage();
        return Redirect::to('/')->with('faild', true)->with('message',$message);
    }


	}
}

