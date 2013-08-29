<style type="text/css">
.callout {
    position: relative;
    margin: 18px 0;
    padding: 18px 20px;
    background-color: #FFE6CC;
    /* easy rounded corners for modern browsers */
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
}
.callout .notch {
    position: absolute;
    top: -10px;
    left: 20px;
    margin: 0;
    border-top: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #FFE6CC;
    padding: 0;
    width: 0;
    height: 0;
    /* ie6 height fix */
    font-size: 0;
    line-height: 0;
     /* ie6 transparent fix */
    _border-right-color: pink;
    _border-left-color: pink;
    _filter: chroma(color=pink);
}

.border-callout { border: 1px solid #FFCE99; padding: 17px 19px; }
.border-callout .border-notch { border-bottom-color: #FFCE99; top: -11px; }

</style>

<div class="span12">
	<div class="well">
		<h2><?=$basicinfo['firstname'].' '.$basicinfo['lastname']?></h2>
		<?=$basicinfo['description']?>

		<h3>Current Scholarships</h3>
		<table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
			<tr>
				<th style="width:40%">Scholarship Title</th>
				<th style="width:40%">Description</th>
				<th style="width:20%">Slots</th>
			</tr>
			<?foreach($currentscholarships as $indiv_currentscho) {?>
				<tr>
					<td><a href="<?= base_url('viewscholarshipdetails/loadscholarshipinfo/'.$indiv_currentscho['scholarshipid'])?>"><?=$indiv_currentscho['title']?></a></td>
					<td><?=$indiv_currentscho['description']?></td>
					<td><?=$indiv_currentscho['slots']?></td>
				</tr>
			<?}?>
		</table>
		
		<h3>Past Scholarships</h3>
		<table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
			<tr>
				<th style="width:40%">Scholarship Title</td>
				<th style="width:40%">Description</td>
				<th style="width:20%">Recipients</td>
			</tr>
			<?foreach($pastscholarshipsandscholars as $indiv_pastscho) {?>
				<tr>
					<td><a href="<?= base_url('viewscholarshipdetails/loadscholarshipinfo/'.$indiv_pastscho['scholarshipid'])?>""><?=$indiv_pastscho['title']?></a></td>
					<td><?=$indiv_pastscho['description']?></td>
					<td><?=$indiv_pastscho['string_agg']?></td>
				</tr>
			<?}?>
		</table>
		
		<h3>Student Feedback</h3>
			<?if(!empty($scholarsfeedback)) {
				foreach($scholarsfeedback as $indiv_feedback) {?>
					<?/*?>
					<?=$indiv_feedback['firstname'].' '.$indiv_feedback['lastname']?><br/>
					<?=$indiv_feedback['name']?><br/>
					<?=$indiv_feedback['title']?><br/>
					<?=$indiv_feedback['insertedon']?><br/>
					<?=$indiv_feedback['feedback']?><br/>
					<br/><br/>
					<?*/?>
					<div class="callout border-callout">
					<a href="<?=base_url('viewstudentdetails')?>/viewstudentinfo/<?=$indiv_feedback['studentid']?>"><?=$indiv_feedback['firstname'].' '.$indiv_feedback['lastname']?> (<?=$indiv_feedback['name']?>) </a> wrote on <?=$indiv_feedback['insertedon']?>:<br/>
					<strong><?=$indiv_feedback['feedback']?></strong><br/>
					<b class="border-notch notch"></b>
					<b class="notch"></b>
					</div>
					
			<?}} else {?>
				<table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
					<tr>
						<td><center><em>No Student Feedback Yet</em></center></td>
					<tr>
				</table>
			<?}?>
	</div>
</div>
