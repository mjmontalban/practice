<?php
	
	$usertype = $_SESSION["usertype"];

	if($usertype == 0){
		$usertype = 'USER';
	}else{
		$usertype = 'ANIMALS';
	}
?>
	<!-- // echo "Welcome to ANIMALS ".'<h3>'. $_SESSION["name"].'</h3>'." You are a ".$usertype; -->

	<!DOCTYPE html>
<html>
<head>
	<title>Try</title>
	<script type="text/javascript" src="<?php echo base_url('assets/bs/jquery-3.min.js');?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bs/css/bootstrap.min.css');?>">
	<script type="text/javascript" src="<?php echo base_url('assets/bs/js/bootstrap.min.js');?>"></script>
</head>
<body>
	<center><h4> WELCOME TO <?php echo $usertype;?></h4></center>
	<div class="container">
		<div class="row">
			<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Password</th>
							<th>Edit</th>
							<th>Delete</th>
						</thead>
						<tbody id="showAnimals">
						</tbody>
					</table>
			</div>		
		</div>			
	</div>
<div class="modal" tabindex="-1" role="dialog" id="modalEdit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modify</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mbody">
      	 <label>Name</label>
         <input type="text" name="name" id="name" class="form-control">
         <label>Email</label>
         <input type="text" name="name" id="email" class="form-control">
         <label>Password</label>
         <input type="text" name="name" id="pass" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="save">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		var myId;
		function loadData(){
			$.ajax({
				url:'<?php echo base_url('Mj/showData')?>',
				dataType:'json',
				success:function(data){
					var tableContent ='';
					var x;
					for(x in data){
						tableContent +='<tr>';
						tableContent+='<td>'+data[x].id+'</td><td>'+data[x].name+'</td><td>'+data[x].email+'</td><td>'+data[x].pass+'</td><td><a href="#" class="btn btn-success" id="edit" data="'+data[x].id+'">Edit</a></td><td><a href="#" class="btn btn-warning" id="delete" data="'+data[x].id+'">Delete</a></td>';
						tableContent +='</tr>';
					}
					tableContent +='</tr>';
					document.getElementById("showAnimals").innerHTML = tableContent;
				}
			});
		}

		$(document).on('click','#edit',function(){
			var id = $(this).attr("data");
			$.ajax({
				url:'<?php echo base_url('Mj/showEdit')?>',
				method:'POST',
				data:{id:id},
				dataType:'json',
				success:function(response){
					$('#name').val(response[0].name);
					$('#email').val(response[0].email);
					$('#pass').val(response[0].pass);
					$('#modalEdit').modal('show');
					myId = response[0].id;
				}
			});
		});
		$(document).on('click','#save',function(){
			var name = $('#name').val();
			var email = $('#email').val();
			var pass = $('#pass').val();
			$.ajax({
				url:'<?php echo base_url('Mj/EditData')?>',
				data:{id:myId,name:name,email:email,pass:pass},
				method:'POST',
				success:function(response){
					loadData();
					$('#modalEdit').modal('hide');
				}
			});
		});

		$(document).on('click','#delete',function(){
			var id = $(this).attr("data");
			$.ajax({
				url:'<?php echo base_url('Mj/deleteData')?>',
				method:'POST',
				data:{id:id},
				success:function(response){
					loadData();
				}
			});
		});
		loadData();
	});
</script>
</html>