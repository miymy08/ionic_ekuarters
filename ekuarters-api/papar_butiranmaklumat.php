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
pr_master_pengguna.Nama,
pr_master_pengguna.NoKP,
pr_master_pengguna.NoTel,
pr_indikator_bangsa.NamaBangsa,
pr_indikator_agama.NamaAgama,
pr_indikator_jantina.NamaJantina,
pr_indikator_kahwin.NamaKahwin,
p_infopemohon.TkhLahir,
p_infopemohon.TelR,
p_infopemohon.Alamat_1,
p_infopemohon.Daerah,
p_infopemohon.Poskod,
pr_indikator_negeri.NamaNegeri
FROM
pr_master_pengguna
LEFT JOIN p_infopemohon ON p_infopemohon.NoKPPemohon = pr_master_pengguna.NoKP
LEFT JOIN pr_indikator_bangsa ON pr_indikator_bangsa.IdIndBangsa = p_infopemohon.Bangsa
LEFT JOIN pr_indikator_agama ON pr_indikator_agama.IdIndAgama = p_infopemohon.Agama
LEFT JOIN pr_indikator_jantina ON pr_indikator_jantina.IdIndJantina = p_infopemohon.Jantina
LEFT JOIN pr_indikator_kahwin ON pr_indikator_kahwin.IdIndKahwin = p_infopemohon.StaKahwin
LEFT JOIN pr_indikator_negeri ON pr_indikator_negeri.IdIndNegeri = p_infopemohon.Negeri



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
        $data["Nama"]         = $row["Nama"];
        $data["NoKP"]         = $row["NoKP"];
        $data["NamaBangsa"]   = $row["NamaBangsa"];
        $data["NamaAgama"]    = $row["NamaAgama"];
        $data["NamaJantina"]  = $row["NamaJantina"];

        $orgDate1 =  $row["TkhLahir"];
        $newDate1 = date("d-m-Y", strtotime($orgDate1));
        $data["TkhLahir"]     = $newDate1;
        
        $data["NamaKahwin"]   = $row["NamaKahwin"];
        $data["TelR"]         = $row["TelR"];
        $data["NoTel"]        = $row["NoTel"];
        $data["Alamat_1"]     = $row["Alamat_1"];
        $data["Daerah"]       = $row["Daerah"];
        $data["Poskod"]       = $row["Poskod"];
        $data["NamaNegeri"]   = $row["NamaNegeri"];

        

           
        
         
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