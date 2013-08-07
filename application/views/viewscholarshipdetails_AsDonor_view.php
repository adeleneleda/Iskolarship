<div class="span12">
<div class="well">
	<h1><?=$scholarshipinfo['title']?></h1>
	<hr/>
	<h4>Scholarship Information</h4>
	<div style="padding-left:10px">
	<?$fullname = array($scholarshipinfo['firstname'], $scholarshipinfo['middlename'], $scholarshipinfo['lastname'], $scholarshipinfo['namesuffix']);?><br/>
				
	<table>
		<tr>
			<td>
				Scholarship Name:
			</td>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['title']?>
			</td>
		</tr>
		<tr>
			<td>
				Description:
			</td>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['sdesc']?>
			</td>
		</tr>
	</table>
	</div>
	
	<h4>Applicants</h4>
	<table>
		<?php
		$counter = 0;
		if(!empty($applicants)) {
			while($counter < sizeof($applicants)) { ?>
				<tr>
				<td> <a href="" > <?php echo $applicants[$counter]['firstname']; ?> 
				</tr>
			<?php
				$counter++;
			}
		}
		else { ?>
		<tr> No applicants found </tr>
		<?php } ?>		
	</table>
</div>
</div>