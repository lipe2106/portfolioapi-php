<?php 
/*
*Skapad av: Lina Petersson. 
*Senast uppdaterad: 2023-01-18.
*/
?>

<?php

//Create class
class Project {

    //Properties
    private $name;
    private $description;
    private $image1;
    private $image2;
    private $image3;
    private $image4;
    private $image5;
    private $link;
    private $path;

    //Constructor to create database
    public function __construct() {
        
        //Connect to database
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_errno > 0) {
            die ('Fel vid anslutning [' . $db->connect_error . ']');
        }
    }

    //Method to get projects
    public function getProjects() : array {
        $sql = "SELECT * FROM projects;";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Method to get specific project
    public function getProjectById(int $id) : array {
        $sql = "SELECT * FROM projects WHERE id = $id;";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}