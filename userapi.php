<?php 
/*
*Skapad av: Lina Petersson. 
*Senast uppdaterad: 2023-01-18.
*/
?>

<?php
include_once('config.php');

//Header settings for api
header('Content-Type: application/json'); //Api sends data in JSON
header('Access-Control-Allow-Origin: https://www.adrenalinas.se/'); //Makes api available from domain
header('Access-Control-Allow-Methods: OPTIONS, GET'); //Methods api accept 
header('Access-Control-Allow-Headers: Origin, Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With'); //Specifies which headers are allowed when called from client side  

//Control if id is in url and save in variable
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

//Create object of class
$user = new User();

if(isset($id)) {
    //Call method to get user info
    $response = $user->getUserInfo($id); 

    if(count($response) === 0) {
        $response = array("message" => "Den efterfrågade användaren finns inte lagrad i databasen");
        http_response_code(404); //Not found
    } else {
        http_response_code(200); //OK
    }
}
//Sends respons to user
echo json_encode($response);