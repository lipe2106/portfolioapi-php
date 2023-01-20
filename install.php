<?php 
/*
*Skapad av: Lina Petersson. 
*Senast uppdaterad: 2023-01-18.
*/
?>

<?php
//File to install new table to database

include("config.php");

//Connect to database
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
if($db->connect_errno > 0){
    die('Fel vid anslutning [' . $db->connect_error . ']');
} 

//Create table user in database
$sql = "DROP TABLE IF EXISTS user;";
$sql .= "CREATE TABLE user(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(256) NOT NULL,
    description TEXT NOT NULL,
    title VARCHAR(256) NOT NULL,
    quote VARCHAR(256) NOT NULL
);";

//Create table projects in database
$sql .= "DROP TABLE IF EXISTS projects;";
$sql .= "CREATE TABLE projects(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(256) NOT NULL,
    description TEXT NOT NULL,
    image1 VARCHAR(256) NOT NULL,
    image2 VARCHAR(256) NOT NULL,
    image3 VARCHAR(256) NOT NULL,
    image4 VARCHAR(256) NOT NULL,
    image5 VARCHAR(256) NOT NULL,
    link VARCHAR(256) NOT NULL,
    path VARCHAR(64) NOT NULL
);";

//Create table courses in database
$sql .= "DROP TABLE IF EXISTS courses;";
$sql .= "CREATE TABLE courses(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(256) NOT NULL,
    syllabus VARCHAR(256) NOT NULL,
    knowledge VARCHAR(256) NOT NULL
);";

//Create table work in database
$sql .= "DROP TABLE IF EXISTS work;";
$sql .= "CREATE TABLE work(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    company VARCHAR(256) NOT NULL,
    title VARCHAR(256) NOT NULL,
    period VARCHAR(64) NOT NULL
);";


// Insert data into table user
$sql .= 'INSERT INTO user (name, description, title, quote) VALUES
(
    "Lina Petersson", 
    "Lina Petersson heter jag, 37 år och bor i Landskrona med min sambo och våra två döttrar. Jag studerar just nu andra året på distans på programmet Webbutveckling från Mittuniversitetet i Sundsvall.  Jag ser mig själv som en positiv och kreativ tjej med lätt  att lära och lätt för att lära känna nya människor.", 
    "Portfolio 2023 || Webbutveckling", 
    "Snart färdig webbutvecklare. Tycker om design, problemlösning och kaffe!"
);
';

// Insert data into table projects
$sql .= 'INSERT INTO projects (name, description, image1, image2, image3, image4, image5, link, path) VALUES
    (
    "Restaurang RAW",
    "I detta projekt har jag skapat en webbplats till den fiktiva restaurangen RAW. Projektet består av tre delar varav en är restaurangens publika webbplats, där deras meny visas, information om restaurangen kan läsas och möjligheten till att boka bord finns. Menyn och bokningarna hanteras via ett admin- gränssnitt, vilket är projektets andra del. Här loggar restaurangen in för att kunna lägga till, läsa ut, uppdatera samt radera rätter i menyn eller bokningar. Menyn samt bokningarna finns lagrade i en MySQL- databas som är knuten till en REST-webbtjänst. Webbtjänsten är den tredje delen i projektet, är skapad med stöd för CRUD (Create, Read, Update, Delete) och används av både admin- gränssnittet och den publika webbplatsen. Webbtjänsten skapades i PHP medan Admin och den publika webbplatsen skapades med HTML och JavaScript, och använder sig av webbtjänsten med hjälp av Fetch API. Från admingränssnittet hanteras informationen i databasen och därmed även vad som visas på den publika webbplatsen. I skapandet av den publika webbplatsen användes Gulp för automatisering, Sass för CSS-kod och allt versionshanterades med hjälp av GitHub.",
    "raw1.jpg",
    "raw2.jpg",
    "raw3.jpg",
    "raw4.jpg",
    "raw5.jpg",
    "https://www.adrenalinas.se/projekt/raw/webbplats/index.html",
    "raw"
),
(
    "Hotel Hacienda",
    "I detta projekt har jag skapat en webbplats åt det fiktiva hotellet Hotel Hacienda. Hotellet ligger i en avkopplande miljö och erbjuder tre olika typer av boende samt lugnande aktiviteter under vistelsen där. Webbplatsen är skapad som ett eget tema i WordPress CMS och erbjuder personalen på hotellet ett enkelt sätt att själva administrera webbplatsens innehåll via olika användarroller i WordPress adminpanel. Temat är skapat helt från grunden av mig. Featured Image är aktiverat, likaså meny och widget på startsidan. Mallar för undersidor är inlagda samt särskilda kategorier skapade för att kunden själv ska kunna uppdatera webbplatsens design. Sitemap, Moodboard och designskisser skapades först av allt och projektet versionshanterades med GitHub. ",
    "hacienda1.jpg",
    "hacienda2.jpg",
    "hacienda3.jpg",
    "hacienda4.jpg",
    "hacienda5.jpg",
    "https://adrenalinas.se/projekt/hacienda/wordpress/",
    "hacienda"
),
(
    "B. Intranät",
    "I detta projekt har jag skapat ett intranät åt det fiktiva företaget BAS!CLY. Företaget säljer babykläder och produkter som passar under barnets första år. Projektet består av två delar där den första är en REST-webbtjänst (API) som hanterar företagets produkter samt är skapad med hjälp av Laravel som backend-ramverk. Apiet har full CRUD-funktionalitet där produkter och kategorier kan läsas ut, läggas till, uppdateras och raderas samt använder en databas för lagring. Webbtjänsten kräver registrering, inloggning och token för att kunna användas. Andra delen är en klient- applikation, vilken är en Single Page Application skapad med Vue som grund. BootStrap är använt som CSS-ramverk som del av designen. Via applikationen kan användaren registrera sig och logga in på intranätet och där lägga till, uppdatera eller radera kategorier samt produkter, söka efter specifik produkt och uppdatera lagersaldo.",
    "intranet1.jpg",
    "intranet2.jpg",
    "intranet3.jpg",
    "intranet4.jpg",
    "intranet5.jpg",
    "Saknar länk",
    "intranet"
),
(
    "BlogIT",
    "I det här projektet har jag skapat en bloggportal i PHP med namnet BlogIT, vilken riktar sig till utvecklare där de får tillgång till en egen blogfolio att marknadsföra sina projekt via. Bloggportalen innehåller möjligheten att registrera sig som ny användare och då få möjligheten att logga in till sitt konto. Väl inloggad kan användaren uppdatera sin profil med information och bild, skapa nya inlägg, med text och bild, samt vid behov ändra och radera dessa inlägg. De publicerade inläggen visas sedan på adminsidan, på användarens blogfolio samt att de fem senaste inläggen visas på startsidan. Inläggen är nerkortade men vid klick på titeln kommer man till en sida där hela inlägget visas och där finns också möjligheten att kommentera inlägget. På startsidan visas även en lista över bloggportalens registrerade medlemmar och vid klick på deras namn kommer man till vald användares blogfolio där profil och inlägg visas. Blogfolion kan man gilla och dela och på så sätt är det tänkt att den marknadförs vidare. Användare, blogginlägg och kommentarer sparas i en MySQL- databas. ",
    "blogit1.jpg",
    "blogit2.jpg",
    "blogit3.jpg",
    "blogit4.jpg",
    "blogit5.jpg",
    "https://studenter.miun.se/~lipe2106/writeable/dt093g/projekt",
    "blogit"
),
(
    "Färdtjänst",
    "I detta projekt har jag skapat en webbplats för bokning av färdtjänst. Webbplatsen är tänkt att vara ett samarbete mellan Region Skåne och Skånetrafiken, då det är de som är ansvariga för färdtjänsten här. Webbplatsen utgår från att användaren befinner sig i inloggat läge. Webbplatsen är skapad för att vara så tillgänglig och användbar som möjligt och är baserad på de webbriktlinjer som gäller för myndigheter och offentliga sektorn. Den har testats via testverktyg och användartester för att kontrollera tillgänglighet och användbarhet.Webbplatsen innehåller, förutom möjligheten att boka färdtjänstresa, även tjänsterna Omboka resa, Avboka resa samt Var är min bil, som är tänkt att vara till hjälp vid väntan på bokad bil. Alla tre tjänster nås via förstasidan samt huvudmenyn. Användaren kan även välja om resan som bokas ska vara återkommande. På webbplatsen finns också information om färdtjänst och de regler som finns, kundservice samt en tillgänglighetsredogörelse. Webbplatsen är dock inte skapad så att information sparas från en sida till en annan och datan lagras inte heller någonstans, då fokus i denna kurs inte låg på det.",
    "fardtjanst1.jpg",
    "fardtjanst2.jpg",
    "fardtjanst3.jpg",
    "fardtjanst4.jpg",
    "fardtjanst5.jpg",
    "https://studenter.miun.se/~lipe2106/dt068g/projekt/",
    "fardtjanst"
);
';

// Insert data into table courses
$sql .= 'INSERT INTO courses (name, syllabus, knowledge) VALUES
(
    "Webbutveckling I",
    "http://www.miun.se/utbildning/kurser/sok-kursplan/kursplan?kursplanid=15472",
    "HTML, CSS"
),
(
    "Introduktion till programmering i JavaScript",
    "https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/kursplan/?kursplanid=30811",
    "JavaScript"
),
(
    "Digital bildbehandling för webb",
    "https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/kursplan/?kursplanid=24403",
    "Bildredigering"
),
(
    "Webbanvändbarhet",
    "https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/kursplan/?kursplanid=30823",
    "Tillgänglighet, WCAG"
),
(
    "Databaser",
    "https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/kursplan/?kursplanid=21595",
    "MySQL, SQL"
),
(
    "Webbutveckling II",
    "http://www.miun.se/utbildning/kurser/sok-kursplan/kursplan?kursplanid=15474",
    "PHP, Databasanslutningar"
),
(
    "Webbdesign för CMS",
    "https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/kursplan/?kursplanid=31118",
    "CMS, WordPress"
),
(
    "Webbutveckling III",
    "https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/kursplan/?kursplanid=31475",
    "REST-apier"
),
(
    "Projektledning",
    "https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/kursplan/?kursplanid=31886",
    "Agil projektledning, Vattenfallsmetoden"
),
(
    "Fullstack- utveckling med ramverk",
    "https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/kursplan/?kursplanid=31728",
    "Laravel, Vue, BootStrap"
),
(
    "JavaScriptbaserad webbutveckling",
    "https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/kursplan/?kursplanid=19689",
    "Node.js, Express, MongoDB, Vue"
),
(
    "Programmering i C#.NET",
    "https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/kursplan/?kursplanid=25557",
    "C#, .NET"
);
';

// Insert data into table work
$sql .= 'INSERT INTO work (company, title, period) VALUES
(
    "Humana Assistans",
    "Personlig assistent/ arbetsledare",
    "2014 - "
),
(
    "Träning och Hälsa i Skåne AB",
    "Platschef/ instruktör",
    "2012 - 2014"
),
(
    "Träning och Hälsa i Landskrona AB",
    "Platschef/ instruktör",
    "2012 - 2014"
),
(
    "EasyLife Malmö AB",
    "Instruktör",
    "2012"
),
(
    "Hemlösas Hus i Helsingborg",
    "Timanställd",
    "2011 - 2013"
),
(
    "Casino Cosmopol Göteborg",
    "Cashier",
    "2008"
),
(
    "Hemköp Landskrona",
    "Kassörska",
    "2004 - 2011"
),
(
    "Ica krysset",
    "Kassörska",
    "2003 - 2004"
),
(
    "Hemköp City Landskrona",
    "Cashier",
    "2002"
);
';

//Print 
echo "<pre>$sql</pre>"; 

//Send query to database
if($db->multi_query($sql)) {
    echo "<p>Tabeller installerade.</p>";
} else {
    echo "<p>Fel vid installation av tabeller.</p>";
}