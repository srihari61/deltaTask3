<html>
	<head>
		<title>My first PHP website</title>
	</head>
	<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['user']; //assigns user value
	?>
	<body>
		<h2>Home Page</h2>
		<p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
		<a href="logout.php">Click here to logout</a><br/><br/>
		<form action="add.php" method="POST">
			Add more appointments: 
			Date:<input type="text" name="dateApp"/><br/>
			Title:<input type="text" name="titleApp"/><br/>
			Data:<input type="text" name="data"/><br/>
		    Start Time:<input type="text" name="startTimeApp"/><br/>
			End Time:<input type="text" name="endTimeApp"/><br/>

			<input type="submit" value="Add to appointments"/>
		</form>
		<h2 align="center">My list</h2>
		<table border="1px" width="100%"></table><?php
		/*$findMonth=date('F', strtotime($date));
		$findYear=date('Y',strtotime($))  */



		?>

			<tr>
				<th>Date</th>
				<th>Title</th>
				<th>Description</th>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Delete</th>
				
			</tr>
		</table>
		<?php
				GLOBAL $username=mysqli_real_escape_string($_POST['username']);
				mysqli_connect("localhost", "root","") or die(mysqli_error()); //Connect to server
				mysql_select_db("deltaTask2") or die("Cannot connect to database"); //connect to database
				$query = mysql_query("Select * from '.$username.'"); // SQL Query
				GLOBAL $date = strftime("%x");
				GLOBAL $month = strftime("%m");
				GLOBAL $year= strftime("%Y");
				GLOBAL $count=0;
				while($row = mysql_fetch_array($query))
				{
					$count++;
				}
				if($count==0)
				{

				}
				elseif($date==1)	
				{
                    GLOBAL $var;
                    if($month%2!=0)
                    {
                    	for($var=1;$var<=31;$var++)
                    	{
                    		$queryD = mysql_query("FROM '.$username.' INSERT INTO ('dispDate') VALUES ('.$year-$month-$var.')");
                    	}	
                    		while($row = mysql_fetch_array($queryD))	
				            {
					
					           Print "<tr>";
						       Print '<td align="center">'. $row['dispDate'] . "</td>";
						       Print '<td align="center">'. $row['title'] . "</td>";
						       Print '<td align="center">'. $row['description']."</td>";
						       Print '<td align="center">'. $row['startTime']."</td>";
						       Print '<td align="center">'. $row['endTime']."</td>";
						       Print '<td align="center"><a href="edit.php?id='. $row['dispDate'] .'">edit</a> </td>';
						       Print '<td align="center"><a href="#" onclick="myFunction('.$row['dispDate'].')">delete</a> </td>';
						       Print "<tr>";
                    	     }
                    }

                    elseif (($month%2==0)&&($month!=2)) 
                    {
                    		for($var=1;$var<=30;$var++)
                    		{
                    		    $queryD1 = mysql_query("FROM '.$username.' INSERT INTO ('dispDate') VALUES ('.$year-$month-$var.')");
                    		}
                    		    while($row = mysql_fetch_array($query))	
				                {
					
					               Print "<tr>";
						           Print '<td align="center">'. $row['dispDate'] . "</td>";
						           Print '<td align="center">'. $row['title'] . "</td>";
						           Print '<td align="center">'. $row['description']."</td>";
						           Print '<td align="center">'. $row['startTime']."</td>";
						           Print '<td align="center">'. $row['endTime']."</td>";
						           Print '<td align="center"><a href="edit.php?id='. $row['dispDate'] .'">edit</a> </td>';
						           Print '<td align="center"><a href="#" onclick="myFunction('.$row['dispDate'].')">delete</a> </td>';
						           Print "<tr>";
                    	    }
                    }	
                    elseif (($month%2==0)&&($month==2)) 
                    {
                    		if($year%400==0)
                    		{
                    			for($var=1;$var<=29;$var++)
                    			{
                    		    $queryD2 = mysql_query("FROM '.$username.' INSERT INTO ('dispDate') VALUES ('.$year-$month-$var.')");
                    		    }
                    		    while($row = mysql_fetch_array($queryD2))	
				                 {
					
					               Print "<tr>";
						           Print '<td align="center">'. $row['dispDate'] . "</td>";
						           Print '<td align="center">'. $row['title'] . "</td>";
						           Print '<td align="center">'. $row['description']."</td>";
						           Print '<td align="center">'. $row['startTime']."</td>";
						           Print '<td align="center">'. $row['endTime']."</td>";
						           Print '<td align="center"><a href="edit.php?id='. $row['dispDate'] .'">edit</a> </td>';
						           Print '<td align="center"><a href="#" onclick="myFunction('.$row['dispDate'].')">delete</a> </td>';
						           Print "<tr>";
                    	         }
                    	        

                    		}
                    		else
                    		{
                    			for($var=1;$var<=28;$var++)
                    			{
                    		    $queryD3 = mysql_query("FROM '.$username.' INSERT INTO ('dispDate') VALUES ('.$year-$month-$var.')");
                    		    }
                    		    while($row = mysql_fetch_array($queryD3))	
				                 {
					
					               Print "<tr>";
						           Print '<td align="center">'. $row['dispDate'] . "</td>";
						           Print '<td align="center">'. $row['title'] . "</td>";
						           Print '<td align="center">'. $row['description']."</td>";
						           Print '<td align="center">'. $row['startTime']."</td>";
						           Print '<td align="center">'. $row['endTime']."</td>";
						           Print '<td align="center"><a href="edit.php?id='. $row['dispDate'] .'">edit</a> </td>';
						           Print '<td align="center"><a href="#" onclick="myFunction('.$row['dispDate'].')">delete</a> </td>';
						           Print "<tr>";
                    	         }
                    	        

                    		}
                    }	
				}
				while($row = mysql_fetch_array($query))	
				{
					
					Print "<tr>";
						Print '<td align="center">'. $row['dispDate'] . "</td>";
						Print '<td align="center">'. $row['title'] . "</td>";
						Print '<td align="center">'. $row['description']."</td>";
						Print '<td align="center">'. $row['startTime']."</td>";
						Print '<td align="center">'. $row['endTime']."</td>";
						Print '<td align="center"><a href="edit.php?id='. $row['dispDate'] .'">edit</a> </td>';
						Print '<td align="center"><a href="#" onclick="myFunction('.$row['dispDate'].')">delete</a> </td>';
						
					Print "</tr>";
				}
			?>
		</table>
		<script>
			function myFunction(dispDate)
			{
			var r=confirm("Are you sure you want to delete this record?");
			if (r==true)
			  {
			  	window.location.assign("delete.php?dispDate=" + dispDate);
			  }
			}
		</script>
	</body>
</html>
	