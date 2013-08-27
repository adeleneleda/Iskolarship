<div class="span12">
	<div class="well">
		<h2><?=$basicinfo['firstname'].' '.$basicinfo['lastname']?></h2>
		<?=$basicinfo['description']?>

		<h3>Current Scholarships</h3>
		<table>
			<tr>
				<td>Scholarship Title</td>
				<td>Description</td>
				<td>Slots</td>
			</tr>
			<?foreach($currentscholarships as $indiv_currentscho) {?>
				<tr>
					<td><a href=""><?=$indiv_currentscho['title']?></a></td>
					<td><?=$indiv_currentscho['description']?></td>
					<td><center><?=$indiv_currentscho['slots']?></center></td>
				</tr>
			<?}?>
		</table>
		
		<h3>Past Scholarships</h3>
		<table>
			<tr>
				<td>Scholarship Title</td>
				<td>Description</td>
				<td>Recipients</td>
			</tr>
			<?foreach($pastscholarshipsandscholars as $indiv_pastscho) {?>
				<tr>
					<td><a href=""><?=$indiv_pastscho['title']?></a></td>
					<td><?=$indiv_pastscho['description']?></td>
					<td><center><?=$indiv_pastscho['string_agg']?></center></td>
				</tr>
			<?}?>
		</table>
		
		<h3>Student Feedback</h3>
			<?foreach($scholarsfeedback as $indiv_feedback) {?>
				
				<?=$indiv_feedback['firstname'].' '.$indiv_feedback['lastname']?><br/>
				<?=$indiv_feedback['name']?><br/>
				<?=$indiv_feedback['title']?><br/>
				<?=$indiv_feedback['insertedon']?><br/>
				<?=$indiv_feedback['feedback']?><br/>
				<br/><br/>
			<?}?>
	</div>
</div>
