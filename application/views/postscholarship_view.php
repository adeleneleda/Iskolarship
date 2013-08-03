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
	<div class="row">
		<form id="post-form" action="<?= base_url('postscholarship/postScholarship') ?>" method="post" enctype="multipart/form-data" class="sample-form"
		onsubmit="return validateForm()" name="trueform">
			<textarea ng-model="data.title" placeholder="Title" name="title" class="message"></textarea>
			<br/>
			<table>
				<tr>
					<td> <input id="degree_cb" type="checkbox" name="degree_cb"/>Degree program</td>
					<td> <input id="gender_cb" type="checkbox" name="gender_cb"/>Gender</td>
				</tr>
				<tr>
					<td> <select id="degree_choice" style="display:none" name="degree_choice">
						<option value="BS ComSci">BS ComSci</option>
						<option value="BS Math">BS Math</option> </select>
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
					<td> <select id="year_choice" style="display:none" name="year_choice">
						<option value="1st year">First Year</option>
						<option value="2nd year">Second Year</option>
						<option value="3rd year">Third Year</option>
						<option value="4th year">Fourth Year</option>
						</select>
					</td>
				</tr>
			</table>
			<textarea ng-model="data.description" placeholder="Description" name="description" class="message"></textarea>
			<br/>
			<input id="file" type="file" name="file"/>
			<br/>
			<div><input type="submit" value="Create Scholarshipz!"></div>
		</form>
	</div>
</div>