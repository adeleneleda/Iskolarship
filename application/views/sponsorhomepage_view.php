<a href="<?= base_url('postscholarship')?>" style="height:23px;">Create scholarship</a>

<h4> Posted scholarships </h4>
<table>
	<?php
	$counter = 0;
	if(!empty($scholarships)) {
		while($counter < sizeof($scholarships)) { ?>
			<tr>
			<td> <a href=''> <?php echo $scholarships[$counter]['title']; ?> </a></td>
			<td> <?php echo $scholarships[$counter]['description']; ?> </td>
			</tr>
		<?php
			$counter++;
		}
	}
	else { ?>
	<tr> No scholarships found </tr>
	<?php } ?>		
</table>