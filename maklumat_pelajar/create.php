<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/pelajar.php';

$database = new Database();
$db = $database->getConnection();
 
$pelajar = new Pelajar($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($data->sekolah_asal) && 
    !empty($data->nama_murid) &&
    !empty($data->nokad_pengenalan) &&
    !empty($data->tahun_tingkatan) && 
    !empty($data->kursus) &&
    !empty($data->nama_penjaga) &&
    !empty($data->alamat_satu) &&
    !empty($data->poskod_satu) &&
    !empty($data->pengarah_pengetua) &&
    !empty($data->kolej_smt_asal) &&
    !empty($data->alamat_dua) &&
    !empty($data->poskod_dua) &&
    !empty($data->negeri) &&
    !empty($data->jpn) &&
    !empty($data->alamat_tiga) &&
    !empty($data->poskod_tiga) &&
    !empty($data->keputusan) &&
    !empty($data->sebab) &&
    !empty($data->rujukan_fail_pertukaran) &&
    !empty($data->pegawai_pelulus) &&
    !empty($data->jawatan) &&
    !empty($data->tarikh_proses) &&
    !empty($data->diolah_oleh) &&
    !empty($data->tarikh_diolah)
){
 
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
    $pelajar->tarikh_diolah = date('Y-m-d H:i:s');
 
    // create the product
    if($pelajar->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "Maklumat Pelajar Berjaya Ditambah."));
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Maklumat Pelajar Gagal Ditambah."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Maklumat Pelajar Tidak Lengkap."));
}
?>