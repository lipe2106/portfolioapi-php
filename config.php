<?php 
/*
*Skapad av: Lina Petersson. 
*Senast uppdaterad: 2023-01-18.
*/
?>
<?php

 //Autoinclude class files
 spl_autoload_register(function($class_name) {
    include("classes/" . $class_name . ".class.php");
});

//Developer mode
$devmode = true;

if ($devmode) {
    // Activate error messages 
    error_reporting(-1);
    ini_set("display_errors", 1);

    //Database settings
    define("DBHOST", "localhost");
    define("DBUSER", "portfolioapi");
    define("DBPASS", "password");
    define("DBDATABASE", "portfolioapi");

} else {
    //Database settings
    define("DBHOST", "adrenalinas.se.mysql");
    define("DBUSER", "adrenalinas_se");
    define("DBPASS", "Kanelbulle");
    define("DBDATABASE", "adrenalinas_se");
}