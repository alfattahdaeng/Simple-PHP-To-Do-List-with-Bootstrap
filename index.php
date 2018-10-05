<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Backend Test || Mau ngapain? </title>
		<link rel="icon" type="image/png" href="icon.png">
	</head>
<body>
	<div class="container">
	<div class="col-md-12 well">
		<h3 class="text-primary" align="center">Mau ngapain?</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		
		<form method="POST" class="form-inline" action="includes/add_task.php">
					<input type="text" class="form-control" placeholder="mau ngapain nanti?" autocomplete="off" required name="task"/>
				
				</form>
		<br />
		
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Task</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require 'includes/connect.php';
					$query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
					$count = 1;
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $count++?></td>
					<td><?php echo $fetch['task']?></td>
					<td><?php echo $fetch['status']?></td>
					<td colspan="2">
						<center>
							<?php
								if($fetch['status'] != "Done"){
									echo 
									'<a href="includes/update_task.php?task_id='.$fetch['task_id'].'" class="btn btn-success">Selesai</a> |';
								}
							?>
							 <a href="includes/delete_task.php?task_id=<?php echo $fetch['task_id']?>" class="btn btn-danger">Hapus</a>
						</center>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		</div>
	</div>
</body>
</html>