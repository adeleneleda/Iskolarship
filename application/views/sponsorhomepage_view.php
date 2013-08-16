<div class="span12">
<a href="<?= base_url('postscholarship')?>" style="height:23px;" class="btn btn-custom">Create scholarship</a>
<a href="<?= base_url('postscholarship')?>" style="height:23px;" class="btn btn-custom">Search students</a>

<br>
<br>
<div class="well" style="padding-top:10px">
<h4> Posted scholarships </h4>
<div style="padding:10px;padding-top:0px">
<table class="table">
	<tr>
		<th>Title</th>
		<th>Description</th>
	</tr>
	<?php
	$counter = 0;
	if(!empty($scholarships)) {
		while($counter < sizeof($scholarships)) { ?>
			<tr>
			
			<td> 
			<a href="<?= base_url('viewscholarshipdetails/loadscholarshipinfo_AsDonor/' . $scholarships[$counter]['scholarshipid'])?>" > <?php echo $scholarships[$counter]['title']; ?> </a>
			</td>
			
			<td> <?php echo $scholarships[$counter]['description']; ?> </td>
			
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