<?php
 header("Access-Control-Allow-Origin: *");
 header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
 header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
 header('Content-Type: application/json');
/*
 * Following code will list all the tasks
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();


$postdata = json_decode(file_get_contents("php://input"),true);
$IdPengguna = $postdata['IdPengguna'];

// get all tasks from task table
$result = mysqli_query($db->connect(), "SELECT
pr_master_pengguna.IdPengguna,
pr_indikator_jawatan.NamaJawatan,
p_infopemohon.StaJawatan,
pr_indikator_gred.NamaGred,
pr_indikator_kumpulan.Kumpulan,
pr_indikator_perkhidmatan.NamaPerkhidmatan,
p_infopemohon.TkhPerkhidmatan,
p_infopemohon.TkhBersara,
p_infopemohon.Gaji,
p_infopemohon.Elaun,
p_infopemohon.Cawangan,
p_infopemohon.KetuaJab,
p_infopemohon.JawatanKetuaJab,
p_infopemohon.Alamat_Jab,
p_infopemohon.TelJab,
p_infopemohon.PTJ,
pr_indikator_jabatan.NamaJabatan
FROM
pr_master_pengguna
LEFT JOIN p_infopemohon ON p_infopemohon.NoKPPemohon = pr_master_pengguna.NoKP
LEFT JOIN pr_indikator_jawatan ON pr_indikator_jawatan.IdIndJawatan = p_infopemohon.Jawatan
LEFT JOIN pr_indikator_gred ON pr_indikator_gred.IdIndGred = p_infopemohon.Gred
LEFT JOIN pr_indikator_kumpulan ON pr_indikator_kumpulan.IdIndKumpulan = p_infopemohon.Kumpulan
LEFT JOIN pr_indikator_perkhidmatan ON pr_indikator_perkhidmatan.IdIndPerkhidmatan = p_infopemohon.Perkhidmatan
LEFT JOIN pr_indikator_jabatan ON pr_indikator_jabatan.IdIndJabatan = p_infopemohon.Jabatan



WHERE pr_master_pengguna.IdPengguna = 1
 ");
 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // tasks node
    $response["pr_master_pengguna"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp tasks array
        $maklumat = array();
        $data["IdPengguna"]        = $row["IdPengguna"];
        $data["NamaJawatan"]       = $row["NamaJawatan"];
        $data["StaJawatan"]        = $row["StaJawatan"];
        $data["NamaGred"]          = $row["NamaGred"];
        $data["Kumpulan"]          = $row["Kumpulan"];
        $data["NamaPerkhidmatan"]  = $row["NamaPerkhidmatan"];
        
        $orgDate = $row["TkhPerkhidmatan"];
        $newDate = date("d-m-Y", strtotime($orgDate));
        $data["TkhPerkhidmatan"]   =  $newDate;

        $orgDate1 = $row["TkhBersara"];
        $newDate1 = date("d-m-Y", strtotime($orgDate1));
        $data["TkhBersara"]        = $newDate1;

        $data["Gaji"]              = $row["Gaji"];
        $data["Elaun"]             = $row["Elaun"];
        $data["NamaJabatan"]       = $row["NamaJabatan"];
        $data["Cawangan"]          = $row["Cawangan"];
        $data["KetuaJab"]          = $row["KetuaJab"];
        $data["JawatanKetuaJab"]   = $row["JawatanKetuaJab"];
        $data["Alamat_Jab"]        = $row["Alamat_Jab"];
        $data["TelJab"]            = $row["TelJab"];
        $data["PTJ"]               = $row["PTJ"];

        

           
        
         
        // push single task into final response array
        array_push($response["pr_master_pengguna"], $data);
    }
    // success
    $response["success"] = 1;
 

    // echoing JSON response
    echo json_encode($response);
} else {
    // no tasks found

    $response["success"] = 0;
    $response["message"] = "No tasks found";
 
    // echo no tasks JSON
    echo json_encode($response);
}
?>