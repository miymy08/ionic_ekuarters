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
$result = mysqli_query($db->connect(), "

SELECT
pr_master_pengguna.IdPengguna,
p_permohonan.NoRujukan,
p_permohonan.Tkh_Pohon,
p_kuarters.Alamat,
p_permohonan.Tkh_Tawaran,
pr_indikator_status.NamaStatus,
pr_indikator_statuspemohon.StatusPemohon,
p_permohonan.SebabTolakKIV
FROM
pr_master_pengguna
LEFT JOIN p_permohonan ON p_permohonan.NoKPPemohon = pr_master_pengguna.NoKP
LEFT JOIN p_kuarters ON p_kuarters.IdKuarters = p_permohonan.IdKuarters
LEFT JOIN pr_indikator_status ON pr_indikator_status.IdIndStatus = p_permohonan.`Status`
LEFT JOIN pr_indikator_statuspemohon ON pr_indikator_statuspemohon.IdIndStatPemohon = p_permohonan.Status_pemohon



WHERE pr_master_pengguna.IdPengguna = '$IdPengguna'
 ");
 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // tasks node
    $response["pr_master_pengguna"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp tasks array
        $maklumat = array();
        $data["IdPengguna"]    = $row["IdPengguna"];
        $data["NoRujukan"]     = $row["NoRujukan"];

        $orgDate1 =  $row["Tkh_Pohon"];
        $newDate1 = date("d-m-Y", strtotime($orgDate1));
        $data["Tkh_Pohon"]     = $newDate1;
        $data["Alamat"]        = $row["Alamat"];

        $orgDate =  $row["Tkh_Tawaran"];
        $newDate = date("d-m-Y", strtotime($orgDate));
        $data["Tkh_Tawaran"]   = $newDate ;
        
        $data["NamaStatus"]    = $row["NamaStatus"];  
        $data["StatusPemohon"] = $row["StatusPemohon"];
        $data["SebabTolakKIV"] = $row["SebabTolakKIV"];
       

        

           
        
         
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