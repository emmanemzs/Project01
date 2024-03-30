<?php
session_start();
//error message
if(empty($_SESSION["errorMessage"]))
{
	$_SESSION['errorMessage'] = "";
}

?>


<!doctype html>
<html>
<head>
	<meta charset="uts-8">
	<title>Project 1 - INSERT</title>
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
	<h1 style="text-align: center;">Project 1 - INSERT</h1>
	<?php
	include("includes/menu.php");
	?>
	<form id="form0" name="form0" method="post" action="doInsert.php">
	<fieldset>
	<legend> Insert into the P1Book table</legend>
	<ul>
		<li>
			<label title="BookID" for="bookID">Book ID</label>
			<input name="bookID" id="bookID" type="text" size="20" maxlength="3" />
		</li>
		<li>
			<label title="Title" for="title">Title</label>
			<input name="title" id="title" type="text" size="20" maxlength="50" />
		</li>
		<li>
			<label title="Author" for="author">Author</label>
			<input name="author" id="author" type="text" size="20" maxlength="50" />
		</li>
		
		<li>
			<label title="Topic" for="topic">Topic</label>
			<select name="topic" id="topic">
                <option value="- Topic -">- Topic -</option>
                <option value="Adventure">Adventure</option>
				<option value="Art">Art</option>
				<option value="Astronomy">Astronomy</option>
				<option value="Culture">Culture</option>
				<option value="Cuisine">Cuisine</option>
				<option value="Dreams">Dreams</option>
				<option value="Exploration">Exploration</option>
				<option value="History">History</option>
				<option value="Nature">Nature</option>
				<option value="Philosophy">Philosophy</option>
				<option value="Psychology">Psychology</option>
				<option value="Self-help">Self-help</option>
				<option value="Technology">Technology</option>
				<option value="Thriller">Thriller</option>
				<option value="Travel">Travel</option>

                
       		</select>
		</li>
		<li>
			<label title="Genre" for="genre">Genre</label>
			<span id="radios" style="float:right;">
				<input name="genre" id="genre" type="radio" value="Fiction"/>Fiction
				<input name="genre" id="genre" type="radio" value="Non-Fiction"/>Non-Fiction
				<input name="genre" id="genre" type="radio" value="Romance"/>Romance
				<input name="genre" id="genre" type="radio" value="Mystery"/>Mystery
				<input name="genre" id="genre" type="radio" value="Fantasy"/>Fantasy
			</span>
			
		</li>
		<li>
			<label title="ISBN" for="isbn">ISBN</label>
			<input name="isbn" id="isbn" type="text" size="20" maxlength="50" />
		</li>

		<li>
			<label title="PubMonth" for="pubMonth">Month Published</label>
			<select name="pubMonth" id="pubMonth">
                <option value="- Month -">- Month -</option>
                <option value="Jan">Jan</option>
				<option value="Feb">Feb</option>
				<option value="Mar">Mar</option>
				<option value="Apr">Apr</option>
				<option value="May">May</option>
				<option value="Jun">Jun</option>
				<option value="Jul">Jul</option>
				<option value="Aug">Aug</option>
				<option value="Sep">Sep</option>
				<option value="Oct">Oct</option>
				<option value="Nov">Nov</option>
				<option value="Dec">Dec</option>
                
       		 </select>
		</li>
		
		<li>
			<label title="PubYear" for="pubYear">Year Published</label>
			<select name="pubYear" id="pubYear">
                <option value="- Year -">- Year -</option>
                <option value="2023">2023</option>
				<option value="2022">2022</option>
                <option value="2021">2021</option>
				<option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
                <option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
                <option value="1989">1989</option>
                <option value="1988">1988</option>
                <option value="1987">1987</option>
                <option value="1986">1986</option>
                <option value="1985">1985</option>
                <option value="1984">1984</option>
                <option value="1983">1983</option>
                <option value="1982">1982</option>
                <option value="1981">1981</option>
                <option value="1980">1980</option>
                <option value="1979">1979</option>
                <option value="1978">1978</option>
                <option value="1977">1977</option>
                <option value="1976">1976</option>
                <option value="1975">1975</option>
                <option value="1974">1974</option>
                <option value="1973">1973</option>
                <option value="1972">1972</option>
                <option value="1971">1971</option>
                <option value="1970">1970</option>
                <option value="1969">1969</option>
                <option value="1968">1968</option>
                <option value="1967">1967</option>
                <option value="1966">1966</option>
                <option value="1965">1965</option>
                <option value="1964">1964</option>
                <option value="1963">1963</option>
                <option value="1962">1962</option>
                <option value="1961">1961</option>
                <option value="1960">1960</option>
       		 </select>
		</li>
		<li>
			<label title="HardCover" for="hardCover">Hard Cover</label>
			<span id="checkboxes" style="float:right;">
				<input name="hardCover" id="hardCover" type="checkbox" value="Yes"/>
			</span>
		</li>
		<li>
			<span><?php echo($_SESSION["errorMessage"]);?></span>
		</li>
		<li>
			<input type="submit" value="Insert Info" name="submit" id="submit"/>
		
		</li>
	</ul>
	</fieldset>
</form>
	<?php
	//clear the error
	$_SESSION["errorMessage"] = "";
	?>
	
	<script type="text/javascript">
		document.getElementById("BookID").focus();
	</script>
	
</body>
</html>