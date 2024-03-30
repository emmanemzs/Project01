<?php
	session_start();
	include("includes/OpenDbCOnn.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project 1 - SELECT</title>
	<style>
    /* Add borders between cells */
    td {
        border: 1px solid #000000; /* Add a solid black border around each cell */
        padding: 5px; /* Add padding to cells for better spacing */

</style>
</head>

<body>
	<h1 style="text-align: center;">Project 1 - SELECT</h1>
	<?php
	include("includes/menu.php");
	
	// form the sql query
	$sql = "SELECT BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover FROM P1Books ORDER BY BookID ASC";
	
	$result = mysqli_query($db,$sql);
	
	if(empty($result))
	{
		// no results, set a variable to 0
		$num_results = 0;
	}
	else{
		// there were results, how many rows were there?
		$num_results = mysqli_num_rows($result);
	}
	
	?>
	
	
	<table style="border: 0px; width: 900px; padding: 0px; margin: 0px auto; border-spacing: 0px;font-family: 'Lato', sans-serif;" title="Listing of Books">
		<thead>
			<tr> 
				<th colspan="8" style="font-weight: bold; background-color: #add8e6;text-align: center;text-decoration: underline;">
					P1Books Table
				</th>
			</tr>
			<tr>
				<th style="font-weight: bold; background-color: #add8e6">BookID</th>
				<th style="font-weight: bold; background-color: #add8e6">Title</th>
				<th style="font-weight: bold; background-color: #add8e6">Author</th>
				<th style="font-weight: bold; background-color: #add8e6">Topic</th>
				<th style="font-weight: bold; background-color: #add8e6">Genre</th>
				<th style="font-weight: bold; background-color: #add8e6">ISBN</th>
				<th style="font-weight: bold; background-color: #add8e6">DatePublished</th>
				<th style="font-weight: bold; background-color: #add8e6">Hardcover</th>
			
			</tr>
		
		</thead>
		<tfoot>
			<tr>
				<td colspan="8" style="text-align: center; font-style: italic;">
					Information pulled from the P1Books table
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
			// loop through results, remember $num_results tells us how many rows there are
			for ($i=0; $i <$num_results; $i++)
			{
				//store a single record/ row into the variable $row
				$row = mysqli_fetch_array($result);
			?>
			<tr>
				<td style="border-right: 1px solid #00000;"><?php echo( trim( $row["BookID"] ) ) ?></td>
				<td style="border-right: 1px solid #00000;"><?php echo( trim( $row["Title"] ) ) ?></td>
				<td style="border-right: 1px solid #00000;"><?php echo( trim( $row["Author"] ) ) ?></td>
				<td style="border-right: 1px solid #00000;"><?php echo( trim( $row["Topic"] ) ) ?></td>
				<td style="border-right: 1px solid #00000;"><?php echo( trim( $row["Genre"] ) ) ?></td>
				<td style="border-right: 1px solid #00000;"><?php echo( trim( $row["ISBN"] ) ) ?></td>
				<td style="border-right: 1px solid #00000;"><?php echo( trim( $row["DatePublished"] ) ) ?></td>
				<td style="border-right: 1px solid #00000;"><?php echo( trim( $row["Hardcover"] ) ) ?></td>
			</tr>
			
			<?php
			} // end of for loop
		?>
		</tbody>
	</table>
	
	

	<?php
	include("includes/closeDbConn.php");
	?>
	
</body>
</html>