<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Date Functions</title>
</head>

<body>
<?php
echo date_default_timezone_get();

echo "<br><br>";
echo "Today's Date : ".date("U")." ==> ".date("d/m/Y h:i:s A D");
?>
<hr />
<form action="<?php echo $PHP_SELF; ?>" method="post">
<table>
<tr>
	<td>DD:</td>
	<td>
		<select name="DD" >
			<?php 
			for($i=1;$i<32;$i++)
			{
				if($i == $_POST['DD'])
				{
					echo "<option selected=\"selected\" value=\"".$i."\">".$i."</option>";
				}
				else if(!isset($_POST['DD']) && $i == (date("d")/1))
				{
					echo "<option selected=\"selected\" value=\"".$i."\">".$i."</option>";
				}
				else
				{
					echo "<option value=\"".$i."\">".$i."</option>";
				}
			}//for($i=1;$i<31;$i++)
			?>
		</select>
	</td>
	<td>MM:</td>
	<td>
		<select name="MM" >
			<?php 
			for($i=1;$i<13;$i++)
			{
				if($i == $_POST['MM'])
				{
					echo "<option selected=\"selected\" value=\"".$i."\">".$i."</option>";
				}
				else if(!isset($_POST['MM']) && $i == (date("m")/1))
				{
					echo "<option selected=\"selected\" value=\"".$i."\">".$i."</option>";
				}
				else
				{
					echo "<option value=\"".$i."\">".$i."</option>";
				}
			}//for($i=1;$i<13;$i++)
			?>
		</select>
	</td>
	<td>YYYY:</td>
	<td>
		<select name="YYYY" >
			<?php 
			for($i=date("Y")+5;$i>1970;$i--)
			{
				if($i == $_POST['YYYY'])
				{
					echo "<option selected=\"selected\" value=\"".$i."\">".$i."</option>";
				}
				else if(!isset($_POST['YYYY']) && $i == (date("Y")/1))
				{
					echo "<option selected=\"selected\" value=\"".$i."\">".$i."</option>";
				}
				else
				{
					echo "<option value=\"".$i."\">".$i."</option>";
				}
			}//for($i=date("Y");$i>1970;$i--)
			?>
		</select>
	</td>
	<td>HH:</td>
	<td>
		<select name="HH" >
			<?php 
			for($i=0;$i<24;$i++)
			{
				if($i == $_POST['HH'])
				{
					echo "<option selected=\"selected\" value=\"".$i."\">".$i."</option>";
				}
				else if(!isset($_POST['HH']) && $i == (date("h")/1))
				{
					echo "<option selected=\"selected\" value=\"".$i."\">".$i."</option>";
				}
				else
				{
					echo "<option value=\"".$i."\">".$i."</option>";
				}
			}//for($i=1;$i<31;$i++)
			?>
		</select>
	</td>
	<td>MN:</td>
	<td>
		<select name="MN" >
			<?php 
			for($i=0;$i<60;$i++)
			{
				if($i == $_POST['MN'])
				{
					echo "<option selected=\"selected\" value=\"".$i."\">".$i."</option>";
				}
				else if(!isset($_POST['MN']) && $i == (date("i")/1))
				{
					echo "<option selected=\"selected\" value=\"".$i."\">".$i."</option>";
				}
				else
				{
					echo "<option value=\"".$i."\">".$i."</option>";
				}
			}//for($i=1;$i<31;$i++)
			?>
		</select>
	</td>
	<td>SS:</td>
	<td>
		<select name="SS" >
			<?php 
			for($i=0;$i<60;$i++)
			{
				if($i == $_POST['SS'])
				{
					echo "<option selected=\"selected\" value=\"".$i."\">".$i."</option>";
				}
				else if(!isset($_POST['SS']) && $i == (date("s")/1))
				{
					echo "<option selected=\"selected\" value=\"".$i."\">".$i."</option>";
				}
				else
				{
					echo "<option value=\"".$i."\">".$i."</option>";
				}
			}//for($i=1;$i<31;$i++)
			?>
		</select>
	</td>
	<td>
	<?php
	if($_POST['DD'] != NULL && $_POST['MM'] != NULL && $_POST['YYYY'] != NULL)
	{
		echo $_POST['DD']."/".$_POST['MM']."/".$_POST['YYYY']." ".$_POST['HH'].":".$_POST['MN'].":".$_POST['SS']." => ".mktime($_POST['HH'],$_POST['MN'],$_POST['SS'],$_POST['MM'],$_POST['DD'],$_POST['YYYY']);	
			
	}//if($_POST['DD'] != NULL && $_POST['MM'] != NULL && $_POST['YYYY'] != NULL)
	?>
	</td>
	<td>
		<input type="submit" value="Submit"  />
	</td>
</tr>
</table>
</form>
<hr />
<form action="<?php echo $PHP_SELF; ?>" method="post">
<table>
<tr>
	<td>Unix TimeStamp :</td>
	<td>
		<input type="text" name="UnixTime" value="<?php echo $_POST['UnixTime']; ?>"  />
	</td>
	<td><input type="submit" value="Submit"  /></td>
	<td>
		<?php
		if(trim($_POST['UnixTime']) != NULL)
		{
			echo $_POST['UnixTime']." => ".date("d/m/Y h:i:s A D",trim($_POST['UnixTime']));
		}//if(trim($UnixTime) != NULL) 
		?>
	</td>
</tr>
</table>
</form>
<hr />
<b>=> Find latitude and longitud of an address :</b><br>
<form action="<?php echo $PHP_SELF; ?>" method="post">
<table>
	<tr>
		<td>Address :</td>
		<td><textarea name="addr" cols="40" rows="4"><?php if(isset($_POST) && isset($_POST[addr])){ echo $_POST[addr]; } ?></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" value="Submit">
		</td>
	</tr>
</table>	
</form>
<?php
if(isset($_POST) && isset($_POST[addr]))
{
	if($_POST[addr]!=NULL)
	{
		// Get lat and long by address         
		$address = preg_replace( "/\r|\n|&/", "", $_POST[addr] ); // Google HQ
		$prepAddr = str_replace(' ','+',$address);
		$geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyB0420uUvJ2Pl-dgghF7rG9N4dx7x691nI');
		$output= json_decode($geocode);
		//var_dump($output);
		//API KEY AIzaSyB0420uUvJ2Pl-dgghF7rG9N4dx7x691nI
		$latitude = $output->results[0]->geometry->location->lat;
		$longitude = $output->results[0]->geometry->location->lng;
		echo "latitude : ".$latitude."<br>";
		echo "longitud : ".$longitude."<br>";
	}
}

?>
<hr>
<?php
//This function prints a text array as an html list.
function alist ($array) {  
  $alist = "<ul>";
  for ($i = 0; $i < sizeof($array); $i++) {
    $alist .= "<li>$array[$i]";
  }
  $alist .= "</ul>";
  return $alist;
}
//Try to get ImageMagick "convert" program version number.
exec("convert -version", $out, $rcode);
//Print the return code: 0 if OK, nonzero if error. 
echo "Version return code is $rcode <br>"; 
//Print the output of "convert -version"    
echo alist($out);

/////get date after some months//////////////////////////////////////////////////////
$date = "2021-01-01"; 
echo $date."<br>";  
// Add days to date and display it
//echo date('Y-m-d', strtotime($date. ' + 10 days')); 
echo date('Y-m-d', strtotime($date. ' +3  month')); 
echo "<br><br>";
echo date('Y-m-d', strtotime($date. ' +12  month'));
echo "<br><br>";


//$your_date = strtotime("2020-01-01");
$your_date= mktime(0,0,0,1,(1+1),2020);
echo $your_date."=".date("d/m/Y",$your_date)."<br>";
$now = mktime(0,0,0,1+12,1,2020);//time(); // or your date as well
echo $now."=".date("d/m/Y",$now)."<br>";
$datediff = $now - $your_date;
echo $datediff."<br>";
echo round($datediff / (60 * 60 * 24));
	
//$effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime($effectiveDate)));
//$effectiveDate = date('Y-m-d', strtotime("+3 month", strtotime($effectiveDate)));
//echo date('Y-m-d')."======".$effectiveDate;
?>
</body>
</html>
