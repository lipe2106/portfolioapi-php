<?php 
/*
*Skapad av: Lina Petersson. 
*Senast uppdaterad: 2023-01-18.
*/
?>

<?php

//Create class
class Work {

    //Properties
    private $company;
    private $title;
    private $period;

    //Constructor to create database
    public function __construct() {
        
        //Connect to database
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_errno > 0) {
            die ('Fel vid anslutning [' . $db->connect_error . ']');
        }
    }

    //Method to get work
    public function getWork() : array {
        $sql = "SELECT * FROM work;";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}