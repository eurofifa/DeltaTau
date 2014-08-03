<?php

class doboz_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function msg(){  
        return 'Doboz Initialized.';
    }
    
    public function book($arg){
        
        $name = $arg['name'];
        $email = $arg['email'];
        $phone = $arg['phone'];
        $date = $arg['date'];
        $type = $arg['type'];
        $number = $arg['number'];
        $ETA = $arg['ETA'];
        
        $msg = 'Új foglalásod érkezett!</br></br>Név: '.$name.'</br></br> e-mail: '.$email.'</br></br> telefonszám: '.$phone.'</br></br> dátum: '.$date.'</br></br> típus: '.$type.'</br></br> létszám: '.$number.'</br></br> Várható érkezés: '.$ETA. '';
        $user = 'Kedves '.$name.'!</br></br>Foglalásodról munkatársaink értesítést kaptak.</br></br>Név: '.$name.'</br></br> e-mail: '.$email.'</br></br> telefonszám: '.$phone.'</br></br> dátum: '.$date.'</br></br> típus: '.$type.'</br></br> létszám: '.$number.'</br></br> Várható érkezés: '.$ETA.'</br></br> Üdvözlettel, </br> Doboz Csapat';   
        
        $this->_sendMail($email, $user, $date);
        $this->_sendMail(false, $msg, $date);
        
        
    }
    
    private function _sendMail($to, $message,$date){ 
        
        if($to == false){ $to = 'bandoh.daniel@doboz.pm, horvath.tibor@doboz.pm, magor@eurofifa.com'; }
        
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

        // Additional headers
        $headers .= 'To: '. $to . "\r\n";
        $headers .= 'From: Doboz Booking <info@doboz.pm>' . "\r\n";
        
        $subject = 'FOGLALAS '.$date;

        $send = mail($to, $subject, $message, $headers);
   
    }
}

