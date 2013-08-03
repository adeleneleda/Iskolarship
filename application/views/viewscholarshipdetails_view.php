
<div class="span12">
<div class="well">
	<img src="<?= base_url("images/globe.jpg")?>"/>
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
	
	<br/>
	<h4>Donor Information</h4>
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
		<tr>
			<td>
				Expiry:
			</td>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['expiry']?>
			</td>
		</tr>
		<tr>
			<td>
				Expiry:
			</td>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['slots']?>
			</td>
		</tr>
	</table>
	</div>
	<br/>
	<h4>Scholarship Availability</h4>
	<div style="padding-left:10px">
	<?$fullname = array($scholarshipinfo['firstname'], $scholarshipinfo['middlename'], $scholarshipinfo['lastname'], $scholarshipinfo['namesuffix']);?><br/>		
	<table>
		<tr>
			<td>
				Expiry:
			</td>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['expiry']?>
			</td>
		</tr>
		<tr>
			<td>
				Slot:
			</td>
			<td style="padding-left:20px">
				<?=$scholarshipinfo['slots']?>
			</td>
		</tr>
	</table>
	</div>
	<br/>
	<form method="post" action="<?= base_url('viewscholarshipdetails/applyforscholarship')?>" enctype="multipart/form-data">
		<input type="hidden" name = "scholarshipid" value = "<?=$scholarshipid?>"/>
		<label for="reqtfile"><h4>Requirements</h4></label>
		<input type="file" name="reqtfile" id="reqtfile"/>	
		<br/><br/>
		<center>
		<input type="submit" value = "Apply"/>
		</center>
	</form>
	
</div>
</div>
