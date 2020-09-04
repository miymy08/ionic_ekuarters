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
pr_master_pengguna.NoKP,
pr_indikator_jabatan.NamaJabatan,
pr_master_pengguna.Nama
FROM
pr_master_pengguna
LEFT JOIN p_infopemohon ON p_infopemohon.NoKPPemohon = pr_master_pengguna.NoKP
LEFT JOIN pr_indikator_jabatan ON pr_indikator_jabatan.IdIndJabatan = p_infopemohon.Jabatan

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
        $data["IdPengguna"] = $row["IdPengguna"];
        $data["Nama"] = $row["Nama"];
        $data["NamaJabatan"] = $row["NamaJabatan"];
        

           
        
         
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