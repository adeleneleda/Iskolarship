<div class="span12">
    <?$fullname = array($studentinfo['firstname'], $studentinfo['middlename'], $studentinfo['lastname'], $studentinfo['namesuffix']);?>
    <form action="<?= base_url('editstudentprofile/get_details')?>" method="post" enctype="multipart/form-data"> 
        <div class="row-fluid">
            <div class="span6">
                <div class="well">
                <h3> Basic Information </h3>
                <table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
                    <tr>
                        <td width="25%"><b>Name: </b></td>
                        <td><?=implode($fullname, " ")?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Sex: </b></td>
                        <td><?=($studentinfo['sex'] == 1 ? 'Female' : 'Male')?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Birthday: </b></td>
                        <td><?=$studentinfo['birthday']?><br/></td>
                    </tr>
                    <tr>
                        <td><b>Degree Program: </b></td>
                        <td><select name="program">
                            <?php 
                                $ctr = 0;
                                while(!empty($programs[$ctr]))
                                {
                            ?>
                                <option value=<?php echo $programs[$ctr]['programid'];?>>
                                    <?php echo $programs[$ctr]['name']; ?>
                                </option>
                            <?php
                                $ctr++;
                                }
                            ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td><b>Year Level: </b></td>
                        <td><select name="yearlevel">
                            <?php
                                $ctr = 0;
                                while(!empty($yearlevels[$ctr]))
                                {
                            ?>
                                <option value=<?php echo $yearlevels[$ctr]['yearlevelid']; ?>>
                                    <?php echo $yearlevels[$ctr]['description']; ?>
                                </option>
                            <?php
                                $ctr++;
                                }
                            ?>
                        </select></td>
                    </tr>
                </table>
                </div>
                
                <div class="well">
                    <h3> Contact Information </h3>
                    <table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
                        <tr>
                            <td><b>Mobile Number: </b></td>
                            <td><input type="text" name="mobilenumber" class="span8"/><br/></td>
                        </tr>
                        <tr>
                            <td><b>Email Address: </b></td>
                            <td><input type="text" name="emailadd" class="span8"/><br/></td>
                        </tr>
                    </table>
                </div>    
                
                <div class="well">
                    <h3> Additional Information </h3>
                    <table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
                        <tr>
                            <td for="dpfile"><b>Profile Picture:</b></td>
                            <td><input type="file" name="dpfile" id="dpfile"/></td>
                        </tr>
                        <tr>
                            <td><b>Student Description:</b></td>
                            <td><textarea  name="studentdescription" class="span6" style="width:350px; height:100px"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>Running GWA:</b></td>
                            <td><input type="text" name="runninggwa" class="span8"/></td>
                        </tr>
                    </table>
                </div>
                
            </div>
            
            <div class="span6"> 
                <div class="well">
                    <h3> Student Details </h3>
                    <table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
                        <tr>
                            <td for="cvfile"><b>Curriculum Vitae:</b></td>
                            <td><input type="file" name="cvfile" id="cvfile"/></td>
                        </tr>
                        <tr>
                            <td for="copyofgrades"><b>Copy of Grades: </b></td>
                            <td><input type="file" name="copyofgrades" id="copyofgrades"/></td>
                        </tr>
                    </table>
                </div>
                
                <div class="well">
                    <table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
                        <h3> Financial Information </h3>
                        <tr>
                            <td><b>Family Income: </b></td>
                            <td><input type="text" name="familyincome" class="span8" value="<?php echo $studentinfo['familyincome']?>"/></td>
                        </tr>
                        <tr>
                            <td><b>Target Money: </b></td>
                            <td><input type="text" name="targetmoney" class="span8" value="<?php echo $studentinfo['targetmoney']?>"/></td>
                        </tr>
                        <tr>
                            <td><b>Reason for Needing Scholarship: </b></td>
                            <td><textarea  name="reason" class="span6" style="width:350px; height:220px">
                            </textarea></td>
                        </tr>
                    </table>
                </div>
                
                <div class="well">
                    <h3> Bank Details </h3>
                    <table class="wide table table-bordered tablesorter tablesorter-bootstrap table-striped table-hover">
                        <tr>
                            <td><b>Bank:</b></td>
                            <td><select name="bank">
                                <?php 
                                    $ctr = 0;
                                    while(!empty($banks[$ctr]))
                                    {
                                ?>
                                    <option value=<?php echo $banks[$ctr]['bankid']; ?>>
                                        <?php echo $banks[$ctr]['name']; ?>
                                    </option>
                                <?php
                                    $ctr++;
                                    }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                            <td><b>Account Number: </b></td>
                            <td><input type="text" name="accountnumber" class="span8" value="<?php echo $studentinfo['accountnumber'] ?>"/></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <center>
            <input type="submit" value="Sign up" class="btn btn-custom btn-xlarge">
        </center>
    </form>
</div>