<a href="<?= base_url("adminstudentfiles")?>" style="height:23px" class="btn btn-custom pull-right">Back to pending approval</a>

<div class="span12">
     <?$fullname = array($studentsforapproval['firstname'], $studentsforapproval['middlename'], $studentsforapproval['lastname'], $studentsforapproval['namesuffix']);?>
    <div class="row-fluid">
        <div class="span6">
            <div class="well" align="center">
                <h3> Student's Basic Information </h3>
                <table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
                    <tr>
                        <td><b>Name: </b></td>
                        <td><?=implode($fullname, " ")?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Sex: </b></td>
                        <td><?=($studentsforapproval['sex'] == 1 ? 'Female' : 'Male')?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Birthday: </b></td>
                        <td><?=$studentsforapproval['birthday']?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Degree Program: </b></td>
                        <td><?=$studentsforapproval['name']?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Year level: </b></td>
                        <td><?=$studentsforapproval['description']?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Mobile Number: </b></td>
                        <td><?=$contacts['mobilenumber']?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Email Address: </b></td>
                        <td><?=$contacts['emailadd']?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Student's Description: </b></td>
                        <td><?=$studentsforapproval['studentdescription']?><br/></td>
                    </tr>
                </table>
            </div>
            <div class="well" align="center">
            <h3> Files for approval </h3>
                <form method="post" action="<?= base_url('adminstudentfiles/downloadpicture')?>">
                    <input type = "hidden" name = "studno" value = "<?php echo $studentid?>"/>
                    <input type = "hidden" name = "filepath" value = "<?= base_url('images/stud'.$studentid.'x.jpg')?>"/>
                    <input type="submit" value = "Download Student's Picture" class="btn btn-medium btn-custom"/>
                </form>
                <form method="post" action="<?= base_url('adminstudentfiles/downloadcv')?>">
                    <input type = "hidden" name = "filename" value = "<?php echo $studentid?>"
                    <input type = "hidden" name = "filepath" value = "<?= base_url('studentcvs/'.$studentid.'_cv.pdf')?>"/>
                    <input type="submit" value = "Download Student's CV" class="btn btn-medium btn-custom"/>
                </form>
                <form method="post" action="<?= base_url('adminstudentfiles/downloadcog')?>">
                    <input type = "hidden" name = "filename" value = "<?php echo $studentid?>"/>
                    <input type = "hidden" name = "filepath" value = "<?= base_url('studentcopyofgrades/'.$studentid.'_copyofgrades.pdf')?>"/>
                    <input type="submit" value = "Download Student's COG" class="btn btn-medium btn-custom"/>
                </form>
            </div>
        </div>
        <div class="span6">
            <div class="well" align="center">
                <h3> Other Information </h3>
                <table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
                    <tr>
                        <td><b>Family Income: </b></td>
                        <td><?=$studentsforapproval['familyincome']?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Reason for Needing Scholarship:</b></td>
                        <td><?=$studentsforapproval['reasonforneedingscholarship']?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Target Money:</b></td>
                        <td><?=$studentsforapproval['targetmoney']?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Account Number:</b></td>
                        <td><?=$studentsforapproval['accountnumber']?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Running GWA:</b></td>
                        <td><?=$studentsforapproval['runninggwa']?><br/></td>
                    </tr>
                </table>
            </div>
            <div class="well" align="center">
                <form action="<?= base_url('adminstudentfiles/approvestudent/'. $studentid .'')?>" method="post" enctype="multipart/form-data"> 
                <h3>Decision for Approval </h3>
                    <table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
                        <tr>
                            <td><input type="radio", name="isapproved", value="0"> Approve </input></td>
                            <td><input type="radio", name="isapproved", value="1"> Disapprove </input></td>
                        </tr>
                        <tr>
                            <td><b>Reason for approval/disapproval </b></td>
                            <td><textarea  name="approvalreason" class="span6" style="width:350px; height:167px"></textarea></td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
 
        <center>
            <input type="submit" value="Submit" class="btn btn-custom btn-large">
        </center>
    </form>
</div>