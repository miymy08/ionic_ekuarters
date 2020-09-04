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
p_tanggungan.NamaTang,
p_tanggungan.NoKPTang,
p_tanggungan.Tkh_LahirTang,
pr_indikator_tanggung.BilTanggung,
pr_indikator_tanggung.NamaTanggung,
pr_indikator_jantina.NamaJantina
FROM
p_tanggungan
LEFT JOIN pr_master_pengguna ON p_tanggungan.NoKPPemohon = pr_master_pengguna.NoKP
LEFT JOIN pr_indikator_tanggung ON pr_indikator_tanggung.IdIndTanggung = p_tanggungan.KodTang
LEFT JOIN pr_indikator_jantina ON pr_indikator_jantina.IdIndJantina = p_tanggungan.JantinaTang AND pr_indikator_jantina.IdIndJantina = p_tanggungan.JantinaTang


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
        $data["NamaTang"]      = $row["NamaTang"];
        $data["NoKPTang"]      = $row["NoKPTang"];

        $orgDate =  $row["Tkh_LahirTang"];
        $newDate = date("d-m-Y", strtotime($orgDate));
        $data["Tkh_LahirTang"] = $newDate;
        $data["BilTanggung"]   = $row["BilTanggung"];
        $data["NamaTanggung"]      = $row["NamaTanggung"];
        $data["NamaJantina"]   = $row["NamaJantina"];          
        


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