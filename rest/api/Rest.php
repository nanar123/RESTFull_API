<?php
class Rest {
    private $host = 'localhost';
    private $user = 'root';
    private $password = "";
    private $database = "json";
    private $kndTable = 'toko';
    private $dbConnect = false;

    public function __construct(){
        if(!$this->dbConnect){
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                 $this->dbConnect = $conn;
            }
        }
    }
    public function getToko($kndId = ''){
        $sqlQuery = '';
        if ($kndId) {
            $sqlQuery = "WHERE id_toko = '" . $kndId . "'";
        }
        $kndQuery = "
            SELECT id_toko, nama, merk, stock, garansi, harga
            FROM " . $this->kndTable . " $sqlQuery
            ORDER BY id_toko ASC";
        $resultData = mysqli_query($this->dbConnect, $kndQuery);
        $kndData = array();
        while ($kndRecord = mysqli_fetch_assoc($resultData)) {
            $kndData[] = $kndRecord;
        }
        header('Content-Type: application/json');
        echo json_encode($kndData);
    }
    public function insertToko($kndData){
        $kndNama=$kndData["nama"];
        $kndMerk=$kndData["merk"];
        $kndStock=$kndData["stock"];
        $kndGaransi=$kndData["garansi"];
        $kndHarga=$kndData["harga"];
        $kndQuery = "

        INSERT INTO " . $this->kndTable . "
        SET nama='" . $kndNama . "', merk='" . $kndMerk . "', stock='" . $kndStock . "', garansi='".$kndGaransi . "', harga='" . $kndHarga. "'";
        
        mysqli_query($this->dbConnect, $kndQuery);
        if (mysqli_affected_rows($this->dbConnect) > 0) {
            $message = "toko sukses dibuat.";
            $status = 1;
        } else {
            $message = "toko gagal dibuat.";
            $status = 0;
        }
        $kndResponse = array(
            'status' => $status,
            'status_message' => $message
        );
        header('Content-Type: application/json');
        echo json_encode($kndResponse);
    }

    public function updateToko($kndData){
        if($kndData["id"]) {
            $kndNama = $kndData["nama"];
            $kndMerk = $kndData["merk"];
            $kndStock = $kndData["stock"];
            $kndGaransi = $kndData["garansi"];
            $kndHarga = $kndData["harga"];

            $kndQuery = "
                UPDATE " . $this->kndTable . "
                SET nama='" . $kndNama . "', merk='" . $kndMerk . "', stock='" . $kndStock . "', garansi='" . $kndGaransi . "', harga='" . $kndHarga . "'
                WHERE id_toko = '" . $kndData["id"] . "'";
            
            mysqli_query($this->dbConnect, $kndQuery);
            if (mysqli_affected_rows($this->dbConnect) > 0) {
                    $message = "toko sukses diperbaiki.";
                    $status = 1;
                } else {
                    $message = "toko gagal diperbaiki.";
                    $status = 0;
                }
            } else {
                $message = "Invalid request.";
                $status = 0;
            }
            $kndResponse = array(
                'status' => $status,
                'status_message' => $message
            );
            header('Content-Type: application/json');
            echo json_encode($kndResponse);
    }

    public function deleteToko($kndId) {
        if ($kndId) {
            $kndQuery = "
                DELETE FROM " . $this->kndTable . "
                WHERE id_toko = '" . $kndId . "'
                ORDER BY id_toko DESC";
                
        mysqli_query($this->dbConnect, $kndQuery);
            if (mysqli_affected_rows($this->dbConnect) > 0) {
                $message = "toko sukses dihapus.";
                $status = 1;
            } else {
                $message = "toko gagal dihapus.";
                $status = 0;
            }
        } else {
            $message = "Invalid request.";
            $status = 0;
        }
        $kndResponse = array(
            'status' => $status,
            'status_message' => $message
        );
        header('Content-Type: application/json');
        echo json_encode($kndResponse);
    }
}
?>