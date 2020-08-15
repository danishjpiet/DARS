<?php 

include_once 'dbcon.php';
include_once 'db_function.php';

	if(isset($_POST['id']))
	{

	
		$id=$_POST['id'];
	$cat="";
	$result=getDB("category", "id", $id);
	$num1=mysqli_num_rows($result);
	if($num1>0){

		$row=mysqli_fetch_array($result);
		$cat=$row['video_category'];
	}

	$res=getDB("cat_video", "video_category", $cat);
	$num=mysqli_num_rows($res);
	if($num>0)
	{
		?>
			<thead>
				      <tr>
				        <th ><?php echo $cat;?></th>
				        <th>SR NO.</th>
				        <th></th>
				        <th></th>
				        <th></th>
				        <th></th>
				        <th></th>
				      </tr>
				    </thead>
				    <tbody >

				    
		<?php
		$count=1;
		while ($data=mysqli_fetch_array($res)) {
			?>
			<tr>
				<td></td>
				<td><?php echo $count; ?></td>
				<td><?php echo $data['title']; ?></td>
				<td><a href="<?php echo $data['url']; ?>"> <?php echo $data['url']; ?> </a></td>
				<td>
					
					<button class="btn btn-success" name="<?php echo $data['id'];?>"  onclick="moveToUncat(<?php echo $data['id'];?>)">Move in non category</button>
					

				</td>

				<td><button class="btn btn-success" onclick=editData()>edit</button></td>
				<td><button class="btn btn-success" onclick=deleteData(<?php echo $data['id']; ?>)>delete</button></td>
			</tr>

			<?php
			$count++;
		}

		?>
		</tbody>
		<?php
	}
	



	}//main if close
	

?>



<script type="text/javascript">
	
function moveToUncat(id) {
   
    alert(id);

    if(!id=='')
    {

    	 $.ajax({

			url:"move_video_uncat.php",
			type:"post",
			data:{id:id},
			success : function(data){
				displayUnCatData();
				displayCatData(this.id);
			}
		});


    }
        

   }



function displayCatData(id){

$.ajax({

			url:"cat_display.php",
			type:"post",
			data:{id:id},
			success : function(data){
				$("#tabledata2").html(data);
			}
		});

}




   function displayUnCatData(){

$.ajax({

			url:"uncat_display.php",
			type:"post",
			success : function(data){
				$("#tabledata1").html(data);
			}
		});

}



function deleteData(id) {

    	 $.ajax({
			url:"delete_cat.php",
			type:"post",
			data:{id:id},
			success:function(data){
				displayUnCatData();
				displayCatData(this.id);

			}
		});
   }


</script>