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

<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <form action="<?= base_url('poststudentdetails/get_details')?>" method="post" enctype="multipart/form-data"> 
                <div class="row">
                    <div class="span6 well">
                        <h4> Site Information </h4>
                        <label> Username: </label>
                        <input type="text" name="username" class="span6"/>
                        <label> Password: </label>
                        <input type="text" name="password" class="span6"/>
                        
                        <h4> Basic Information </h4>
                        <label> Name: </label>
                        <table>
                            <tr>
                                <td style="padding-right:25px"> <input type="text" placeholder="Last Name" name="lastname"/> </td>
                                <td style="padding-left:25px"> <input type="text" placeholder="First Name" name="firstname"/> </td>
                            </tr>
                            <tr>
                                <td style="padding-right:25px"> <input type="text" placeholder="Middle Name" name="middlename"/> </td>
                                <td style="padding-left:25px"> <input type="text" placeholder="Name Suffix" name="namesuffix"/> </td>
                            </tr>
                        </table>
                        <label> Sex: </label>
                        <input type="radio", name="sex", value="0"> Male </input>
                        <input type="radio", name="sex", value="1"> Female </input>
                        <label> Birthday: </label> 
                        <input id="birthday" name="birthday" size="10" />
                        <label> Degree Program: </label>
                        <select name="program">
                            <?php 
                                $ctr = 0;
                                while(!empty($programs[$ctr]))
                                {
                            ?>
                                <option value=<?php echo $programs[$ctr]['programid']; ?>>
                                    <?php echo $programs[$ctr]['name']; ?>
                                </option>
                            <?php
                                $ctr++;
                                }
                            ?>
                            </select>
                        <label> Year Level </label>
                        <select name="yearlevel">
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
                        </select>
                        </br>
                        </br>
                        </br>
                    </div>

                    <div class="span6 well">
                        <h4> Contact Information </h4>
                        <label> Mobile Number </label>
                        <input type="text" name="mobilenumber" class="span6"/>
                        <label> Email Address</label>
                        <input type="text" name="emailadd" class="span6"/>

                        <h4> Student Details </h4>
                        <label for="cvfile">Curriculum Vitae:</label>
                        <input type="file" name="cvfile" id="cvfile"/>
                        <label for="copyofgrades"> Copy of Grades: </label>
                        <input type="file" name="copyofgrades" id="copyofgrades"/>
                        
                        <h4> Financial Information </h4>
                        <label> Family Income: </label>
                        <input type="text" name="familyincome" class="span6"/>
                        <label> Target Money: </label>
                        <input type="text" name="targetmoney" class="span6"/>
                        <label> Reason for Needing Scholarship: </label>
                        <textarea  name="reason" class="span6"></textarea>
                    </div>
                </div>
                <center>
                    <input type="submit" value="Sign up" class="btn btn-primary">
                </center>
            </form>
        </div>
    </div>
</div>