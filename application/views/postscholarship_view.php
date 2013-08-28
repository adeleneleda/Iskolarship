<?
// CONSTANTS
$MAX_FIELDS = 5;
$MAX_YEARFIELDS = 4;
?>
<script>

function validateForm() {
	var x = document.forms["trueform"];
	var z;
	
	//check for title
	if (!x["title"].value) {
		alert("Please put a title");
		return false;
	}
	
	////check for valid deadline -- hintayin mo na lang si Chan
	if (!x["deadline"].value) {
		alert("Please put a deadline");
		return false;
	}

	//check for positive integer slots
	if (x["slots"].value) {
		z = parseInt(x["slots"].value,10);
		if (z <= 0 || isNaN(z)) {
			alert("Please verify the number of available slots");
			return false;
		}
		else {
			document.getElementById("slots").value = z;
		}
	}
	
	//check for income
	// if (document.getElementById("income_cb").checked) {
		// z = parseInt(x["max_income"].value, 10);
		// if (z <= 0 || isNaN(z)) {
			// alert("Please verify the max income");
			// return false;
		// }
		// else {
			// //alert(z);
			// document.getElementById("income_input").value = z;
		// }
	// }
	
	//check for file
	if (document.getElementById("file").value == "") {
		alert("Please select an input file");
		return false;
	}
	
	//check for pdf
	var f = document.getElementById("file");
	var filename = f.value;
	var ext = filename.substring(filename.lastIndexOf('.') + 1);
	ext = ext.toLowerCase();
	
	if(ext != "pdf") {
		alert("Please upload a pdf file.");
		return false;
	}
	
	return true;
}

$(document).ready(function() { 
	$('#degree_cb').change(function() {
		if($(this).is(':checked')) {
			$('#degree_add-1').show();
			$('#degree_choice1').show();   
		} else {
			$('#degree_add-1').hide();
			$('#degree_choice1').hide();   
		}
		$('#span_adddegree-1').hide();
		$('#degree_add-1').text(" + ");
	  <? for ($i = 2; $i <= $MAX_FIELDS; $i++) {?>
		$('#degree_add-<?=$i?>').hide();
		$('#degree_choice<?=$i?>').hide();
		$('#span_adddegree-<?=$i?>').hide();
		$('#degree_add-<?=$i?>').text(" + ");
	  <? } ?>
	});
	$("a[id^='degree_add-']").click(function() {
		var currid = $(this).attr('id').split('-')[1]*1;
		if($('#degree_add-' + currid).text() == " + ") {
			$('#degree_choice' + (currid+1)).show();
			$('#degree_add-' + (currid+1)).show();
			$('#degree_add-' + currid).text("x");
			$('#span_adddegree-' + currid).show();
		} else if($('#degree_add-' + currid).text() == "x") {
			$('#degree_choice' + currid).hide();
			$('#degree_add-' + currid).hide();
			$('#span_adddegree-' + currid).hide();
		}
	});
	$('#gender_cb').change(function() {
	  return $('.gc').toggle();
	});
	$('#year_cb').change(function() {
		if($(this).is(':checked')) {
			$('#year_add-1').show();
			$('#year_choice1').show();   
		} else {
			$('#year_add-1').hide();
			$('#year_choice1').hide();   
		}
		$('#span_addyear-1').hide();
		$('#year_add-1').text(" + ");
	  <? for ($i = 2; $i <= $MAX_YEARFIELDS; $i++) {?>
		$('#year_add-<?=$i?>').hide();
		$('#year_choice<?=$i?>').hide();
		$('#span_addyear-<?=$i?>').hide();
		$('#year_add-<?=$i?>').text(" + ");
	  <? } ?>
	});
	$("a[id^='year_add-']").click(function() {
		var currid = $(this).attr('id').split('-')[1]*1;
		if($('#year_add-' + currid).text() == " + ") {
			$('#year_choice' + (currid+1)).show();
			$('#year_add-' + (currid+1)).show();
			$('#year_add-' + currid).text("x");
			$('#span_addyear-' + currid).show();
		} else if($('#year_add-' + currid).text() == "x") {
			$('#year_choice' + currid).hide();
			$('#year_add-' + currid).hide();
			$('#span_addyear-' + currid).hide();
		}
	});
	$('#income_cb').change(function() {
	  return $('#income_choice').toggle();
	});
	$('#gwa_cb').change(function() {
	  return $('#gwa_choice').toggle();
	});
}); 


</script>

<div class="span12">
<div class="row-fluid">
<a href="<?= base_url("sponsorhomepage")?>" style="height:23px; margin-top:10px;" class="btn btn-custom pull-right">Back to sponsor homepage</a>
<h1>Create Scholarship</h1>
<hr/>
</div>
	<div class="row-fluid">
		<div class="span6 well">
		<form id="post-form" action="<?= base_url('postscholarship/postScholarship') ?>" method="post" enctype="multipart/form-data" class="sample-form"
				onsubmit="return validateForm()" name="trueform">
			<h4> Scholarship Name </h4>
			<input type="text" name="title" style="height:50px; width:500px; font-size:20px"/>
			<h4> Description </h4>
			<textarea placeholder="Description" name="description" type="text" style="height:200px; width:500px;"></textarea>
			<h5> Deadline (mm/dd/yy) <h5>
			<input type="text" name="deadline" style="height:23px;width:125px"/>
			<h5> Slots <h5>
			<input type="text" id= "slots" name="slots" style="height:23px;width:50px"/>
		</div>
	
	
	<div class="span6 well">
		<h4> Optional Search Tags </h4>
		<table class="table">
			<tbody>
				<tr>
					<td> <label class="checkbox"> 
					<input id="degree_cb" type="checkbox" name="degree_cb"/>Degree Program</label></td>
					<td> 
						<?for ($i = 1; $i <= $MAX_FIELDS; $i++) {?>
						<select id="degree_choice<?=$i?>" style="display:none" name="degree_choice<?=$i?>">
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
						<span><a id="degree_add-<?= ($i < $MAX_FIELDS) ? $i : ''?>" style="font-size:20px; text-decoration:none; cursor:pointer; display:none"> + </a><span id="span_adddegree-<?=$i?>" style="display:none"><br/></span></span>
						<? } ?>
					</td>
				</tr>

				<tr>
					<td> <label class="checkbox"><input id="gender_cb" type="checkbox" name="gender_cb"/>Gender</label></td>
					<td> 
						<label class="gc radio inline" style="display:none"> <input id="gender_choice_M" type="radio" name="gender_choice" value="M" style="display:none" class="gc">Male
						</label>
						
						<label class="gc radio inline" style="display:none"> <input id="gender_choice_F" type="radio" name="gender_choice" value="F" style="display:none" class="gc">Female
						</label>						
					</td>
				</tr>
				<tr>
					<td> <label class="checkbox"><input id="year_cb" type="checkbox" name="year_cb"/>Year Level</label></td>
					<td>
						<?for ($i = 1; $i <= $MAX_YEARFIELDS; $i++) {?>
						<select id="year_choice<?=$i?>" style="display:none" name="year_choice<?=$i?>">
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
						<span><a id="year_add-<?= ($i < $MAX_YEARFIELDS) ? $i : ''?>" style="font-size:20px; text-decoration:none; cursor:pointer; display:none"> + </a><span id="span_addyear-<?=$i?>" style="display:none"><br/></span></span>
						<? } ?>
					</td>
				</tr>		
				
				<tr>
					<td> <label class="checkbox"><input id="income_cb" type="checkbox" name="income_cb"/>Family Income</label></td>
					<td id="income_choice" style="display:none">
						<input id="minincome_input" type="text" placeholder="Min. amount in Pesos" name="min_income"/> <br/>
						<input id="maxincome_input" type="text" placeholder="Max. amount in Pesos" name="max_income"/> 
					</td>
				</tr>
				<tr>
					<td> <label class="checkbox"><input id="gwa_cb" type="checkbox" name="gwa_cb"/>GWA</label></td>
					<td id="gwa_choice" style="display:none">
						<input id="mingwa_input" type="text" placeholder="Min. GWA" name="min_gwa"/> <br/>
						<input id="maxgwa_input" type="text" placeholder="Max. GWA" name="max_gwa"/> 
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	</div>
	
	
	<div class="row-fluid">
	<div class="span6 well">
		<h4> Specific Scholarship Mechanics </h4>
		<div class="well orange" align="justify">Please upload a valid PDF file containing the detailed mechanics of your scholarship. 
		This file will be visible and downloadable to students applying to your scholarship.
		</div>
		<input id="file" type="file" name="file"/>

	</div>
	
	<div class="span6 well">
		<div><input class="btn btn-custom btn-large" type="submit" value="Create Scholarship"></div>
	</div>
	</form>
	
	</div>
</div>
	


<!--
<div class="container">
	<div class="row-fluid">
			<div class="span12 well">
				<h3> Create Scholarship </h3>
				<form id="post-form" action="<?= base_url('postscholarship/postScholarship') ?>" method="post" enctype="multipart/form-data" class="sample-form"
				onsubmit="return validateForm()" name="trueform">
					<div class="row-fluid">
					<label> Scholarship Name </label>
					<input type="text" name="title" />
					<br/>
					</div>
					
					<div class="row-fluid">
					<div class="span2">
					<table class="table">
					<tbody>
						<tr>
							<td> <label class="checkbox"> 
							<input id="degree_cb" type="checkbox" name="degree_cb"/>
							Degree program </label></td>
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
						</tr>

						<tr>
							<td> <input id="gender_cb" type="checkbox" name="gender_cb"/>Gender</td>
							<td> <label for="gender_choice_M" style="display:none" class="gc">Male</label> 
								<input id="gender_choice_M" type="radio" name="gender_choice" value="M" style="display:none" checked="checked" class="gc"/>
								<label for="gender_choice_F" style="display:none" class="gc">Female</label>
								<input id="gender_choice_F" type="radio" name="gender_choice" value="F" style="display:none" class="gc"/>
							</td>
						</tr>
							<td> <input id="year_cb" type="checkbox" name="year_cb"/>Year level</td>
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
						<tr>		
						
						</tr>
							<td> <input id="income_cb" type="checkbox" name="income_cb"/>Family income</td>
							<td id="income_choice" style="display:none">Less than<input id="income_input" type="text" placeholder="Max amount in Pesos" name="max_income"/> </td>
						<tr>
						</tr>
					</tbody>
					</table>
					</div>
					</div>
					
					<div class="row-fluid">
					<label> Description </label>
					<textarea placeholder="Description" name="description" type="text"></textarea>
					<br/>
					<input id="file" type="file" name="file"/>
					<br/>
					<div><input type="submit" value="Create Scholarshipz!"></div>
					</div>
					
				</form>
			</div>
	</div>
</div>
-->