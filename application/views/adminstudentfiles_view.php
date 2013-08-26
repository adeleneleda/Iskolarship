
<div class="container">
    <div class="row-fluid" style="padding-left:15px">
        <div class="span12 well">
            <h4> Students for approval </h4>
            <table>
                <?php 
                $ctr = 0;
                if(!empty($studentlist))
                {
                    while(!empty($studentlist[$ctr])){?>
                            <tr>
                                <td> <a href="<?= base_url('adminstudentfiles/display_forapproval/' . $studentlist[$ctr]['studentid'])?>" > <?php echo $studentlist[$ctr]['lastname'] . ', ' . $studentlist[$ctr]['firstname']?> </a></td>
                            </tr>
                    <?php
                        $ctr++;
                    }
                }
                else 
                    {?>
                        <tr> No students for approval </tr> 
                    <?php
                    }
                ?>
            </table>
        </div>
    </div>
</div>