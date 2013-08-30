<meta charset="utf-8" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />

        <div class="span12">
            <div class="span10 well">
				<h1> Our Sponsors </h1>
				Our student's dreams are becoming reality with the help of the following sponsors.
				We are deeply grateful for your continued help and support.
				<br/>
				<br/>
				<hr/>
					<?foreach($sponsors as $indiv_sponsor) { ?>
						<h3><a href="<?= base_url('viewsponsordetails/index/' . $indiv_sponsor['donorid'])?>" > <?php echo $indiv_sponsor['firstname']." ".$indiv_sponsor['lastname']; ?> </a></h3>
						<?php echo $indiv_sponsor['description']; ?> 
						<br/>
						<hr/>
					<?}?>
					</table>
              </div>
        </div>
