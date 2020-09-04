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
p_pasangan.NamaPas,
p_pasangan.NoKPPas,
p_pasangan.Tkh_LahirPas,
p_pasangan.Jawatan,
pr_indikator_jawatan.NamaJawatan,
p_pasangan.Alamat_Pas1,
p_pasangan.DaerahPas,
p_pasangan.PoskodPas,
p_pasangan.TelHPPas,
p_pasangan.TelPejPas,
p_pasangan.Mohon,
pr_indikator_negeri.NamaNegeri

FROM
p_pasangan
LEFT JOIN pr_master_pengguna ON p_pasangan.NoKPPemohon = pr_master_pengguna.NoKP
LEFT JOIN pr_indikator_negeri ON pr_indikator_negeri.IdIndNegeri = p_pasangan.NegeriPas
LEFT JOIN pr_indikator_jawatan ON pr_indikator_jawatan.IdIndJawatan = p_pasangan.Jawatan



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
        $data["IdPengguna"]   = $row["IdPengguna"];
        $data["NamaPas"]      = $row["NamaPas"];
        $data["NoKPPas"]      = $row["NoKPPas"];

        $orgDate =  $row["Tkh_LahirPas"];
        $newDate = date("d-m-Y", strtotime($orgDate));
        $data["Tkh_LahirPas"] =  $newDate;
        
        $Jawatan = $row["Jawatan"];

        if(is_numeric($Jawatan))
        {
            $data["Jawatan"] = $row["NamaJawatan"];
            
        } 
        else {
            $data["Jawatan"] = $Jawatan;
        }
    
        $data["Alamat_Pas1"]  = $row["Alamat_Pas1"];
        $data["DaerahPas"]    = $row["DaerahPas"];
        $data["PoskodPas"]    = $row["PoskodPas"];
        $data["NamaNegeri"]   = $row["NamaNegeri"];
        $data["TelHPPas"]     = $row["TelHPPas"];
        $data["TelPejPas"]    = $row["TelPejPas"];
        $data["Mohon"]        = $row["Mohon"];

        

           
        
         
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