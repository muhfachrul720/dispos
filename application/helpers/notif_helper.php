<?php

    function notif_pensiun($endTime)
    { 
        $notifTime = strtotime('-1 years', strtotime(date('Y-m-d', strtotime($endTime))));
        
        if(strtotime(date('Y-m-d')) >= $notifTime){
            echo $days = floor(($endTime - time()) / 86400);
        }
        else {
            return null;
        }
    }
    
    function get_age($birthDate)
    {
        if($birthDate != null){
        //date in mm/dd/yyyy format; or it can be in other formats as well
        //explode the date to get month, day and year
        $birthDate = explode("-", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
            ? ((date("Y") - $birthDate[0]) - 1)
            : (date("Y") - $birthDate[0]));

        return $age;
        } else {
            return 0;
        }
    }

    function get_pangkatcpns($gol, $rg)
    {
        if($gol == 1 && $rg == 'a'){
            return 'Juru Muda';
        }
        else if($gol == 1 && $rg == 'b'){
            return 'Juru Muda Tk. 1';
        }
        else if($gol == 1 && $rg == 'c'){
            return 'Juru';
        }
        else if($gol == 1 && $rg == 'd'){
            return 'Juru Tk. 1';
        }
        else if($gol == 2 && $rg == 'a'){
            return 'Pengatur Muda';
        }
        else if($gol == 2 && $rg == 'b'){
            return 'Pengatur Muda Tk. 1';
        }
        else if($gol == 2 && $rg == 'c'){
            return 'Pengatur';
        }
        else if($gol == 2 && $rg == 'd'){
            return 'Pengatur Tk. 1';
        }
        else if($gol == 3 && $rg == 'a'){
            return 'Penata Muda';
        }
        else if($gol == 3 && $rg == 'b'){
            return 'Penata Muda Tk. 1';
        }
        else if($gol == 3 && $rg == 'c'){
            return 'Penata';
        }
        else if($gol == 3 && $rg == 'd'){
            return 'Penata Tk. 1';
        }
        else if($gol == 4 && $rg == 'a'){
            return 'Pembina';
        }
        else if($gol == 4 && $rg == 'b'){
            return 'Pembina Tk. 1';
        }
        else if($gol == 4 && $rg == 'c'){
            return 'Pembina Utama Muda';
        }
        else if($gol == 4 && $rg == 'd'){
            return 'Pembina Utama Madya';
        }
        else if($gol == 4 && $rg == 'e'){
            return 'Pembina Utama';
        }
    }

?>