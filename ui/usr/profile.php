<?php
$GLOBALS['title']="Profile-HMS";
$page_name="DashBoard";
require('./../../inc/sessionManager.php');
require('./../../inc/handyCam.php');
require('./../../inc/dbPlayer.php');
$base_url="http://localhost/hms/";
$ses = new \sessionManager\sessionManager();

$ses->start();


$loginId=$ses->Get("userIdLoged");
$loginGrp=$ses->Get("userGroupId");
if($ses->isExpired())
{
    header( 'Location: '.$base_url.'login.php');


}
elseif($ses->Get("userGroupId")=="UG003")
{
    header( 'Location: '.$base_url.'edashboard.php');
}

else
{
    $name=$ses->Get("name");
    $userIdf = $ses->Get("userIdLoged");
    $db = new \dbPlayer\dbPlayer();
    $msg = $db->open();

    if ($msg = "true") {

        $data = array();
        //  var_dump($qery);
        $result = $db->getData("SELECT * FROM studentinfo where userId='".$userIdf."'");
         $handyCam = new \handyCam\handyCam();

        if(false===strpos((string)$result,"Can't"))
        {
            while ($row = mysql_fetch_array($result)) {

                array_push($data,$row['name']);
                array_push($data,$row['studentId']);
                array_push($data,$row['cellNo']);
                array_push($data,$row['email']);
                array_push($data,$row['nameOfInst']);
                array_push($data,$row['batchNo']);
                array_push($data,$row['gender']);
                array_push($data,$handyCam->getAppDate($row['dob']));
                array_push($data,$row['bloodGroup']);
                array_push($data,$row['fatherName']);
                array_push($data,$row['fatherCellNo']);
                array_push($data,$row['motherName']);
                array_push($data,$row['motherCellNo']);
                array_push($data,$row['localGuardian']);
                array_push($data,$row['localGuardianCell']);
                array_push($data,$row['presentAddress']);
                array_push($data,$row['parmanentAddress']);
                array_push($data,$row['perPhoto']);

            }
        }
        else
        {
            echo '<script type="text/javascript"> alert("' . $result . '");</script>';
        }

    } else {
        echo '<script type="text/javascript"> alert("' . $msg . '");</script>';
    }


}
if($loginGrp==="UG004"){

    include('./../../smater.php');

}
elseif($loginGrp==="UG003")

{

    include('./../../emaster.php');
}
else
{
    include('./../../master.php');
}
?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header titlehms"><i class="fa fa-hand-o-right"></i>Profile<i class="fa fa-hand-o-left"></i></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3><b>User Information</b></h3>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">

                        <div class="col-lg-4">
                            </div>
                        <div class="col-lg-4">
                            <img src="./../../files/photos/<?php echo $data[17]?>" alt="Avatar" height="220px" class="img-responsive img-rounded proimg" >
                        </div>
                        <div class="col-lg-4">
                        </div>
                    </div>
                </div>

               <hr />
              <div class="row">
        <div class="col-lg-12">

            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Name:</label>
                   <span><?php echo $data[0];?></span>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Student Id:</label>
                    <span><?php echo $data[1];?></span>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Phone NO:</label>
                    <span><?php echo $data[2];?></span>

                </div>

            </div>

        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Email:</label>
                    <span><?php echo $data[3];?></span>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Institute:</label>
                    <span><?php echo $data[4];?></span>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Batch Year:</label>
                    <span><?php echo $data[5];?></span>

                </div>

            </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-lg-12">
            
                    <div class="col-lg-4">
                        <div class="form-group ">
                            <label>Gender:</label>
                            <span><?php echo $data[6];?></span>

                        </div>

                    </div>
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Birth Date:</label>
                    <span><?php echo $data[7];?></span>

                </div>

            </div>
            <div class="col-lg-4">
                        <div class="form-group ">
                            <label>Blood Group:</label>
                            <span><?php echo $data[8];?></span>

                        </div>

                    </div>

                    </div>
                </div>
           
            <div class="row">
                <div class="col-lg-12">
                    
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Father Name:</label>
                    <span><?php echo $data[9];?></span>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Father NO:</label>
                    <span><?php echo $data[10];?></span>

                </div>

            </div>
            <div class="col-lg-4">
                        <div class="form-group ">
                            <label>Mother Name:</label>
                            <span><?php echo $data[11];?></span>
                        </div>

                    </div>

                    </div>
                </div>
            <div class="row">
                <div class="col-lg-12">
                    
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Mother NO:</label>
                    <span><?php echo $data[12];?></span>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Local Guardian:</label>
                    <span><?php echo $data[13];?></span>

                </div>

            </div>
            <div class="col-lg-4">
                        <div class="form-group ">
                            <label>Local Guardian NO:</label>
                            <span><?php echo $data[14];?></span>

                        </div>

                    </div>

                    </div>
                </div>
            <div class="row">
                <div class="col-lg-12">
                    
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Present Addres:</label>
                    <div><?php echo $data[15];?></div>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Parmanent Address:</label>
                    <div><?php echo $data[16];?></div>

                </div>

            </div>
                    <div class="row">
                        <div class="col-lg-12">

        <div class="panel-footer">


        </div>
        </div>
                        </div>
                    </div>

                </div>
           </div>
            </div>



</div>
<!-- /#page-wrapper -->

<?php include('./../../footer.php'); ?>
</div>


