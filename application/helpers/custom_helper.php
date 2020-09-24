<?php
function generate_status($time, $endtime)
{
    $d4 =  new DateTime($endtime);
    $limit4 = $d4->modify('+4 days')->format('Y-m-d h:m:s');

    $d7 =  new DateTime($endtime);
    $limit7 = $d7->modify('+7 days')->format('Y-m-d h:m:s');

    if($time > $limit7){
        echo '<span class="badge badge-danger" style="font-size:12px">Terlambat 7 Hari</span>';
    } else if($time > $limit4) {
        echo '<span class="badge badge-warning" style="font-size:12px">Terlambat 4 Hari</span>';
    } else {
        echo '<span class="badge badge-success" style="font-size:12px">Tepat Waktu</span>';
    }
}


?>