<div class="span12">
<div style="height:400px; background:url('<?= base_url('images/studentgrid.png')?>'); background-size:1180px 400px; text-align:center">
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<a href="<?= base_url('postscholarship')?>" class="btn btn-custom btn-xlarge">Create Scholarship</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?= base_url('searchstudents')?>" class="btn btn-custom btn-xlarge">Search Students</a>
</div>
<br>
<br>
<h1> Posted Scholarships </h1>
<hr/>
<div style="padding:10px;padding-top:0px">
<table class="table table-hover table-bordered">
	<tr class="orange">
		<th width="40%">Title</th>
		<th>Description</th>
		<th>Tags</th>
	</tr>
	<?php
	$counter = 0;
	if(!empty($scholarships)) {
		while($counter < sizeof($scholarships)) { ?>
			<tr>
			
			<td> 
			<h3>
			<a href="<?= base_url('viewscholarshipdetails/loadscholarshipinfo_AsDonor/' . $scholarships[$counter]['scholarshipid'])?>" > <?php echo $scholarships[$counter]['title']; ?> </a>
			</h3>
			</td>
			
			<td> <?php echo $scholarships[$counter]['description']; ?> </td>
			<td> <?php
				if(!empty($scholarships[$counter]['tags'])) {
					$i = 0;
					while($i < sizeof($scholarships[$counter]['tags'])) {
						echo '<b>'.$scholarships[$counter]['tags'][$i]['reqtype'] . '</b> ' . $scholarships[$counter]['tags'][$i]['reqval'];
						echo '<br>';
						$i++;
					}
				}
			?>
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