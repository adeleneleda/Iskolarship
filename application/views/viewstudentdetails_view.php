 <?$fullname = array($studentinfo['firstname'], $studentinfo['middlename'], $studentinfo['lastname'], $studentinfo['namesuffix']);?>
   	<div class="row">   
		<div class="well" align="center">
			<span>
				<img src="<?= base_url('images/pic.png')?>" style="float:left; padding-left:20px;"/>
			</span>
			<span>
			Name: <?=implode($fullname, " ")?><br/>
			Sex: <?=($studentinfo['sex'] == 1 ? 'Female' : 'Male')?><br/>
			Birthday: <?=$studentinfo['birthday']?><br/>
			Degree Program: <?=$studentinfo['name']?><br/>
			Family Income: <?=$studentinfo['familyincome']?><br/>
			Reason For Needing Scholarship: <?=$studentinfo['reasonforneedingscholarship']?><br/>
			Target Money: <?=$studentinfo['targetmoney']?><br/>
			<form method="post" action="<?= base_url('viewstudentdetails/downloadfile')?>">
				<input type = "hidden" name = "filename" value = "sample.pdf"/>
				<input type = "hidden" name = "filepath" value = "C:\Users\adelin\Desktop\pandesal.pdf"/>
				<input type="submit" value = "Download"/>
			</form>
			</span>
		</div>
	</div>			
</div>