<?php
class Validate {
    
    public static function isValidCode($code, $required){
        if(!$required && empty($code))
            return true;
        elseif($required && empty($code))
            return false;
        
        if (preg_match('!^[_a-z0-9-]*$!', $code) && trim($code != "")) {
            return true;
        }
        else
            return false;
    }
    
    public static function isValidPassword($password, $required){
        if(!$required && empty($password))
            return true;
        elseif($required && empty($password))
            return false;
        
        /* Equivalente javascript
         * var re = /^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.{5,20}$)/;
            if (re.test(text)) {
              // Good password
            }
         */
        
        $regex = '/
            # Match password with 5-20 chars with letters and digits
            ^                # Anchor to start of string.
            (?=.*?[A-Za-z])  # Assert there is at least one letter, AND
            (?=.*?[0-9])     # Assert there is at least one digit, AND
            (?=.{5,20}\z)    # Assert the length is from 5 to 20 chars.
            /x';
        
        if (preg_match($regex, $password) && trim($password != "")) {
            return true;
        }
        else
            return false;
    }
    
    public static function isValidPrice($price, $required){
         if($required && empty($price))
            return false;
         elseif(!$required && empty($price))
            return true;
         else
            return (is_float($price) || is_numeric($price));
         
         return false;
    }
    
    public static function isValidEmail($email, $required){
        
        if(!$required && empty($email))
            return true;
        
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        return preg_match($regex, $email);
    }
    
    public static function isValidNumber($number, $required, $min = 1){
        if($required && strlen($number) < $min)
            return false;
        if($required && empty($number))
            return false;
        elseif(!$required && empty($number))
            return true;
        else
            return is_numeric($number);
        
        return false;
    }
    
    public function isValidPiva($pi, $required){
                if( $pi == '' && $required)  return false;
                if( $pi == '' && !$required)  return true;
                if( strlen($pi) != 11 )
                    return false;
                if( ! preg_match("/^[0-9]+$/", $pi) )
                    return false;
                $s = 0;
                for( $i = 0; $i <= 9; $i += 2 )
                    $s += ord($pi[$i]) - ord('0');
                for( $i = 1; $i <= 9; $i += 2 ){
                    $c = 2*( ord($pi[$i]) - ord('0') );
                    if( $c > 9 )  $c = $c - 9;
                    $s += $c;
                }
                if( ( 10 - $s%10 )%10 != ord($pi[10]) - ord('0') )
                    return false;
                return true;
    }
    
    public static function isValidVarChar($string, $required, $maxlenght = 255, $minlenght = 0){
       
        if(!$required && empty($string))
            return true;
        elseif($required && empty($string)){
            return false;
            exit(0);
        } 
        
//        if($minlenght > strlen($string)){
//            return false;
//        }
        
        if(strlen($string) > $maxlenght || $minlenght > strlen($string))
            return false;
        
        return true;
    }
    
    public static function isValidImage($image, $required){
        return true;
    }
    
    public static function isValidFile($file, $required){
        return true;
    }
    
    public static function isValidUrl($url, $required){
        if(!$required && empty($url))
            return true;
        
        if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
            return true;
        }
        
        return false;
    }
    
    public static function isValidDateTime($date, $required) {
        if(!$required && empty($date))
            return true;
        
        if($date == "")
            return false;
        
        //$date = $date." 00:00:00";
        
        return (preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})(\s([0-9]{2}):([0-9]{2}):([0-9]{2}))?$/", $date));
        
    }
    
    public static function isValidDateIT($date, $required) {
        if(!$required && empty($date))
            return true;
        
        if($date == "")
            return false;
        
        $data_ex = explode("/",$date);
        
        if($data_ex[2] > date('Y') || $data_ex[2] < 1898){
            return false;
        }
        
        return checkdate($data_ex[1],$data_ex[0],$data_ex[2]);
        
        //return (preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})?$/", $date));
    }
    
}
?>
