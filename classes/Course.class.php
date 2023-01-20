<?php 
/*
*Skapad av: Lina Petersson. 
*Senast uppdaterad: 2023-01-18.
*/
?>

<?php

//Create class
class Course {

    //Properties
    private $name;
    private $syllabus;
    private $knowledge;

    //Constructor to create database
    public function __construct() {
        
        //Connect to database
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_errno > 0) {
            die ('Fel vid anslutning [' . $db->connect_error . ']');
        }
    }

    //Method to get coruses
    public function getCourses() : array {
        $sql = "SELECT * FROM courses;";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}