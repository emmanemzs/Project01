<?php
session_start();
//error message
if(empty($_SESSION["errorMessage"]))
{
	$_SESSION['errorMessage'] = "";
}

include("includes/OpenDbConn.php");


?>


<!doctype html>
<html>
<head>
	<meta charset="uts-8">
	<title>Project 1 - DELETE</title>
	<style type="text/css">
		form{width: 400px; margin: 0px auto;}
		ul{list-style: none; margin-top: 5px;}
		ul li{display: block; float: left; width: 100%; height: 1%;}
		ul li label{ float: left; padding: 7px;}
		ul li span{color: #0000ff; font-weight: bold;}
		ul li span#radios{color:#000000; font-weight: normal; padding: 0px; margin-right: 130px;}
		ul li input, ul li select, span.values{ float: right; margin-right: 10px; border: 1px solid #000; padding: 3px;width: 240px;}
		ul li input[type="radio"]{float: none; margin-right:  0px; padding: 0px; width: 40px; }
		#submit{width:248px;}
		li input:focus{border:1px solid #999;}
		fieldset{padding: 10px; border: 1px solid #000; width: 420px; overflow: auto; margin-top 10px;}
		legend{color:#000000; margin: 0 10px 0; padding: 0 5px; font-size: 11pt; font-weight: bold;}
	
	</style>
</head>

<body>
	<h1 style="text-align: center;">Project 1 - DELETE</h1>
	<?php
	include("includes/menu.php");
	
	$sql = "SELECT BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover FROM P1Books WHERE BookID=7";

	$result = mysqli_query($db,$sql);

	if(empty($result))
	{
		$num_results = 0;
	}
	else{
		$num_results = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
	}

	if($num_results == 0)
		$_SESSION["errorMessage"]= "You must first insert a Book with ID 7"
		
		// The Car ID field below is disabled
		// disabled one isnt sent to next page
		// the hidden one is sent

	?>
	<form id="form0" name="form0" method="post" action="doDelete.php">
	<fieldset>
	<legend> Are you sure you want to delete this entry?</legend>
	<ul>
		<li>
			<label title="BookID" for="bookIDdis">Book ID</label>
			<span class="values"><?php if($num_results !=0) {echo(trim( $row["BookID"]));} ?> </span>
			
		</li>
		<li>
			<label title="Title" for="title">Title</label>
			<span class="values"><?php if($num_results !=0) {echo(trim( $row["Title"]));} ?> </span>
		</li>
		
		<li>
			<label title="Author" for="author">Author</label>
			<span class="values"><?php if($num_results !=0) {echo(trim( $row["Author"]));} ?> </span>
		</li>
		
		<li>
			<label title="Topic" for="topic">Topic</label>
			<span class="values"><?php if($num_results !=0) {echo(trim( $row["Topic"]));} ?> </span>
		</li>
		<li>
			<label title="Genre" for="genre">Genre</label>
			<span class="values"><?php if($num_results !=0) {echo(trim( $row["Genre"]));} ?> </span>
		</li>
		<li>
			<label title="ISBN" for="isbn">ISBN</label>
			<span class="values"><?php if($num_results !=0) {echo(trim( $row["ISBN"]));} ?> </span>
		</li>
		<li>
			<label title="DatePublished" for="datePublished">Date Published</label>
			<span class="values"><?php if($num_results !=0) {echo(trim( $row["DatePublished"]));} ?> </span>
		</li>
		<li>
			<label title="HardCover" for="hardCover">Hard Cover</label>
			<span class="values"><?php if($num_results !=0) {echo(trim( $row["Hardcover"]));} ?> </span>
		</li>
		
		<li>
			<input type="submit" value="Confirm Delete Project" name="submit" id="submit"/>
		
		</li>
	</ul>
	</fieldset>
</form>
	<?php
	//clear the error
	$_SESSION["errorMessage"] = "";
	?>
	
	
</body>
</html>