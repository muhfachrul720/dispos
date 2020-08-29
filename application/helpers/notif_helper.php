<?php

    function notif_pensiun($endTime)
    { 
        $notifTime = strtotime('-1 years', strtotime(date('Y-m-d', strtotime($endTime))));
        
        if(strtotime(date('Y-m-d')) >= $notifTime){
            $days = floor((strtotime($endTime) - time()) / 86400) + 1;
            if($days == 0){
                return '0';
            }

            return $days;
        }
        else {
            return null;
        }
    }

    function notif_kenaikanpangkat($time){

        $endTime = date('Y-m-d', strtotime('+2 years', strtotime($time)));
        $notifTime = date('Y-m-d', strtotime('-30 days', strtotime($endTime)));
        
        if(strtotime(date('Y-m-d')) >= strtotime($notifTime)){
            return true;      
        }

        return false;
    }

    function notif_kenaikanreguler($time){

        $endTime = date('Y-m-d', strtotime('+4 years', strtotime($time)));
        $notifTime = date('Y-m-d', strtotime('-30 days', strtotime($endTime)));
        
        if(strtotime(date('Y-m-d')) >= strtotime($notifTime)){
            return true;      
        }

        return false;
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

    function convert_cuti($num)
    {
        if($num == 1){
            return 'Cuti Besar';
        }
        else if($num == 2){
            return 'Cuti Tahunan';
        }
        else if($num == 3){
            return 'Cuti Sakit';
        }
        else if($num == 4){
            return 'Cuti Melahirkan';
        }
        else if($num == 5){
            return 'Cuti Karena Alasan Penting';
        }
        else if($num == 6){
            return 'Cuti Diluar Tanggungan Negara';
        }
    }

    function convert_gol_to_roman($gol)
    {
        if($gol == 1){
            return 'I';
        }
        else if($gol == 2) {
            return 'II';
        }
        else if($gol == 3){
            return 'III';
        }
        else if($gol == 4){
            return 'IV';
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

    
    function double_range($limit)
    {
        $array = array();
        $var = '';

        foreach(range('A', 'Z') as $d){
            array_push($array, $d);
            if($d == 'Z'){
                foreach(range('A', 'Z') as $e){
                    if($var == $limit){
                        break;
                    } else {
                        foreach(range('A', 'Z') as $f){
                            $var = $e.$f;
                            if($var == $limit){
                                array_push($array, $e.$f);
                                break;
                            }else{ 
                                array_push($array, $e.$f);
                            }
                        }   
                    }
                }
            }
        }

        return $array;
    }


?>