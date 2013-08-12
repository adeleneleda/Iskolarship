<script>
	$(document).ready(function() {
		$('.applybutton').click(function() {
			confirm("Take this!");
		});
	});
	
	function confirmGrant() {
		return confirm("Are you sure?");
	}
</script>

<a href="<?= base_url("sponsorhomepage")?>" style="height:23px" class="btn btn-custom pull-right">Back to sponsor homepage</a>
<div class="span12">
	<h1><?=$scholarshipinfo['title']?></h1>
	<hr/>
	<div class="well">
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
	</div>
	
	<div class="row-fluid">
	<div class="well span6">
	<h4>Applicants</h4>
	<table>
		<?php
		$counter = 0;
		if(!empty($applicants)) {
			while($counter < sizeof($applicants)) { ?>
				<tr>
				<td> 
					<form action="<?=base_url('viewscholarshipdetails/grant_scholarship')?>" onsubmit="return confirmGrant()" method='POST'>
						<input class="btn btn-custom" type="submit" value="Grant!"> 
						<input name="studentid" type="hidden" value="<?=$applicants[$counter]['studentid'];?>" > 
						<input name="scholarshipid" type="hidden" value="<?=$scholarshipinfo['scholarshipid'];?>" >
					</form> 
				</td>
				<td> 
				<a href="<?=base_url('viewstudentdetails/loadstudentinfo/' .$applicants[$counter]['studentid'])?>" >
				<?php echo $applicants[$counter]['firstname']; ?>
				</td>
				</tr>
			<?php
				$counter++;
			}
		}
		else { ?>
		<tr> No applicants </tr>
		<?php } ?>		
	</table>
	</div>
	
	<div class="well span6">
	<h4>Grantees</h4>
	<table>
		<?php
		$counter = 0;
		if(!empty($grantees)) {
			while($counter < sizeof($grantees)) { ?>
				<tr>
				<td> 
				
				<!-- kaya naging ganito para magconform dun sa function prototype ni Adelen for loadstudent info -->
				<!--
				<form action="<?=base_url('viewstudentdetails/loadstudentinfo/')?>" method='POST'>
					<input type="hidden" name="studentid" value="<?=$grantees[$counter]['studentid'];?>">
					<input type="submit" value="<?=$grantees[$counter]['firstname'];?>">
				</form>
				-->
				
				
				<a href="<?=base_url('viewstudentdetails/loadstudentinfo/' .$grantees[$counter]['studentid'])?>" > <?php echo $grantees[$counter]['firstname']; ?> 
				
				<td>
				</tr>
			<?php
				$counter++;
			}
		}
		else { ?>
		<tr> No Grantees yet </tr>
		<?php } ?>		
	</table>
	</div>
	</div>
</div>