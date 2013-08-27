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
					<?=$indiv_feedback['firstname'].' '.$indiv_feedback['lastname']?><br/>
					<?=$indiv_feedback['name']?><br/>
					<?=$indiv_feedback['title']?><br/>
					<?=$indiv_feedback['insertedon']?><br/>
					<?=$indiv_feedback['feedback']?><br/>
					<br/><br/>
			<?}} else {?>
				<table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
					<tr>
						<td><center><em>No Student Feedback Yet</em></center></td>
					<tr>
				</table>
			<?}?>
	</div>
</div>
