<?php


    function convertDate($value){
        return date('d M Y - H:i:s', strtotime($value));
    }

    function format_uang($angka){
        $hasil=number_format($angka,0,',','.');
        return $hasil;
    }

?>