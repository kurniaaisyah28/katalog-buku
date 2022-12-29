<?php
    function TanggalIndo($tanggal){

        $BulanIndo = array ("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        $tahun = substr($tanggal, 0, 4); 
        $bulan = substr($tanggal, 5, 2);
        $tgl =  substr($tanggal, 8, 2);

        $result = $tgl ." ". $BulanIndo[(int)$bulan-1] ." ". $tahun;
        return($result);
    }

    function BulanIndo($date){
        $ex = explode("-",$date);
        $bulan = $ex[0];
        $tahun = $ex[1];
        $BulanIndo = array ("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        $result = $BulanIndo[(int)$bulan-1].' ' .$tahun;
        return($result);
    }

?>