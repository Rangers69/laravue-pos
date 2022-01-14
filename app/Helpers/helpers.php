<?php


    function convertDate($value){
        return date('d M Y - H:i:s', strtotime($value));
    }

?>