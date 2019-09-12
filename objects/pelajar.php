<?php
class Pelajar{
 
    // database connection and table name
    private $conn;
    private $table_name = "maklumat_pelajar";
 
    // object properties
    public $id;
    public $sekolah_asal;
    public $nama_murid;
    public $nokad_pengenalan;
    public $tahun_tingkatan;
    public $kursus;
    public $nama_penjaga;
    public $alamat_satu;
    public $poskod_satu;
    public $pengarah_pengetua;
    public $kolej_smt_asal;
    public $alamat_dua;
    public $poskod_dua;
    public $negeri;
    public $jpn;
    public $alamat_tiga;
    public $poskod_tiga;
    public $keputusan;
    public $sebab;
    public $rujukan_fail_pertukaran;
    public $pegawai_pelulus;
    public $jawatan;
    public $tarikh_proses;
    public $diolah_oleh;
    public $tarikh_diolah;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read Pelajar
    function read(){
    
        // select all query
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name ."
                ORDER BY id ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // create product
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    sekolah_asal=:sekolah_asal, 
                    nama_murid=:nama_murid,
                    nokad_pengenalan=:nokad_pengenalan, 
                    tahun_tingkatan=:tahun_tingkatan,
                    kursus=:kursus,
                    nama_penjaga=:nama_penjaga,
                    alamat_satu=:alamat_satu,
                    poskod_satu=:poskod_satu,
                    pengarah_pengetua=:pengarah_pengetua,
                    kolej_smt_asal=:kolej_smt_asal,
                    alamat_dua=:alamat_dua,
                    poskod_dua=:poskod_dua,
                    negeri=:negeri,
                    jpn=:jpn,
                    alamat_tiga=:alamat_tiga,
                    poskod_tiga=:poskod_tiga,
                    keputusan=:keputusan,
                    sebab=:sebab,
                    rujukan_fail_pertukaran=:rujukan_fail_pertukaran,
                    pegawai_pelulus=:pegawai_pelulus,
                    jawatan=:jawatan,
                    tarikh_proses=:tarikh_proses,
                    diolah_oleh=:diolah_oleh,
                    tarikh_diolah=:tarikh_diolah
                    ";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->sekolah_asal=htmlspecialchars(strip_tags($this->sekolah_asal));
        $this->nama_murid=htmlspecialchars(strip_tags($this->nama_murid));
        $this->nokad_pengenalan=htmlspecialchars(strip_tags($this->nokad_pengenalan));
        $this->tahun_tingkatan=htmlspecialchars(strip_tags($this->tahun_tingkatan));
        $this->kursus=htmlspecialchars(strip_tags($this->kursus));
        $this->nama_penjaga=htmlspecialchars(strip_tags($this->nama_penjaga));
        $this->alamat_satu=htmlspecialchars(strip_tags($this->alamat_satu));
        $this->poskod_satu=htmlspecialchars(strip_tags($this->poskod_satu));
        $this->pengarah_pengetua=htmlspecialchars(strip_tags($this->pengarah_pengetua));
        $this->kolej_smt_asal=htmlspecialchars(strip_tags($this->kolej_smt_asal));
        $this->alamat_dua=htmlspecialchars(strip_tags($this->alamat_dua));
        $this->poskod_dua=htmlspecialchars(strip_tags($this->poskod_dua));
        $this->negeri=htmlspecialchars(strip_tags($this->negeri));
        $this->jpn=htmlspecialchars(strip_tags($this->jpn));
        $this->alamat_tiga=htmlspecialchars(strip_tags($this->alamat_tiga));
        $this->poskod_tiga=htmlspecialchars(strip_tags($this->poskod_tiga));
        $this->keputusan=htmlspecialchars(strip_tags($this->keputusan));
        $this->sebab=htmlspecialchars(strip_tags($this->sebab));
        $this->rujukan_fail_pertukaran=htmlspecialchars(strip_tags($this->rujukan_fail_pertukaran));
        $this->pegawai_pelulus=htmlspecialchars(strip_tags($this->pegawai_pelulus));
        $this->jawatan=htmlspecialchars(strip_tags($this->jawatan));
        $this->tarikh_proses=htmlspecialchars(strip_tags($this->tarikh_proses));
        $this->diolah_oleh=htmlspecialchars(strip_tags($this->diolah_oleh));
        $this->tarikh_diolah=htmlspecialchars(strip_tags($this->tarikh_diolah));

        // bind values
        $stmt->bindParam(":sekolah_asal", $this->sekolah_asal);
        $stmt->bindParam(":nama_murid", $this->nama_murid);
        $stmt->bindParam(":nokad_pengenalan", $this->nokad_pengenalan);
        $stmt->bindParam(":tahun_tingkatan", $this->tahun_tingkatan);
        $stmt->bindParam(":kursus", $this->kursus);
        $stmt->bindParam(":nama_penjaga", $this->nama_penjaga);
        $stmt->bindParam(":alamat_satu", $this->alamat_satu);
        $stmt->bindParam(":poskod_satu", $this->poskod_satu);
        $stmt->bindParam(":pengarah_pengetua", $this->pengarah_pengetua);
        $stmt->bindParam(":kolej_smt_asal", $this->kolej_smt_asal);
        $stmt->bindParam(":alamat_dua", $this->alamat_dua);
        $stmt->bindParam(":poskod_dua", $this->poskod_dua);
        $stmt->bindParam(":negeri", $this->negeri);
        $stmt->bindParam(":jpn", $this->jpn);
        $stmt->bindParam(":alamat_tiga", $this->alamat_tiga);
        $stmt->bindParam(":poskod_tiga", $this->poskod_tiga);
        $stmt->bindParam(":keputusan", $this->keputusan);
        $stmt->bindParam(":sebab", $this->sebab);
        $stmt->bindParam(":rujukan_fail_pertukaran", $this->rujukan_fail_pertukaran);
        $stmt->bindParam(":pegawai_pelulus", $this->pegawai_pelulus);
        $stmt->bindParam(":jawatan", $this->jawatan);
        $stmt->bindParam(":tarikh_proses", $this->tarikh_proses);
        $stmt->bindParam(":diolah_oleh", $this->diolah_oleh);
        $stmt->bindParam(":tarikh_diolah", $this->tarikh_diolah);

    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }


    // used when filling up the update pelajar form
    function readOne(){
    
        // query to read single record
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name . "
                WHERE
                    nokad_pengenalan = ?
                LIMIT
                    0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind id of pelajar to be updated
        $stmt->bindParam(1, $this->nokad_pengenalan);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->id = $row['id'];
        $this->sekolah_asal = $row['sekolah_asal'];
        $this->nama_murid = $row['nama_murid'];
        $this->nokad_pengenalan = $row['nokad_pengenalan'];
        $this->tahun_tingkatan = $row['tahun_tingkatan'];
        $this->kursus = $row['kursus'];
        $this->nama_penjaga = $row['nama_penjaga'];
        $this->alamat_satu = $row['alamat_satu'];
        $this->poskod_satu = $row['poskod_satu'];
        $this->pengarah_pengetua = $row['pengarah_pengetua'];
        $this->kolej_smt_asal = $row['kolej_smt_asal'];
        $this->alamat_dua = $row['alamat_dua'];
        $this->poskod_dua = $row['poskod_dua'];
        $this->negeri = $row['negeri'];
        $this->jpn = $row['jpn'];
        $this->alamat_tiga = $row['alamat_tiga'];
        $this->poskod_tiga = $row['poskod_tiga'];
        $this->keputusan = $row['keputusan'];
        $this->sebab = $row['sebab'];
        $this->rujukan_fail_pertukaran = $row['rujukan_fail_pertukaran'];
        $this->pegawai_pelulus = $row['pegawai_pelulus'];
        $this->jawatan = $row['jawatan'];
        $this->tarikh_proses = $row['tarikh_proses'];
        $this->diolah_oleh = $row['diolah_oleh'];
        $this->tarikh_diolah = $row['tarikh_diolah'];
    }

    // update the product
    function update(){
    
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    sekolah_asal = :sekolah_asal,
                    nama_murid = :nama_murid,
                    nokad_pengenalan = :nokad_pengenalan,
                    tahun_tingkatan = :tahun_tingkatan,
                    kursus = :kursus,
                    nama_penjaga = :nama_penjaga,
                    alamat_satu = :alamat_satu,
                    poskod_satu = :poskod_satu,
                    pengarah_pengetua = :pengarah_pengetua,
                    kolej_smt_asal = :kolej_smt_asal,
                    alamat_dua = :alamat_dua,
                    poskod_dua = :poskod_dua,
                    negeri = :negeri,
                    jpn = :jpn,
                    alamat_tiga = :alamat_tiga,
                    poskod_tiga = :poskod_tiga,
                    keputusan = :keputusan,
                    sebab = :sebab,
                    rujukan_fail_pertukaran = :rujukan_fail_pertukaran,
                    pegawai_pelulus = :pegawai_pelulus,
                    jawatan = :jawatan,
                    tarikh_proses = :tarikh_proses,
                    diolah_oleh = :diolah_oleh,
                    tarikh_diolah = :tarikh_diolah
                WHERE
                    nokad_pengenalan = :nokad_pengenalan";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // sanitize
        $this->sekolah_asal=htmlspecialchars(strip_tags($this->sekolah_asal));
        $this->nama_murid=htmlspecialchars(strip_tags($this->nama_murid));
        $this->nokad_pengenalan=htmlspecialchars(strip_tags($this->nokad_pengenalan));
        $this->tahun_tingkatan=htmlspecialchars(strip_tags($this->tahun_tingkatan));
        $this->kursus=htmlspecialchars(strip_tags($this->kursus));
        $this->nama_penjaga=htmlspecialchars(strip_tags($this->nama_penjaga));
        $this->alamat_satu=htmlspecialchars(strip_tags($this->alamat_satu));
        $this->poskod_satu=htmlspecialchars(strip_tags($this->poskod_satu));
        $this->pengarah_pengetua=htmlspecialchars(strip_tags($this->pengarah_pengetua));
        $this->kolej_smt_asal=htmlspecialchars(strip_tags($this->kolej_smt_asal));
        $this->alamat_dua=htmlspecialchars(strip_tags($this->alamat_dua));
        $this->poskod_dua=htmlspecialchars(strip_tags($this->poskod_dua));
        $this->negeri=htmlspecialchars(strip_tags($this->negeri));
        $this->jpn=htmlspecialchars(strip_tags($this->jpn));
        $this->alamat_tiga=htmlspecialchars(strip_tags($this->alamat_tiga));
        $this->poskod_tiga=htmlspecialchars(strip_tags($this->poskod_tiga));
        $this->keputusan=htmlspecialchars(strip_tags($this->keputusan));
        $this->sebab=htmlspecialchars(strip_tags($this->sebab));
        $this->rujukan_fail_pertukaran=htmlspecialchars(strip_tags($this->rujukan_fail_pertukaran));
        $this->pegawai_pelulus=htmlspecialchars(strip_tags($this->pegawai_pelulus));
        $this->jawatan=htmlspecialchars(strip_tags($this->jawatan));
        $this->tarikh_proses=htmlspecialchars(strip_tags($this->tarikh_proses));
        $this->diolah_oleh=htmlspecialchars(strip_tags($this->diolah_oleh));
        $this->tarikh_diolah=htmlspecialchars(strip_tags($this->tarikh_diolah));

        // bind new values
        $stmt->bindParam(":sekolah_asal", $this->sekolah_asal);
        $stmt->bindParam(":nama_murid", $this->nama_murid);
        $stmt->bindParam(":nokad_pengenalan", $this->nokad_pengenalan);
        $stmt->bindParam(":tahun_tingkatan", $this->tahun_tingkatan);
        $stmt->bindParam(":kursus", $this->kursus);
        $stmt->bindParam(":nama_penjaga", $this->nama_penjaga);
        $stmt->bindParam(":alamat_satu", $this->alamat_satu);
        $stmt->bindParam(":poskod_satu", $this->poskod_satu);
        $stmt->bindParam(":pengarah_pengetua", $this->pengarah_pengetua);
        $stmt->bindParam(":kolej_smt_asal", $this->kolej_smt_asal);
        $stmt->bindParam(":alamat_dua", $this->alamat_dua);
        $stmt->bindParam(":poskod_dua", $this->poskod_dua);
        $stmt->bindParam(":negeri", $this->negeri);
        $stmt->bindParam(":jpn", $this->jpn);
        $stmt->bindParam(":alamat_tiga", $this->alamat_tiga);
        $stmt->bindParam(":poskod_tiga", $this->poskod_tiga);
        $stmt->bindParam(":keputusan", $this->keputusan);
        $stmt->bindParam(":sebab", $this->sebab);
        $stmt->bindParam(":rujukan_fail_pertukaran", $this->rujukan_fail_pertukaran);
        $stmt->bindParam(":pegawai_pelulus", $this->pegawai_pelulus);
        $stmt->bindParam(":jawatan", $this->jawatan);
        $stmt->bindParam(":tarikh_proses", $this->tarikh_proses);
        $stmt->bindParam(":diolah_oleh", $this->diolah_oleh);
        $stmt->bindParam(":tarikh_diolah", $this->tarikh_diolah);

        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }


    // delete pelajar
    function delete(){
    
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE nokad_pengenalan = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->nokad_pengenalan=htmlspecialchars(strip_tags($this->nokad_pengenalan));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->nokad_pengenalan);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }




}