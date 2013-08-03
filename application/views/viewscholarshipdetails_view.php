Title: <?=$scholarshipinfo['title']?><br/>
Scholarship Description: <?=$scholarshipinfo['title']?><br/>
<?$fullname = array($scholarshipinfo['firstname'], $scholarshipinfo['middlename'], $scholarshipinfo['lastname'], $scholarshipinfo['namesuffix']);?><br/>
Scholar Desc: <?=$scholarshipinfo['sdesc']?><br/>
Donor Fullname: <?=$fullname?><br/>
Donor description: <?=$scholarshipinfo['ddesc']?><br/>
Expiry: <?=$scholarshipinfo['expiry']?><br/>
Slots: <?=$scholarshipinfo['slots']?><br/>

<form>
	<input type="hidden" name = "scholarshipid" value = "<?=$scholarshipid?>"/>
	<input type="submit" value = "Apply"/>
</form>