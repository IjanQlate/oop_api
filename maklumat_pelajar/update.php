<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/pelajar.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$pelajar = new Pelajar($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
$pelajar->nokad_pengenalan = $data->nokad_pengenalan;
 
// set product property values
$pelajar->sekolah_asal = $data->sekolah_asal;
$pelajar->nama_murid = $data->nama_murid;
$pelajar->nokad_pengenalan = $data->nokad_pengenalan;
$pelajar->tahun_tingkatan = $data->tahun_tingkatan;
$pelajar->kursus = $data->kursus;
$pelajar->nama_penjaga = $data->nama_penjaga;
$pelajar->alamat_satu = $data->alamat_satu;
$pelajar->poskod_satu = $data->poskod_satu;
$pelajar->pengarah_pengetua = $data->pengarah_pengetua;
$pelajar->kolej_smt_asal = $data->kolej_smt_asal;
$pelajar->alamat_dua = $data->alamat_dua;
$pelajar->poskod_dua = $data->poskod_dua;
$pelajar->negeri = $data->negeri;
$pelajar->jpn = $data->jpn;
$pelajar->alamat_tiga = $data->alamat_tiga;
$pelajar->poskod_tiga = $data->poskod_tiga;
$pelajar->keputusan = $data->keputusan;
$pelajar->sebab = $data->sebab;
$pelajar->rujukan_fail_pertukaran = $data->rujukan_fail_pertukaran;
$pelajar->pegawai_pelulus = $data->pegawai_pelulus;
$pelajar->jawatan = $data->jawatan;
$pelajar->tarikh_proses = $data->tarikh_proses;
$pelajar->diolah_oleh = $data->diolah_oleh;
$pelajar->tarikh_diolah = $data->tarikh_diolah;
 
// update the product
if($pelajar->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "Product was updated."));
}
 
// if unable to update the product, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update product."));
}
?>