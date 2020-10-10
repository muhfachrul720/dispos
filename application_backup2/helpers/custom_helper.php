<?php
function generate_status($time, $endtime, $last)
{
    $time =  new DateTime($time);
    $time = $time->format('Y-m-d');
    $time =  new DateTime($time);
    
    $endtime =  new DateTime($endtime);
    $endtime = $endtime->format('Y-m-d');
    $endtime =  new DateTime($endtime);
    
    $interval = $time->diff($endtime);
    
    $text = $last == 7 ? 'Telah Selesai' : 'Sedang Diproses';
    $result = '<span class="badge badge-success" style="font-size:12px">'.$text.'</span>';
    
    if($interval->invert == 1){
        $text = $last == 7 ? 'Telah Selesai' : 'Sedang Diproses';
        $result = '<span class="badge badge-danger" style="font-size:12px">'.$text.'</span>';
    } 
    else if($interval->invert == 0 && $interval->d <= 3 ) {
        $text = $last == 7 ? 'Telah Selesai' : 'Sedang Diproses';
        $result = '<span class="badge badge-warning" style="font-size:12px">'.$text.'</span>';
    } 
    
    echo $result;
    
    // $d4 =  new DateTime($time);
    // $limit4 = $d4->modify('+4 days')->format('Y-m-d H:i:s');

    // $d7 =  new DateTime($time);
    // $limit7 = $d7->modify('+7 days')->format('Y-m-d H:i:s');

    // if($endtime > $limit7){
    //     $text = $last == 7 ? 'Telah Selesai' : 'Sedang Diproses';
    //     echo '<span class="badge badge-danger" style="font-size:12px">'.$text.'</span>';
    // } else if($endtime > $limit4) {
    //     $text = $last == 7 ? 'Telah Selesai' : 'Sedang Diproses';
    //     echo '<span class="badge badge-warning" style="font-size:12px">'.$text.'</span>';
    // } else {
    //     $text = $last == 7 ? 'Telah Selesai' : 'Sedang Diproses';
    //     echo '<span class="badge badge-success" style="font-size:12px">'.$text.'</span>';
    // }
}

function generate_color($time, $endtime)
{
    $time =  new DateTime($time);
    $time = $time->format('Y-m-d');
    $time =  new DateTime($time);
    
    $endtime =  new DateTime($endtime);
    $endtime = $endtime->format('Y-m-d');
    $endtime =  new DateTime($endtime);
    
    // $d4 =  new DateTime($time);
    // $limit4 = $d4->modify('+4 days')->format('Y-m-d');

    // $d7 =  new DateTime($time);
    // $limit7 = $d7->modify('+7 days')->format('Y-m-d');
    
    // $a = strtotime($time_a);
    // $b = strtotime($limit4);
    
    $interval = $time->diff($endtime);
    
    $color = '#2e6514';
    if($interval->invert == 1){
        $color = '#d00d1a';
    } 
    else if($interval->invert == 0 && $interval->d <= 3 ) {
        $color = '#f7a300';
    } 
    return $color;
    // else {
    //     return '#2e6514';
    // }
}


?>