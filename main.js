$(document).ready(function(){
						
						showdata();
						
						$("#btn0").click(adt);
		//--------------------------update----------------------------------
					$('#update').click(function()
					{   
						var id=$('#saveid').val();
						var todo=$('#todo').val();
						var name=$('#inp0').val();
						
						$.ajax({
							url:"index.php",
							type:"POST",
							async:false,
							
							data:{
								update:1,
								id:id,
								upname:name,
								uptodo:todo
							},
							//error:function(a,b,c){alert(b+c)},
							
							success:function()
							{
								
								$('input[type=text]').val('');
								showdata();
							}
						});
					}
					);
		
		//------------------------delete---------------------------------
					$('body').delegate('.butdel','click',function()
					{  
							var IdDelete=$(this).attr('id');
					
						var test=window.confirm("Do you want to delete");
						
						if(test)
						{
							$.ajax({
								url:"index.php",
								type:"POST",
								async:false,
								data:
								{
								deletes:1,
								id	:IdDelete						
								},
								
								success:function(){
									
									showdata();
								}
							});
						}
					}
					);
					
		//------------------------edit----------------------------------------------
		$('body').delegate('.buted','click',function()
						{		
								var IdEdit=$(this).attr('id');
								
								$.ajax({
									url:"index.php",
									type:"POST",
									datatype:"JSON",
									data:{
										editvalue:1,
										id:IdEdit
									},
									
									success:function(show)
									{  
										
										var result=JSON.parse(show);
										
										$('#saveid').val(result.id);
										$('#inp0').val(result.name);
									
									}
								});
						}
		);

			

				
		//---------------------add-----------------------------
					 function adt()
					 {
						 
						  var listName = $("#inp0").val();
						  
						  $.ajax({
							method:"POST",
							url:"add_task.php",
							data:{listName: listName},							
							dataType:"text",
							
						success: function(data)
							{
							  showdata();
							}
						  });
					 }
					 
						  
					 
			//--------------------showdat-------------------
					 function showdata()
					{
						$.ajax({							
							url:"index.php",
							method:"POST",							
							data:{
								showdat:1
							},				
							
							dataType:"text",
							
							success:function(re)
							{ 
								$('#task1').html(re);
							}
							
						});
						
					};
					
			
					 		
				
				});	 