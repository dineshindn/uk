<?php

include '../db.php';
// error_reporting(0);
if (!isset($_SESSION['userid'])) {
   header("Location: index");
} 

$role = $_SESSION['role'];


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="G Talent Pro : G talent pro job website" />
    <meta property="og:title" content="G Talent Pro : G talent pro job website" />
    <meta property="og:description" content="G Talent Pro : G talent pro job website" />
    <!-- <meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png" /> -->
    <meta name="format-detection" content="telephone=no">

    
    <!-- PAGE TITLE HERE -->
    <title>Change Password</title>
    
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="./vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
    
    <!-- Style css -->
    <link href="./css/style.css" rel="stylesheet">
    
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
      

        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
       <?php include('includes/headers.php') ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include('includes/sidebar.php') ?>
        <!--**********************************
            Sidebar end
        ***********************************-->
        
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="d-flex align-items-center mb-4">
                    <h4 class="fs-20 font-w600 mb-0 me-auto">Change Password</h4>
          
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                                    <div class="n-newletter">
                                        <h3 style="font-size: 20px;
                                            text-transform: capitalize;
                                            /*font-family: 'Montserrat', sans-serif;*/
                                            font-weight: 600;
                                            margin: 0 0 30px;
                                            color: #333;">Invite your friends to G Talent Pro</h3> 
                                    </div>
                                        <?php 
                                        $user_id=$_SESSION['userid'];
                                        if($role==1){
                                            $sql = mysqli_query($conn, "SELECT a.id, b.mobile1 as phone FROM users a join employee b on a.employee_id=b.id WHERE a.employee_id='$user_id' ");
                                        }else if($role ==2){
                                            $sql = mysqli_query($conn, "SELECT a.id, b.phone FROM users a join employer b on a.employer_id=b.id WHERE a.employer_id='$user_id' ");
                                        }else if($role == 3){
                                            $sql = mysqli_query($conn, "SELECT a.id, b.phone FROM users a join campus b on a.campus_id=b.id WHERE a.campus_id='$user_id' ");
                                        }else{
                                            $sql = mysqli_query($conn, "SELECT a.id, b.phone FROM users a join mentors b on a.mentor_id=b.id WHERE a.mentor_id='$user_id' ");
                                        }
                                        
                                        $row = mysqli_fetch_assoc($sql);
                                        $ids = $row['id'];
                                        $phone = $row['phone'];
                                        ?>
                                    <div class="input-group">
                                        <div class="col-md-6">
                                            <?php if($role==1){ 
                                                $url = 'https://gtalentpro.com/register?referral="'.$ids.'"&type=employee'; 
                                                ?>
                                                    <input type="text" name="invite" id="invite" value="<?php echo "https://gtalentpro.com/register?referral=".$ids."&type=employee"; ?>" class="form-control" readonly=''>
                                                <?php }else if($role==2){ $url = "https://gtalentpro.com/register?referral=".$ids."&type=employer"; ?>
                                                    <input type="text" name="invite" id="invite" value="<?php echo "https://gtalentpro.com/register?referral=".$ids."&type=employer"; ?>" class="form-control" readonly=''>
                                                <?php }else if($role == 3){ $url = "https://gtalentpro.com/register?referral=".$ids."&type=campus"; ?>
                                                    <input type="text" name="invite" id="invite" value="<?php echo "https://gtalentpro.com/register?referral=".$ids."&type=campus"; ?>" class="form-control" readonly=''>
                                                <?php }else{ $url = "https://gtalentpro.com/register?referral=".$ids."&type=mentor";?>
                                                    <input type="text" name="invite" id="invite" value="<?php echo "https://gtalentpro.com/register?referral=".$ids."&type=mentor"; ?>" class="form-control" readonly=''>
                                                <?php }?>
                                            
                                            
                                        </div>
                                    <div class="col-md-6">

                                        <a href="javascript:void(0);" style="float:left;" onclick="share_link()" class="btn  btn-sm me-3"><img src="images/whatsapp.png" width="40"></a>
                                        <a href="javascript:void(0);" style="float:left;" onclick="myFunction()" class="btn  btn-sm me-3"><img src="images/copy.png" width="40"></a>
                                
                                    </div>

                                </div>
<br>
<br>

                              <!-- List -->
                              
                              <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $userid = $_SESSION['userid']; 
                                        $grant_user = $_SESSION['grant_user'];
                                        $sql="SELECT a.*, b.name as refName FROM `referrals` as a join users b on a.refere_id= b.id WHERE a.user_id='$grant_user' ";
                                        $result = mysqli_query($conn, $sql);
                                        $i=1;
                                        while ($rows = mysqli_fetch_array($result)) {
                                      ?>
                                       <tr>
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo $rows['refName']; ?></td>
                                          <td><?php echo $rows['type']; ?></td>
                                          <td><?php echo $rows['cu_date']; ?></td>
                                      </tr>
                                    <?php $i++; } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        

        
        <!--**********************************
            Footer start
        ***********************************-->
        <?php include('includes/footer.php') ?>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->
        
        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    
    
    <!-- Apex Chart -->
    <script src="./vendor/apexchart/apexchart.js"></script>
    
    
    <!-- <script src="./vendor/popper/popper.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    
    <!-- Chart piety plugin files -->
   <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
   <script src="./js/plugins-init/datatables.init.js"></script>
   <script src="./vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>
    
    
    
    <script src="./js/custom.min.js"></script>
    <script src="./js/dlabnav-init.js"></script>

    <script src="./vendor/select2/js/select2.full.min.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>
    
    <script src="./vendor/ckeditor/ckeditor.js"></script>
    <script>
    $(".form_datetime").datepicker({format: 'yyyy-mm-dd'});
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>

 <script>
    function myFunction() {
      /* Get the text field */
      var copyText = document.getElementById("invite");

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /* For mobile devices */

      /* Copy the text inside the text field */
      navigator.clipboard.writeText(copyText.value);
      /* Alert the copied text */
      alert("Copied referral code: " + copyText.value);
    }

 

    function share_link() {
        var url = document.getElementById('invite').value;
        var url_link1 = "https://api.whatsapp.com/send?text=" + window.encodeURIComponent("*G Talent Pro*\n\n*Job portal website*\n\n URL: "+ url);
        window.open(url_link1, '_blank');
    }
    
</script>


</body>
</html>