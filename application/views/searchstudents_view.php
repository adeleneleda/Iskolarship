<script>
$(document).ready(function() { 
	$('#degree_cb').change(function() {
	  return $('#degree_choice').toggle();
	});
	$('#year_cb').change(function() {
	  return $('#year_choice').toggle();
	});
	$('#gwa_cb').change(function() {
	  return $('.gwa').toggle();
	});
	$('#income_cb').change(function() {
	  return $('.income').toggle();
	});
});
function validateForm(){
	var x = document.forms["trueform"];
	var a, b;
	if(document.getElementById("gwa_cb").checked){
		a = parseFloat(x["gwa_from"].value, 10);
		b = parseFloat(x["gwa_to"].value, 10);
		if(a < 1 || a > 5 || isNaN(a)){
			alert("Please input a legit GWA value");
			return false;
		}
		if(b < 1 || b > 5 || isNaN(b)){
			alert("Please input a legit GWA value");
			return false;
		}
		if(b<a){
			alert("Please input a legit interval");
			return false;
		}
		document.getElementById("gwa_from").value = a;
		document.getElementById("gwa_to").value = b;
	}

	if(document.getElementById("income_cb").checked){
		a = parseFloat(x["income_from"].value, 10);
		b = parseFloat(x["income_to"].value, 10);
		if(isNaN(a) || isNaN(b)){
			alert("Please input a legit income");
			return false;
		}
		if(a <= 0 || b <= 0){
			alert("Please input a legit income");
			return false;
		}
		if(b<a){
			alert("Please input a legit interval");
			return false;
		}
		document.getElementById("income_from").value = a;
		document.getElementById("income_to").value = b;
	}
	
	return true;
}
</script>
<div class="span12">
	<a href="<?= base_url("sponsorhomepage")?>" style="height:23px; margin-top:10px;" class="btn btn-custom pull-right">Back to sponsor homepage</a>
	<h1>Student Search</h1><hr>
	<div class="span4 well">
		<h4>Filters</h4>
		<form method="POST" action="<?= base_url('searchstudents') ?>" enctype="multipart/form-data" name="trueform" onsubmit="return validateForm()">
		<table>
			<tr>
				<td> <label class="checkbox"> 
					<input id="degree_cb" type="checkbox" name="degree_cb"/>Degree program</label></td>
					<td>&nbsp </td>
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
				<td> <label class="checkbox"><input id="year_cb" type="checkbox" name="year_cb"/>Year level</label></td>
				<td>&nbsp</td>
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
			<tr>
				<td><label class="checkbox"><input id="gwa_cb" type="checkbox" name="gwa_cb"/>GWA</label></td><td>&nbsp</td>
				<td><input type="text" class="gwa span1" name="gwa_from" placeholder="From" style="display:none">
				<b class="gwa" style="display:none">&nbsp to &nbsp</b>
				<input type="text" class="gwa span1" name="gwa_to" placeholder="To" style="display:none"></td>
			</tr>
			<tr>
				<td><label class="checkbox"><input id="income_cb" type="checkbox" name="income_cb"/>Family Income</label></td>
				<td>
					<td><input type="text" class="income" name="income_from" placeholder="From" style="display:none">
					<b class="income" style="display:none">&nbsp to &nbsp</b>
					<input type="text" class="income" name="income_to" placeholder="To" style="display:none"></td>
				</td>
			</tr>
		</table><br/>
		<input class="btn btn-custom span2" type="submit" name="Search" value="Search" id="submiter">
		</form>
	</div>
	<div class="span5 well">
		<h3>Search Results</h3><hr>
		<?php
			$resultcnt = 0;
			foreach($results as $rows){
				$segment = array('viewstudentdetails', 'viewstudentinfo', $rows['studentid']);
				$segments = array('images', 'stud'.$rows['studentid'].'x.jpg');
				echo "
					<table>
						<tr>
							<td rowspan=4 class='span1'><img style='height:100px; width:130px' src='" .  site_url($segments). "''/></td>
							<td>&nbsp</td>
							<td><b><a href='" . site_url($segment) . "'>" . $rows['firstname'] . " " . $rows['lastname'] . "</a></b></td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td>" . $rows['name'] . " - " . $rows['description'] . "</td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td>Target Money: " . $rows['targetmoney'] . "</td>
						</tr>
					</table><br/>
				";
				$resultcnt++;
			}
			if($resultcnt == 0){
				echo "<b>No Results Found</b>";
			}
		?>
	</div>
</div>