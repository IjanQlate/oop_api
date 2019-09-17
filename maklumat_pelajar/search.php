<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/pelajar.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$pelajar = new Pelajar($db);
 
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
// query products
$stmt = $pelajar->search($keywords);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $pelajar_arr=array();
    $pelajar_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $product_item=array(
            "sekolah_asal" => $sekolah_asal,
            "nama_murid" => $nama_murid,
            "nokad_pengenalan" => html_entity_decode($nokad_pengenalan),
            "tahun_tingkatan" => $tahun_tingkatan,
            "kursus" => $kursus,
            "nama_penjaga" => $nama_penjaga,
            "alamat_satu" => $alamat_satu,
            "poskod_satu" => $poskod_satu,
            "pengarah_pengetua" => $pengarah_pengetua,
            "kolej_smt_asal" => $kolej_smt_asal,
            "alamat_dua" => $alamat_dua,
            "poskod_dua" => $poskod_dua,
            "negeri" => $negeri,
            "jpn" => $jpn,
            "alamat_tiga" => $alamat_tiga,
            "poskod_tiga" => $poskod_tiga,
            "keputusan" => $keputusan,
            "sebab" => $sebab,
            "rujukan_fail_pertukaran" => $rujukan_fail_pertukaran,
            "pegawai_pelulus" => $pegawai_pelulus,
            "jawatan" => $jawatan,
            "tarikh_proses" => $tarikh_proses,
            "diolah_oleh" => $diolah_oleh,
            "tarikh_diolah" => $tarikh_diolah
        );
 
        array_push($pelajar_arr["records"], $product_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data
    echo json_encode($pelajar_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>