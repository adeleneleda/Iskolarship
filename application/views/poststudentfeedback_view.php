<meta charset="utf-8" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#birthday" ).datepicker();
});
</script>

        <div class="span12">
            <div class="span10 well">
				<form method="post" action="<?= base_url('poststudentfeedback/submitstudentfeedback')?>" enctype="multipart/form-data">
                <h2> Scholarship Feedback </h2>
				Your feedback matters! Feel free to share your experience with your scholarships.
				<?if(count($scholarships) == 0) {?>
					<br/><br/><font color="red">You haven't received any scholarships yet.</font>
				<?}?>
				<hr/>
                <label> Scholarship: </label>
                <select name = "awardedscholarshipid">
					<?foreach($scholarships as $indiv_scholarships) {?>
						<option value = <?=$indiv_scholarships['awardedscholarshipid']?>><?=$indiv_scholarships['title']?></option>
					<?}?>
				</select>
				<br/>
				<br/>
				<label> Feedback: </label>
				<textarea "style = align:center;" name = "feedback">
				</textarea>
				</br>
				<br/>
				<input class="btn btn-custom" type = "submit" <?=count($scholarships) == 0 ? "disabled" : ""?> value="Give Feedback"/>
				</form>
              </div>
        </div>
