<?php 
/*
*Skapad av: Lina Petersson. 
*Senast uppdaterad: 2023-01-18.
*/
?>

<?php

//Create class
class User {

    //Properties
    private $name;
    private $description;
    private $title;
    private $quote;

    //Constructor to create database
    public function __construct() {
        
        //Connect to database
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_errno > 0) {
            die ('Fel vid anslutning [' . $db->connect_error . ']');
        }
    }

    //Method to get user info
    public function getUserInfo($id) : array {
        $sql = "SELECT * FROM user WHERE id = $id;";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}
