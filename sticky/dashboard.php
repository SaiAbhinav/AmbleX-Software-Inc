<?php session_start(); ?>
<?php include ('header.php'); ?> 
<?php include "../scripts/profile_queries.php"; ?>

<?php
$note = $_POST["note"];
$color = $_POST['color'];
$delete = $_GET['delete'];
$username= $_SESSION['user'];
if($note) 
{
$query = mysqli_query($connection,"INSERT INTO sticky_notes (username, message, color) VALUES ('$username', '$note', '$color')");
}

if($delete) 
{
$success = mysqli_query($connection,"DELETE FROM sticky_notes WHERE id='$delete'");
}
$document_get = mysqli_query($connection,"SELECT * FROM emp_details WHERE username='$username'");
$match_value = mysqli_fetch_array($document_get);
$fullname = $match_value['fullname'];
$location = $match_value['location'];
$gender = $match_value['gender'];
?>
<br/>
 <div style="margin-left:-35%;"> <a href="#addnote" role="button" class="btn" data-toggle="modal">Add Note</a> </div><br/><br/> 
 <div id="containment-wrapper" style="position: absolute; width: 100%; left: 0px; right: 0px; height: 100%;">
  <?php
  $sql = mysqli_query($connection,"SELECT * FROM sticky_notes WHERE username='$username'");

	while ($obj = mysqli_fetch_assoc($sql))
	{ 
	$id = $obj['id'];
	$message = $obj["message"];
	$left = $obj['_left'];
	$top = $obj['_top'];
	$color = $obj['color'];
	
	?>
	
  <div id="draggable-<?php echo $id; ?>" class="draggable note-<?php echo $color; ?>" onchange="javascript:position(this)" style="position:absolute; left: <?php echo $left; ?>px; top: <?php echo $top; ?>px">
	<img class="pin" src="pin.png" alt="pin" />
	<a class="delete" href="?delete=<?php echo $id; ?>" style="float:right"> <img class="delete" src="delete.png" alt="delete" /> </a>
	<textarea id="<?php echo $id; ?>" class="quick" onchange="javascript:getText(this)"><?php echo $message; ?></textarea>
  </div>	
		
<?php } ?>

</div>
	 
 <script>
 
  $(function() {
	 <?php
  $sql = mysqli_query($connection,"SELECT * FROM sticky_notes");

	while ($obj = mysqli_fetch_assoc($sql))
	{ 
	$id = $obj['id'];
	?>
		
    $( "#draggable-<?php echo $id; ?>" ).draggable({ containment: "#containment-wrapper", scroll: false , 

    // Find position where image is dropped.
    stop: function(event, ui) {

    	// Show dropped position.
    	var Stoppos = $(this).position();
		model = {
			id: <?php echo $id; ?>,
            left: Stoppos.left,
			top: Stoppos.top
             };
		 
			 $.ajax({
			  url: "save.php",
			  type: "post",
			  data: model,
			  success: function(data){
				  $('.success_msg').show().fadeIn(2000).fadeOut(4000);
			  },
			  error:function(){
				  alert('error is saving');
			  }   
			}); 
		
		
		
    }
	});
		
	<?php
	}
	?>
	
  });

function getText(text){

	var id = text.id;
	var text = text.value;
	var position = $('#draggable').attr("style");
	model = {
            id: id,
			text: text
             };
	 $.ajax({
      url: "save.php",
      type: "post",
      data: model,
      success: function(data){
		  $('.success_msg').show().fadeIn(2000).fadeOut(4000);
      },
      error:function(){
          alert('error is saving');
      }   
    }); 
}



  </script>

<div id="addnote" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div style="width:94%;padding:10px; text-align:center;">
<center>
<form action="dashboard.php" method="post">
<h3> Write Note </h3>
<textarea name="note" style="width:100%; max-width:100%; height:150px; max-height:150px;"></textarea>
<br/>
<b> Choose Note Color </b>
<br/>
<table style="width:100%;text-align: center;">
<tr>
<td> <input type="radio" name="color" value="1" checked /> </td>
<td> <input type="radio" name="color" value="2" />  </td>
<td> <input type="radio" name="color" value="3" />  </td>
</tr>

<tr>
<td> <div style="width:30px;  height: 30px; background:#FDFB8C; border: 1px solid #DEDC65; margin: 0 auto;width: 30px;">  </div> </td>
<td> <div style="width:30px;  height: 30px; background:#A5F88B; border: 1px solid #98E775; margin: 0 auto;width:3 0px;"> </div> </td>
<td> <div style="width:30px;  height: 30px; background:#A6E3FC; border: 1px solid #75C5E7;margin: 0 auto;width: 30px;"> </div> </td>
</tr>

</table>
<br/>
 <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <input type="submit" class="btn btn-primary" value="Save changes" />
  </div>
  </form>
</center>
</div>
</div>
 
 
 <script>

$('.delete').click(function(){
    return confirm("Are you sure you want to Delete it?");
});
	
	
</script>
	