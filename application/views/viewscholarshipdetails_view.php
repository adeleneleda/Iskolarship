<div class="span12">
<div class="well">
	<!--<img src="<?= base_url("images/globe.jpg")?>"/>-->
	<h1><?=$scholarshipinfo['title']?></h1>
	<hr/>
	<h4>Scholarship Information</h4>
	<div style="padding-left:10px">
	<table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover" style="width:65%">
		<tr>
			<th style="width:25%">
				Scholarship Name:
			</th>
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
			<th>
				Description:
			</th>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['sdesc']?>
			</td>
		</tr>
	</table>
	</div>

	<?$fullname = array($scholarshipinfo['firstname'], $scholarshipinfo['middlename'], $scholarshipinfo['lastname'], $scholarshipinfo['namesuffix']);?><br/>
	<h4>Donor Information</h4>
	<div style="padding-left:10px">
	<?//$fullname = array($scholarshipinfo['firstname'], $scholarshipinfo['middlename'], $scholarshipinfo['lastname'], $scholarshipinfo['namesuffix']);?>		
	<table style="width:65%" class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
		<tr>
			<th style="width:25%">
				Donor:
			</th>
			<td style="padding-left:20px">
				<a href="<?= base_url('viewsponsordetails/index/'.$scholarshipinfo['donorid'])?>"><?=implode($fullname, " ");?></a>
			</td>
		</tr>
		<tr>
			<th>
				Donor Details:
			</th>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['ddesc']?>
			</td>
		</tr>
	</table>
	</div>
	<br/>
	<h4>Scholarship Availability</h4>
	<div style="padding-left:10px">
	<?$fullname = array($scholarshipinfo['firstname'], $scholarshipinfo['middlename'], $scholarshipinfo['lastname'], $scholarshipinfo['namesuffix']);?>		
	<table style="width:65%" class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
		<tr>
			<th style="width:25%">
				Deadline:
			</th>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['expiry']?>
			</td>
		</tr>
		<tr>
			<th>
				Slots:
			</th>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['slots']?>
			</td>
		</tr>
	</table>
	</div>
	<br/>
	<h4>Specific mechanics</h4>
	<div style="padding-left:10px">
	<button class="btn">Download detailed mechanics</button>
	</div>
	<form method="post" action="<?= base_url('viewscholarshipdetails/applyforscholarship')?>" enctype="multipart/form-data">
		<input type="hidden" name = "scholarshipid" value = "<?=$scholarshipid?>"/>
		<br/>
		<br/>
		<h4>Attach Requirements</h4>
		<input type="file" name="reqtfile" id="reqtfile"/>	
		<br/><br/>
		<center>
		<input class="btn btn-custom btn-large" type="submit" value = "Apply"/>
		</center>
	</form>
	
</div>
</div>


