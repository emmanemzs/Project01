<?php
session_start();

// get the data from insert.php
$BookID      = $_POST["bookID"];            
$Title       = addslashes($_POST["title"]); 
$Author   = addslashes($_POST["author"]);
$Topic   = addslashes($_POST["topic"]); 
$Genre     = $_POST["genre"];   
$ISBN       = addslashes($_POST["isbn"]);  
$PubMonth       = $_POST["pubMonth"];   
$PubYear         = $_POST["pubYear"]; 
$HardCover         = $_POST["hardCover"];

//remove potentially harmful items
$removeThese    = array("<?php","<?","</","<","?>","/>",">",";");
$Title       = str_replace($removeThese, "", $Title);
$Author   = str_replace($removeThese, "", $Author); 
$ISBN   = str_replace($removeThese, "", $ISBN); 
$Topic   = str_replace($removeThese, "", $Topic); 

if(($BookID == "")|| ($Title == "")|| ($Author == "- Category -") || ($Topic == "- Topic -") || ($Genre == "") || ($ISBN == "")|| ($PubMonth == "- Month -") || ($PubYear == "- Year -"))
{
	// a form field is empty
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location:insert.php");
	exit;
	
}
else if ( !is_numeric($ISBN) || strlen($ISBN) != 13 )
{
	// the shipper ID was not a number
	$_SESSION["errorMessage"] = "You must enter a 13 digit number for ISBN!";
	header("Location:insert.php");
	exit;
}
else if ( !is_numeric($BookID) )
{
	// the shipper ID was not a number
	$_SESSION["errorMessage"] = "You must enter a number for BookID!";
	header("Location:insert.php");
	exit;
}
else{
	$_SESSION["errorMessage"] = "";
}
//open database connection
include("includes/OpenDbConn.php");


$DatePublished = $PubMonth." ".$PubYear;

if (empty($HardCover)) {
    // Check if the checkbox is checked
        $HardCover = "No";
    }

// prepare the sql statement
$sql = "UPDATE P1Books SET Title='".$Title."', Author='".$Author."', Topic='".$Topic."', Genre='".$Genre."', ISBN='".$ISBN."', DatePublished='".$DatePublished."', Hardcover='".$HardCover."' WHERE BookID=".$BookID;
echo($sql);
//"some text".$variable."some more text"

$result = mysqli_query($db,$sql);
include("includes/CloseDbConn.php");

header("Location:select.php");
exit;


?>