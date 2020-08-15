
<?php 

function getDB(...$num)
{
include 'dbcon.php';
	switch (count($num)) 
	{
	    case 1: $q="select * from $num[0]";
	            return $res=mysqli_query($con, $q);
	        break;
	    case 3: $q="select * from $num[0] where $num[1]='$num[2]'";
	            return $res=mysqli_query($con, $q);
	        break;
	    case 5: $q="select * from $num[0] where $num[1]='$num[2]' && $num[3]='$num[4]'";
	            return $res=mysqli_query($con, $q);
	        break;

	    case 7: $q="select * from $num[0] where $num[1]='$num[2]' && $num[3]='$num[4]' && $num[5]='$num[6]'";
	            return $res=mysqli_query($con, $q);
	        break;
	}     
}




function insertDB(...$arr)
{
include 'dbcon.php';
	switch (count($arr)) 
	{
		case 5: $qy="insert into $arr[0]($arr[1], $arr[2]) values('$arr[3]' ,'$arr[4]')";
	    		return $res=mysqli_query($con, $qy);
	        break;

	    case 7: $qy="insert into $arr[0]($arr[1], $arr[2], $arr[3]) values('$arr[4]' ,'$arr[5]' , '$arr[6]')";
	    		return $res=mysqli_query($con, $qy);
	        break;

	    case 9: $qy="insert into $arr[0]($arr[1], $arr[2], $arr[3], $arr[4]) values('$arr[5]' ,'$arr[6]' , '$arr[7]', '$arr[8]')";
	    		return $res=mysqli_query($con, $qy);
	        break;
	        
	    case 11: $qy="insert into $arr[0]($arr[1], $arr[2], $arr[3], $arr[4], $arr[5]) values('$arr[6]' ,'$arr[7]' , '$arr[8]', '$arr[9]', '$arr[10]')";
	    		return $res=mysqli_query($con, $qy);
	        break;

	    case 13: $qy="insert into $arr[0]($arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6]) values('$arr[7]' , '$arr[8]', '$arr[9]', '$arr[10]', '$arr[11]', '$arr[12]')";
	    		 
	    		 return $res=mysqli_query($con, $qy);
	        break;
	}    
}







function updateDB(...$arr)
{
include 'dbcon.php';
	switch (count($arr)) 
	{


		case 5: $qy="update $arr[0] set $arr[1]='$arr[2]' where $arr[3]='$arr[4]'";
	    		 
	    		 return $res=mysqli_query($con, $qy);
	        break;
	   
	    case 15: $qy="update $arr[0] set $arr[1]='$arr[2]', $arr[3]='$arr[4]', $arr[5]='$arr[6]', $arr[7]='$arr[8]', $arr[9]='$arr[10]', $arr[11]='$arr[12]' where $arr[13]='$arr[14]'";
	    		 
	    		 return $res=mysqli_query($con, $qy);
	        break;
	}    
}




function deleteDB(...$arr)
{
include 'dbcon.php';
	switch (count($arr)) 
	{
	    case 3: $qy=" DELETE FROM $arr[0] WHERE $arr[1] = '$arr[2]'";
	    		return $res=mysqli_query($con, $qy); 
	        break;
	    case 5: $qy=" DELETE FROM $arr[0] WHERE $arr[1] = '$arr[2]' && $arr[3] = '$arr[4]'";
	    		return $res=mysqli_query($con, $qy); 
	        break;
	    
	}
    
}


?>

