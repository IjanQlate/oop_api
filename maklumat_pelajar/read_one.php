<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/pelajar.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$pelajar = new Pelajar($db);
 
// set ID property of record to read
$pelajar->nokad_pengenalan = isset($_GET['nokad_pengenalan']) ? $_GET['nokad_pengenalan'] : die();
 
// read the details of product to be edited
$pelajar->readOne();
 
if($pelajar->nokad_pengenalan != null){
    // create array
    $pelajar_arr = array(
        "id" =>  $pelajar->id,
        "sekolah_asal" => $pelajar->sekolah_asal,
        "nama_murid" => $pelajar->nama_murid,
        "nokad_pengenalan" => $pelajar->nokad_pengenalan,
        "tahun_tingkatan" => $pelajar->tahun_tingkatan,
        "kursus" => $pelajar->kursus,
        "nama_penjaga" => $pelajar->nama_penjaga,
        "alamat_satu" => $pelajar->alamat_satu,
        "poskod_satu" => $pelajar->poskod_satu,
        "pengarah_pengetua" => $pelajar->pengarah_pengetua,
        "kolej_smt_asal" => $pelajar->kolej_smt_asal,
        "alamat_dua" => $pelajar->alamat_dua,
        "poskod_dua" => $pelajar->poskod_dua,
        "negeri" => $pelajar->negeri,
        "jpn" => $pelajar->jpn,
        "alamat_tiga" => $pelajar->alamat_tiga,
        "poskod_tiga" => $pelajar->poskod_tiga,
        "keputusan" => $pelajar->keputusan,
        "sebab" => $pelajar->sebab,
        "rujukan_fail_pertukaran" => $pelajar->rujukan_fail_pertukaran,
        "pegawai_pelulus" => $pelajar->pegawai_pelulus,
        "jawatan" => $pelajar->jawatan,
        "tarikh_proses" => $pelajar->tarikh_proses, 
        "diolah_oleh" => $pelajar->diolah_oleh, 
        "tarikh_diolah" => $pelajar->tarikh_diolah
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($pelajar_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user product does not exist
    echo json_encode(array("message" => "Maklumat Pelajar tidak wujud."));
}
?>