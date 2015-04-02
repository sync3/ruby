<?php
				
						
				$mysqli=new mysqli('localhost','root','','taskmanager');
				if (mysqli_connect_errno()){
					printf("Connect to server isn't possible.mistake code: %s\n",mysqli_connect_error());
					exit;
				}			
				
	//---------------------showdata------------------------------------------------------						
				
				if (isset($_POST['showdat']))
		
				if ($result=$mysqli->query('SELECT*FROM task')){				
				
					while($row=$result->fetch_assoc())
			
						{
				
						echo '
																
							<div id="task1">
								<div id="showdata">
								
							'.$row["name"].'
								
								<input type="hidden"  value="'.$row['id'].'"  class="idd"/>
								
							<input type="button"  id="'.$row['id'].'" value="Del" class="butdel">	
							<input type="button" id="'.$row['id'].'" value="Edi" class="buted">	
								<input type="hidden"  value=""  id="saveid"/>	
							</div>
							
							
							</div>';			
										
						}	
				$result->close();
				exit();	
						}	

	//------------------------addtodo----------------------------------		
				if(isset($_POST['add']))
							{   
								$todoName = $_POST["todoName"];
						
								if($result=$mysqli->query("INSERT INTO task ( todo) VALUES ('$todoName')"));
								
								if ($result)
								{
									echo "success";
								}
								
							exit();
							}						
			
	//-----------------------delete---------------------------------
				if(isset($_POST['deletes']))
				{   
					
			
					if($result=$mysqli->query("DELETE FROM task WHERE id='{$_POST['id']}'"));
					
					if ($result)
					{
						echo "success";
					}
					
				exit();
				}	
				
	//----------------------edit------------------------------------
				if(isset($_POST['editvalue']))
				{ 
					$result=$mysqli->query("SELECT*FROM task WHERE id='{$_POST['id']}'");
				
					$rows=$result->fetch_assoc();
						
						echo json_encode($rows);
						
						exit();
				}
				
	//------------------------update-----------------------------------
				if(isset($_POST['update']))
				{
					$result=$mysqli->query("UPDATE `task` SET
					`todo`='{$_POST['uptodo']}',
					`name`='{$_POST['upname']}'
					WHERE `id`='{$_POST['id']}'");
					
					if($result)
					{
						echo "Success update";
					}
				
					exit();
				}
				
	?>		
<html>
	<head>
		<meta charset='utf-8'>
		<title>	TODO LIST</title>
		<link rel="stylesheet" href="main.css"></link>
		
		<script src="jquery.js"></script>
		
	</head>

	
	<body>
	
			<div class="big">
					<h2 align="center">SIMPLE TODO LIST</h2>
					<h3 align="center">FROM RUBY GARAGE</h3>
		

				<div id="todo">
				
						<div class="addto">
							TODO
							<input type="text" id="inp3" value="">
							<input type="button"  value="Add TODO" id="addt">	
							<input type="button"  value="Edit" id="edto">	
							<input type="button"  value="Del" id="delto">
						</div>
				
				</div>
				
				<div id="input-tnask">
				
						<div class="add">
							<input type="text" id="inp0" value="">
							<input type="button"  value="Add task" id="btn0">	
							<input type="button"  value="Update" id="update">	
						</div>
				
				</div>
				
				
				<div id="task1">
						<div id="showdata">
									
							<input type="hidden"  value="'.$row['id'].'"  class="idd"/>
									
							<input type="button"  value="Del" class="butdel">
							<input type="button" id="'.$row['id'].'" value="Edi" class="buted">	
							<input type="hidden"  value=""  id="saveid"/>
						</div>
								
				</div>						
							
			</div>				
		
		<script src="main.js"></script>	
		
	</body>
</html>