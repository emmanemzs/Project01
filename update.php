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
	<title>Project 1 - UPDATE</title>
	<style type="text/css">
		form{width: 400px; margin: 0px auto;}
		ul{list-style: none; margin-top: 5px;}
		ul li{display: block; float: left; width: 100%; height: 1%;}
		ul li label{ float: left; padding: 7px;}
		ul li span{color: #0000ff; font-weight: bold;}
		ul li span#radios{float: right; margin-right: 30px; padding: 3px;width: 240px; font-weight: normal; color: #000000;margin-bottom: 10px}
		ul li input, ul li select{ float: right; margin-right: 10px; border: 1px solid #000; padding: 3px;width: 240px;}
		ul li input[type="radio"]{float: none; margin-right:  0px; padding: 0px; width: 40px; }
		#submit{width:248px;}
		li input:focus{border:1px solid #999;}
		fieldset{padding: 10px; border: 1px solid #000; width: 420px; overflow: auto; margin-top 10px;}
		legend{color:#000000; margin: 0 10px 0; padding: 0 5px; font-size: 11pt; font-weight: bold;}
	
	
	</style>
</head>

<body>
	<h1 style="text-align: center;">Project 1 - UPDATE</h1>
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
	<form id="form0" name="form0" method="post" action="doUpdate.php">
	<fieldset>
	<legend> Update the P1Books table</legend>
	<ul>
		<li>
			<label title="BookID" for="bookIDdis">Book ID</label>
			<input name="bookIDdis" id="bookIDdis" type="text" size="20" maxlength="3" 
				   value= "<?php if($num_results !=0) {echo(trim( $row["BookID"]));} ?> "disabled="disabled"/>
			<input name="bookID" id="bookID" type="hidden" size="20" maxlength="3" 
				   value= "<?php if($num_results !=0) {echo(trim( $row["BookID"]));} ?>"/>
		</li>
		<li>
			<label title="Title" for="title">Title</label>
			<input name="title" id="title" type="text" size="20" maxlength="50" 
				   value= "<?php if($num_results !=0) {echo(trim( $row["Title"]));} ?>"/>
		</li>
		
		<li>
			<label title="Author" for="author">Author</label>
			<input name="author" id="author" type="text" size="20" maxlength="50" 
				   value= "<?php if($num_results !=0) {echo(trim( $row["Author"]));} ?>"/>
		</li>
		<li>
			<label title="Topic" for="topic">Topic</label>
			<select name="topic" id="topic">
                <option value="- Topic -">- Topic -</option>
                <option value="Adventure" 	<?php if(($num_results !=0) && (trim( $row["Topic"])=="Adventure")) {echo("selected='selected'");} ?>>Adventure</option>
				<option value="Art"  		<?php if(($num_results !=0) && (trim( $row["Topic"])=="Art")) {echo("selected='selected'");} ?>>Art</option>
				<option value="Astronomy"	<?php if(($num_results !=0) && (trim( $row["Topic"])=="Astronomy")) {echo("selected='selected'");} ?>>Astronomy</option>
				<option value="Culture"		<?php if(($num_results !=0) && (trim( $row["Topic"])=="Culture")) {echo("selected='selected'");} ?>>Culture</option>
				<option value="Cuisine"		<?php if(($num_results !=0) && (trim( $row["Topic"])=="Cuisine")) {echo("selected='selected'");} ?>>Cuisine</option>
				<option value="Dreams"		<?php if(($num_results !=0) && (trim( $row["Topic"])=="Dreams")) {echo("selected='selected'");} ?>>Dreams</option>
				<option value="Exploration"	<?php if(($num_results !=0) && (trim( $row["Topic"])=="Exploration")) {echo("selected='selected'");} ?>>Exploration</option>
				<option value="History"		<?php if(($num_results !=0) && (trim( $row["Topic"])=="History")) {echo("selected='selected'");} ?>>History</option>
				<option value="Nature"		<?php if(($num_results !=0) && (trim( $row["Topic"])=="Nature")) {echo("selected='selected'");} ?>>Nature</option>
				<option value="Philosophy"  <?php if(($num_results !=0) && (trim( $row["Topic"])=="Philosophy")) {echo("selected='selected'");} ?>>Philosophy</option>
				<option value="Psychology"  <?php if(($num_results !=0) && (trim( $row["Topic"])=="Psychology")) {echo("selected='selected'");} ?>>Psychology</option>
				<option value="Self-help"	<?php if(($num_results !=0) && (trim( $row["Topic"])=="Self-help")) {echo("selected='selected'");} ?>>Self-help</option>
				<option value="Technology"  <?php if(($num_results !=0) && (trim( $row["Topic"])=="Technology")) {echo("selected='selected'");} ?>>Technology</option>
				<option value="Thriller"	<?php if(($num_results !=0) && (trim( $row["Topic"])=="Thriller")) {echo("selected='selected'");} ?>>Thriller</option>
				<option value="Travel"		<?php if(($num_results !=0) && (trim( $row["Topic"])=="Travel")) {echo("selected='selected'");} ?>>Travel</option>
       		</select>
		</li>
		<li>
			<label title="Genre" for="genre">Genre</label>
			<span id="radios" style="float:right;">
				<input name="genre" id="genre" type="radio" value="Fiction"     <?php if(  ($num_results !=0)&& (trim($row["Genre"]) == "Fiction")){echo("checked='checked'");}  ?>/>Fiction
				<input name="genre" id="genre" type="radio" value="Non-Fiction" <?php if(  ($num_results !=0)&& (trim($row["Genre"]) == "Non-Fiction")){echo("checked='checked'");}  ?>/>Non-Fiction
				<input name="genre" id="genre" type="radio" value="Romance"     <?php if(  ($num_results !=0)&& (trim($row["Genre"]) == "Romance")){echo("checked='checked'");}  ?>/>Romance
				<input name="genre" id="genre" type="radio" value="Mystery"     <?php if(  ($num_results !=0)&& (trim($row["Genre"]) == "Mystery")){echo("checked='checked'");}  ?>/>Mystery
				<input name="genre" id="genre" type="radio" value="Fantasy"     <?php if(  ($num_results !=0)&& (trim($row["Genre"]) == "Fantasy")){echo("checked='checked'");}  ?>/>Fantasy
			</span>
			
		</li>
		
		<li>
			<label title="ISBN" for="isbn">ISBN</label>
			<input name="isbn" id="isbn" type="text" size="20" maxlength="50"
				   value= "<?php if($num_results !=0) {echo(trim( $row["ISBN"]));} ?>"/>
		</li>
		
		<?php
		
		// seperate start date and end date into 4 variables
		// To get month: substring from start position 0 to " "
		//to get day: substring from " " to len of string
		$PubMonth = trim(substr(trim($row["DatePublished"]), 0, strpos(trim($row["DatePublished"]), " ")) );
		$PubYear  = trim(substr(trim($row["DatePublished"]), strpos(trim($row["DatePublished"]), " "), strlen(trim($row["DatePublished"]))) );
		

		
		?>
		<li>
			<label title="PubMonth" for="pubMonth">Month Published</label>
			<select name="pubMonth" id="pubMonth">
                <option value="- Month -">- Month -</option>
                <option value="Jan" <?php if( ($num_results !=0) && ($PubMonth=="Jan")) {echo("selected='selected'");} ?>>Jan</option>
				<option value="Feb" <?php if( ($num_results !=0) && ($PubMonth=="Feb")) {echo("selected='selected'");} ?>>Feb</option>
				<option value="Mar" <?php if( ($num_results !=0) && ($PubMonth=="Mar")) {echo("selected='selected'");} ?>>Mar</option>
				<option value="Apr" <?php if( ($num_results !=0) && ($PubMonth=="Apr")) {echo("selected='selected'");} ?>>Apr</option>
				<option value="May" <?php if( ($num_results !=0) && ($PubMonth=="May")) {echo("selected='selected'");} ?>>May</option>
				<option value="Jun" <?php if( ($num_results !=0) && ($PubMonth=="Jun")) {echo("selected='selected'");} ?>>Jun</option>
				<option value="Jul" <?php if( ($num_results !=0) && ($PubMonth=="Jul")) {echo("selected='selected'");} ?>>Jul</option>
				<option value="Aug" <?php if( ($num_results !=0) && ($PubMonth=="Aug")) {echo("selected='selected'");} ?>>Aug</option>
				<option value="Sep" <?php if( ($num_results !=0) && ($PubMonth=="Sep")) {echo("selected='selected'");} ?>>Sep</option>
				<option value="Oct" <?php if( ($num_results !=0) && ($PubMonth=="Oct")) {echo("selected='selected'");} ?>>Oct</option>
				<option value="Nov" <?php if( ($num_results !=0) && ($PubMonth=="Nov")) {echo("selected='selected'");} ?>>Nov</option>
				<option value="Dec" <?php if( ($num_results !=0) && ($PubMonth=="Dec")) {echo("selected='selected'");} ?>>Dec</option>
                
       		 </select>
		</li>
		<li>
			<label title="PubYear" for="pubYear">Year Published</label>
			<select name="pubYear" id="pubYear">
                <option value="- Year -">- Year -</option>
				<option value="2020"	<?php if(  ($num_results !=0)&& ($PubYear=="2023")){echo("selected='selected'");}  ?>>2023</option>
				<option value="2022"	<?php if(  ($num_results !=0)&& ($PubYear=="2022")){echo("selected='selected'");}  ?>>2022</option>
                <option value="2021"	<?php if(  ($num_results !=0)&& ($PubYear=="2021")){echo("selected='selected'");}  ?>>2021</option>
                <option value="2020"	<?php if(  ($num_results !=0)&& ($PubYear=="2020")){echo("selected='selected'");}  ?>>2020</option>
                <option value="2019"	<?php if(  ($num_results !=0)&& ($PubYear=="2019")){echo("selected='selected'");}  ?>>2019</option>
                <option value="2018"	<?php if(  ($num_results !=0)&& ($PubYear=="2018")){echo("selected='selected'");}  ?>>2018</option>
                <option value="2017"	<?php if(  ($num_results !=0)&& ($PubYear=="2017")){echo("selected='selected'");}  ?>>2017</option>
                <option value="2016"	<?php if(  ($num_results !=0)&& ($PubYear=="2016")){echo("selected='selected'");}  ?>>2016</option>
                <option value="2015"	<?php if(  ($num_results !=0)&& ($PubYear=="2015")){echo("selected='selected'");}  ?>>2015</option>
                <option value="2014"	<?php if(  ($num_results !=0)&& ($PubYear=="2014")){echo("selected='selected'");}  ?>>2014</option>
                <option value="2013"	<?php if(  ($num_results !=0)&& ($PubYear=="2013")){echo("selected='selected'");}  ?>>2013</option>
                <option value="2012"	<?php if(  ($num_results !=0)&& ($PubYear=="2012")){echo("selected='selected'");}  ?>>2012</option>
                <option value="2011"	<?php if(  ($num_results !=0)&& ($PubYear=="2011")){echo("selected='selected'");}  ?>>2011</option>
                <option value="2010"	<?php if(  ($num_results !=0)&& ($PubYear=="2010")){echo("selected='selected'");}  ?>>2010</option>
                <option value="2009"	<?php if(  ($num_results !=0)&& ($PubYear=="2009")){echo("selected='selected'");}  ?>>2009</option>
                <option value="2008"	<?php if(  ($num_results !=0)&& ($PubYear=="2008")){echo("selected='selected'");}  ?>>2008</option>
                <option value="2007"	<?php if(  ($num_results !=0)&& ($PubYear=="2007")){echo("selected='selected'");}  ?>>2007</option>
                <option value="2006"	<?php if(  ($num_results !=0)&& ($PubYear=="2006")){echo("selected='selected'");}  ?>>2006</option>
                <option value="2005"	<?php if(  ($num_results !=0)&& ($PubYear=="2005")){echo("selected='selected'");}  ?>>2005</option>
                <option value="2004"	<?php if(  ($num_results !=0)&& ($PubYear=="2004")){echo("selected='selected'");}  ?>>2004</option>
                <option value="2003"	<?php if(  ($num_results !=0)&& ($PubYear=="2003")){echo("selected='selected'");}  ?>>2003</option>
                <option value="2002"	<?php if(  ($num_results !=0)&& ($PubYear=="2002")){echo("selected='selected'");}  ?>>2002</option>
                <option value="2001"	<?php if(  ($num_results !=0)&& ($PubYear=="2010")){echo("selected='selected'");}  ?>>2001</option>
                <option value="2000"	<?php if(  ($num_results !=0)&& ($PubYear=="2000")){echo("selected='selected'");}  ?>>2000</option>
                <option value="1999"	<?php if(  ($num_results !=0)&& ($PubYear=="1999")){echo("selected='selected'");}  ?>>1999</option>
                <option value="1998"	<?php if(  ($num_results !=0)&& ($PubYear=="1998")){echo("selected='selected'");}  ?>>1998</option>
                <option value="1997"	<?php if(  ($num_results !=0)&& ($PubYear=="1997")){echo("selected='selected'");}  ?>>1997</option>
                <option value="1996"	<?php if(  ($num_results !=0)&& ($PubYear=="1996")){echo("selected='selected'");}  ?>>1996</option>
                <option value="1995"	<?php if(  ($num_results !=0)&& ($PubYear=="1995")){echo("selected='selected'");}  ?>>1995</option>
                <option value="1994"	<?php if(  ($num_results !=0)&& ($PubYear=="1994")){echo("selected='selected'");}  ?>>1994</option>
                <option value="1993"	<?php if(  ($num_results !=0)&& ($PubYear=="1993")){echo("selected='selected'");}  ?>>1993</option>
                <option value="1992"	<?php if(  ($num_results !=0)&& ($PubYear=="1992")){echo("selected='selected'");}  ?>>1992</option>
                <option value="1991"	<?php if(  ($num_results !=0)&& ($PubYear=="1991")){echo("selected='selected'");}  ?>>1991</option>
                <option value="1990"	<?php if(  ($num_results !=0)&& ($PubYear=="1990")){echo("selected='selected'");}  ?>>1990</option>
                <option value="1989"	<?php if(  ($num_results !=0)&& ($PubYear=="1989")){echo("selected='selected'");}  ?>>1989</option>
                <option value="1988"	<?php if(  ($num_results !=0)&& ($PubYear=="1988")){echo("selected='selected'");}  ?>>1988</option>
                <option value="1987"	<?php if(  ($num_results !=0)&& ($PubYear=="1987")){echo("selected='selected'");}  ?>>1987</option>
                <option value="1986"	<?php if(  ($num_results !=0)&& ($PubYear=="1986")){echo("selected='selected'");}  ?>>1986</option>
                <option value="1985"	<?php if(  ($num_results !=0)&& ($PubYear=="1985")){echo("selected='selected'");}  ?>>1985</option>
                <option value="1984"	<?php if(  ($num_results !=0)&& ($PubYear=="1984")){echo("selected='selected'");}  ?>>1984</option>
                <option value="1983"	<?php if(  ($num_results !=0)&& ($PubYear=="1983")){echo("selected='selected'");}  ?>>1983</option>
                <option value="1982"	<?php if(  ($num_results !=0)&& ($PubYear=="1982")){echo("selected='selected'");}  ?>>1982</option>
                <option value="1981"	<?php if(  ($num_results !=0)&& ($PubYear=="1981")){echo("selected='selected'");}  ?>>1981</option>
                <option value="1980"	<?php if(  ($num_results !=0)&& ($PubYear=="1980")){echo("selected='selected'");}  ?>>1980</option>
                <option value="1979"	<?php if(  ($num_results !=0)&& ($PubYear=="1979")){echo("selected='selected'");}  ?>>1979</option>
                <option value="1978"	<?php if(  ($num_results !=0)&& ($PubYear=="1978")){echo("selected='selected'");}  ?>>1978</option>
                <option value="1977"	<?php if(  ($num_results !=0)&& ($PubYear=="1977")){echo("selected='selected'");}  ?>>1977</option>
                <option value="1976"	<?php if(  ($num_results !=0)&& ($PubYear=="1976")){echo("selected='selected'");}  ?>>1976</option>
                <option value="1975"	<?php if(  ($num_results !=0)&& ($PubYear=="1975")){echo("selected='selected'");}  ?>>1975</option>
                <option value="1974"	<?php if(  ($num_results !=0)&& ($PubYear=="1974")){echo("selected='selected'");}  ?>>1974</option>
                <option value="1973"	<?php if(  ($num_results !=0)&& ($PubYear=="1973")){echo("selected='selected'");}  ?>>1973</option>
                <option value="1972"	<?php if(  ($num_results !=0)&& ($PubYear=="1972")){echo("selected='selected'");}  ?>>1972</option>
                <option value="1971"	<?php if(  ($num_results !=0)&& ($PubYear=="1971")){echo("selected='selected'");}  ?>>1971</option>
                <option value="1970"	<?php if(  ($num_results !=0)&& ($PubYear=="1970")){echo("selected='selected'");}  ?>>1970</option>
                <option value="1969"	<?php if(  ($num_results !=0)&& ($PubYear=="1969")){echo("selected='selected'");}  ?>>1969</option>
                <option value="1968"	<?php if(  ($num_results !=0)&& ($PubYear=="1968")){echo("selected='selected'");}  ?>>1968</option>
                <option value="1967"	<?php if(  ($num_results !=0)&& ($PubYear=="1967")){echo("selected='selected'");}  ?>>1967</option>
                <option value="1966"	<?php if(  ($num_results !=0)&& ($PubYear=="1966")){echo("selected='selected'");}  ?>>1966</option>
                <option value="1965"	<?php if(  ($num_results !=0)&& ($PubYear=="1965")){echo("selected='selected'");}  ?>>1965</option>
                <option value="1964"	<?php if(  ($num_results !=0)&& ($PubYear=="1964")){echo("selected='selected'");}  ?>>1964</option>
                <option value="1963"	<?php if(  ($num_results !=0)&& ($PubYear=="1963")){echo("selected='selected'");}  ?>>1963</option>
                <option value="1962"	<?php if(  ($num_results !=0)&& ($PubYear=="1962")){echo("selected='selected'");}  ?>>1962</option>
                <option value="1961"	<?php if(  ($num_results !=0)&& ($PubYear=="1961")){echo("selected='selected'");}  ?>>1961</option>
                <option value="1960"	<?php if(  ($num_results !=0)&& ($PubYear=="1960")){echo("selected='selected'");}  ?>>1960</option>
       		 </select>
		</li>
		
		
		<li>
			<label title="HardCover" for="hardCover">Hard Cover</label>
			<span id="checkboxes" style="float:right;">
				<input name="hardCover" id="hardCover" type="checkbox" value="Yes" <?php echo isset($_POST['hardCover']) && $_POST['hardCover'] == 'Yes' ? 'Yes' : 'No'; ?> />
			</span>
		</li>
		
		
		<li>
			<span><?php echo($_SESSION["errorMessage"]);?></span>
		</li>
		<li>
			<input type="submit" value="Update Info" name="submit" id="submit"/>
		
		</li>
	</ul>
	</fieldset>
</form>
	<?php
	//clear the error
	$_SESSION["errorMessage"] = "";
	?>
	
	<script type="text/javascript">
		document.getElementById("title").focus();
	</script>
	
</body>
</html>