<script>

function validateForm() {
	var x = document.forms["trueform"];
	var z;
	
	if (document.getElementById("income_cb").checked) {
		z = parseInt(x["max_income"].value, 10);
		if (z <= 0 || isNaN(z)) {
			alert("Please verify the max income");
			return false;
		}
		else {
			//alert(z);
			document.getElementById("income_input").value = z;
		}
	}
	
	if (document.getElementById("file").value == "") {
		alert("Please select an input file");
		return false;
	}
	
	var f = document.getElementById("file");
	var filename = f.value;
	var ext = filename.substring(filename.lastIndexOf('.') + 1);
	ext = ext.toLowerCase();
	
	if(ext == "pdf") {
		return true;
	}
	else {
		alert("Please upload a pdf file.");
		return false;
	}
}

$(document).ready(function() { 
	$('#degree_cb').change(function() {
	  return $('#degree_choice').toggle();
	});
	$('#gender_cb').change(function() {
	  return $('.gc').toggle();
	});
	$('#year_cb').change(function() {
	  return $('#year_choice').toggle();
	});
	$('#income_cb').change(function() {
	  return $('#income_choice').toggle();
	});
}); 


</script>

<div>
	<div class="row-fluid">
		<div class="row">
			<div class="span12 well">
				<h3> Create Scholarship </h3>
				<form id="post-form" action="<?= base_url('postscholarship/postScholarship') ?>" method="post" enctype="multipart/form-data" class="sample-form"
				onsubmit="return validateForm()" name="trueform">
					<label> Scholarship Name </label>
					<input type="text" name="title" />
					<br/>
					<table>
						<tr>
							<td> <input id="degree_cb" type="checkbox" name="degree_cb"/>Degree program</td>
							<td> <input id="gender_cb" type="checkbox" name="gender_cb"/>Gender</td>
						</tr>
						<tr>
							<td> <select id="degree_choice" style="display:none" name="degree_choice">
								<?php 
									$ctr = 0;
									while(!empty($programs[$ctr]))
									{
								?>
									<option value=<?php echo $programs[$ctr]['programid']; ?>>
										<?php echo $programs[$ctr]['name']; ?>
									</option>
								<?php
									$ctr++;
									}
								?>
								</select>
							</td>
							<td> <label for="gender_choice_M" style="display:none" class="gc">Male</label> 
								<input id="gender_choice_M" type="radio" name="gender_choice" value="M" style="display:none" checked="checked" class="gc"/>
								<br/>
								<label for="gender_choice_F" style="display:none" class="gc">Female</label>
								<input id="gender_choice_F" type="radio" name="gender_choice" value="F" style="display:none" class="gc"/>
							</td>
						</tr>
						<tr>
							<td> <input id="income_cb" type="checkbox" name="income_cb"/>Family income</td>
							<td> <input id="year_cb" type="checkbox" name="year_cb"/>Year level</td>
						</tr>
						<tr>
							<td id="income_choice" style="display:none">Less than<input id="income_input" type="text" placeholder="Max amount in Pesos" name="max_income"/> </td>
							<td><select id="year_choice" style="display:none" name="year_choice">
								<?php 
									$ctr = 0;
									while(!empty($yearlevels[$ctr]))
									{
								?>
									<option value=<?php echo $yearlevels[$ctr]['yearlevelid']; ?>>
										<?php echo $yearlevels[$ctr]['description']; ?>
									</option>
								<?php
									$ctr++;
									}
								?>
								</select>
							</td>
						</tr>
					</table>
					<label> Description </label>
					<textarea placeholder="Description" name="description" type="text"></textarea>
					<br/>
					<input id="file" type="file" name="file"/>
					<br/>
					<div><input type="submit" value="Create Scholarshipz!"></div>
				</form>
			</div>
		</div>
	</div>
</div>