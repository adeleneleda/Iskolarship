
<div class="span12">
<div class="well">
	<!--<img src="<?= base_url("images/globe.jpg")?>"/>-->
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
				Slots:
			</td>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['slots']?>
			</td>
		</tr>
		<?php } ?>
	</table>
	</div>
	
	<br/>
	<h4>Sponsor Information</h4>
	<div style="padding-left:10px">
	<?$fullname = array($scholarshipinfo['firstname'], $scholarshipinfo['middlename'], $scholarshipinfo['lastname'], $scholarshipinfo['namesuffix']);?><br/>			
	<table>
		<tr>
			<td>
				Donor:
			</td>
			<td style="padding-left:20px">
				<?=implode($fullname, " ");?>
			</td>
		</tr>
		<tr>
			<td>
				Donor Details:
			</td>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['ddesc']?>
			</td>
		</tr>
	</table>
	</div>
	<br/>
	<br/>
	<h4>Specific mechanics</h4>
	<div style="padding-left:10px">
	<button class="btn">Download detailed mechanics</button>
	</div>
	<center>
		<a href="<?= base_url('xadminscholarship/approve/' . $scholarshipinfo['scholarshipid'])?>" style="height:23px;" class="btn btn-custom">Approve and post!</a>
	</center>
	
</div>
</div>
