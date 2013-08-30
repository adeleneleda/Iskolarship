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

<div class="span12">
	<a href="<?= base_url("sponsorhomepage")?>" style="height:23px; margin-top:10px;" class="btn btn-custom pull-right">Back to sponsor homepage</a>
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
		<tr>
			<td>
				Deadline:
			</td>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['expiry']?>
			</td>
		</tr>
		<tr>
			<td>
				Slots available:
			</td>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['slots']?>
			</td>
		</tr>
		<?php if(!empty($scholarshipinfo['tags'])) { ?>
		<tr>
			<td>
				Tags:
			</td>
			<td style="padding-left:20px">
				<?php
				
					$i = 0;
					while($i < sizeof($scholarshipinfo['tags'])) {
						echo '<b>'.$scholarshipinfo['tags'][$i]['reqtype'] . '</b> ' . $scholarshipinfo['tags'][$i]['reqval'];
						echo '<br>';
						$i++;
					}
				?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<h4>Specific mechanics</h4>
	<div style="padding-left:10px">
	<form method="post" action="<?= base_url('viewscholarshipdetails/downloadfile')?>">
		<input type = "hidden" name = "filename" value = "<?=$scholarshipinfo['title']?>.pdf"/>
		<input type = "hidden" name = "filepath" value = "<?= base_url('scholarshippdfs/'.$scholarshipid.'.pdf')?>"/>
		<input type="submit" value = "Download detailed mechanics" class="btn"/>
	</form></div>
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
				<a href="<?=base_url('viewstudentdetails/viewstudentinfo/' .$applicants[$counter]['studentid'])?>" >
				<?php echo $applicants[$counter]['firstname'] . ' ' . $applicants[$counter]['lastname']; ?>
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
				<form action="<?=base_url('viewstudentdetails/viewstudentinfo/')?>" method='POST'>
					<input type="hidden" name="studentid" value="<?=$grantees[$counter]['studentid'];?>">
					<input type="submit" value="<?=$grantees[$counter]['firstname'];?>">
				</form>
				-->
				
				
				<a href="<?=base_url('viewstudentdetails/viewstudentinfo/' .$grantees[$counter]['studentid'])?>" > <?php echo $grantees[$counter]['firstname'] . ' ' . $grantees[$counter]['lastname']; ?> 
				
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