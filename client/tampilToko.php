<?php
function curl($url){
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $output = curl_exec($ch);
 curl_close($ch);
 return $output;
}
// alamat localhost untuk file getToko.php, ambil hasil export JSON
$send = curl("http://localhost/json/server/getToko.php");
// mengubah JSON menjadi array
$data = json_decode($send, TRUE);
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr>
         <th>ID</th>
         <th>NAMA</th>
         <th>MERK</th>
         <th>STOCK</th>
         <th>GARANSI</th>
         <th>HARGA</th>
    </thead>
    <tbody>
  <?php
      if(is_array($data)){      
      $sn=1;
      foreach($data as $data1){
    ?>
      <tr>
      <td><?php echo $data1['id_toko']??''; ?></td>
      <td><?php echo $data1['nama']??''; ?></td>
      <td><?php echo $data1['merk']??''; ?></td>
      <td><?php echo $data1['stock']??''; ?></td>
      <td><?php echo $data1['garansi']??''; ?></td>
      <td><?php echo $data1['harga']??''; ?></td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $data; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>