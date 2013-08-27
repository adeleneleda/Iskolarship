<script>

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
<div class="span12">
<span class="pull-right">
<a href="<?= base_url("editstudentprofile")?>" style="height:23px" class="btn btn-custom">Edit Profile</a>
<a href="<?= base_url("poststudentfeedback")?>" style="height:23px" class="btn btn-custom">Give Scholarship Feedback</a>
</span>
<h2> Search scholarships </h2>
<div class="container">
	<div class="row-fluid">
	
	<div class="span4 well">
	<form action="<?= base_url('searchscholarship/conductsearch') ?>" method="post">
		<h4> Optional search tags </h4>
		<table class="table">
			<tbody>
				<tr>
					<td> <label class="checkbox"> 
					<input id="degree_cb" type="checkbox" name="degree_cb"/>Degree program</label></td>
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
					<td> <label class="checkbox"><input id="gender_cb" type="checkbox" name="gender_cb"/>Gender</label></td>
					<td> 
						<label class="gc radio inline" style="display:none"> <input id="gender_choice_M" type="radio" name="gender_choice" value="M" style="display:none" class="gc">Male
						</label>
						
						<label class="gc radio inline" style="display:none"> <input id="gender_choice_F" type="radio" name="gender_choice" value="F" style="display:none" class="gc">Female
						</label>						
					</td>
				</tr>
					<td> <label class="checkbox"><input id="year_cb" type="checkbox" name="year_cb"/>Year level</label></td>
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
					<td> <label class="checkbox"><input id="income_cb" type="checkbox" name="income_cb"/>Maximum family income</label></td>
					<td id="income_choice" style="display:none"><input id="income_input" type="text" placeholder="Max amount in Pesos" name="max_income"/> </td>
				<tr>
				</tr>
			</tbody>
		</table>
		<input class="btn btn-custom" type="submit" value="Search">
	</form>
	</div>
	
	<div class="span8 well">
		<h4> Search results </h4>
		<table>
			<?php
			$counter = 0;
			if(!empty($scholarships)) {
				while($counter < sizeof($scholarships)) { ?>
					<tr>
					<td><h2><a href="<?= base_url('viewscholarshipdetails/loadscholarshipinfo/' . $scholarships[$counter]['scholarshipid'])?>" > <?php echo $scholarships[$counter]['title']; ?> </a></h2>
					
					<?php echo $scholarships[$counter]['description']; ?> 
					<br/>
					<br/>
					</td>
					
					</tr>
				<?php
					$counter++;
				}
			}
			else { ?>
			<tr> No scholarships found </tr>
			<?php } ?>		
		</table>
	</div>
	</div>
</div>
</div>
