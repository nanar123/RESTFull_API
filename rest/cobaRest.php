<?php
include ("Rest.php");

$coba = new Rest();
//uji coba ambil data
//$coba->getWisata();
//ujicoba tambah data
/*
$data = array(
    'kota' => 'kota1',
    'landmark' => 'landmark1',
    'tarif' => '1jt' 
);
$coba->insertWisata($data);
*/
//ujicoba edit data
/*
$data = array(
    'id' => '5',
    'kota' => 'kota2',
    'landmark' => 'landmark2',
    'tarif' => '2jt'
);
$coba->updateWisata($data);
*/
//ujicoba hapusdata
$coba->deleteToko(6);
?>