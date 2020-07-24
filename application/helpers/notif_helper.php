<?php

    function notif_pensiunx($date)
    {
        // $birthDate = explode("-", $date);
        // $age = (date('md', date('U', mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));

        // $endTime = strtotime('+58 years', strtotime($date));
        $endTime = strtotime('2021-07-23');
        // $days_remain = floor($date2 - time() / 86400);

        $notifTime = strtotime('-1 years', strtotime(date('Y-m-d', $endTime)));
        
        if(strtotime(date('Y-m-d')) >= $notifTime){
            return $days = floor(($endTime - time()) / 86400);
        }
        else {
            return null;
        }
    }

    function notif_pensiun($date)
    { 
        $endTime = strtotime('+58 years', strtotime($date));

        $notifTime = strtotime('-1 years', strtotime(date('Y-m-d', $endTime)));
        
        if(strtotime(date('Y-m-d')) >= $notifTime){
            echo $days = floor(($endTime - time()) / 86400);
        }
        else {
            return null;
        }
    }

?>