<div class="modal fade" id="viewBranches" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Pick Patient</h4>
      </div>
      <div class="modal-body">
	      	<div class="form-group">
				<?php echo Form::input('search','',
					array('class' => 'col-md-4 form-control', 'placeholder'=>'Search...' ,'onkeyup'=>'myFunction()', 'id'=>'myInput'));
			    ?>

			</div>
	       <?php 
	       		$branches = Model_Maternity::find_all();
	       		if ($branches): 
	       	?>
			<table class="table table-striped" id="myTable">
				<thead>
					<tr>
						
						<th>First Name</th>
						<th>Surname</th>
						<th>Phone Number</th>
						<th>National id</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($branches as $item): ?>		
						<tr>
							<td><?php echo $item->first_name; ?></td>
							<td><?php echo $item->surname; ?></td>
							<td><?php echo $item->phone_number; ?></td>
							<td><?php echo $item->national_id; ?></td>
							<td>
							<div class="btn-toolbar">
								<div class="btn-group">
								<button type="button" class="btn btn-info btn-small" onclick="pickBranch('<?php echo $item->first_name; ?>', '<?php echo $item->surname; ?>','<?php echo $item->phone_number; ?>','<?php echo $item->national_id; ?>','<?php echo $item->user_id; ?>')"> Pick
									</button>
								</div>
								</div>

							</td>
						</tr>
				<?php endforeach; ?>	
			</tbody>
			</table>

		<?php else: ?>
		<p>No Patients Recorded.</p>

		<?php endif; ?>
      </div>
            
    </div>
  </div>
</div>
<script>
	function pickBranch(first_name,surname,phone_no,id_no,userid)
	{
		document.getElementById('patient').value=userid;
		document.getElementById('patient_code').value=first_name;
		document.getElementById('surname').value=surname;
		document.getElementById('phone_no').value=phone_no;
		document.getElementById('id_no').value=id_no;
	
		
		$('#viewBranches').modal('hide');
		
	}
	
	function myFunction() 
	{
	  // Declare variables 
	  var input, filter, table, tr, td, td1, td2,td3, i;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    td1 = tr[i].getElementsByTagName("td")[1];
	    td2 = tr[i].getElementsByTagName("td")[2];
	    td3 = tr[i].getElementsByTagName("td")[3];
	    if (td||td1||td2||td3) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1||td1.innerHTML.toUpperCase().indexOf(filter) > -1||td2.innerHTML.toUpperCase().indexOf(filter) > -1||td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	  }
	}
</script>
	
	

