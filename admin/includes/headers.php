
<style type="text/css">
	 @media only screen and (max-width: 600px) {
            .display_menu{
            	display: none !important;
            }
            .logo-w{
            	width: 45px !important;
            }
        }
    .me2{
    	    margin-right: 2.5rem !important;
		    font-weight: 600;
		    font-size: 15px;
    }
    .logo-w{
            	width: 100px;
            }
</style>
    <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="dashboard" class="brand-logo">
			<img src="images/Logo.png" alt="" class="logo-w">
            </a>
            <div class="nav-control">
                <div class="hamburger ">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
 <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							
                        </div>
                        <ul class="navbar-nav header-right">
	

					
							<?php

							$user_id = $_SESSION['userid'];
							$role = $_SESSION['role'];

							if($role == 1){
								$query="SELECT a.name, a.dob, h.profile_image as photos FROM `employee` a left join temp_profile_image h on h.id=a.photo where a.id='$user_id'  ";
							    $run_query = mysqli_query($conn, $query);
							    $row_photo = mysqli_fetch_array($run_query);
							}

							?>
							<li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <?php if($role==1){ if($row_photo['photos']){ ?>
                                    	<img src="<?php echo "../".$row_photo['photos'];?>" width="20px">
                                    	<span style="margin-left: 10px; font-weight: 600;"><?php echo $row_photo['name']; ?></span>
                                	<?php }else{ ?>
                                		<img src="images/profile/pic1.jpg" width="20" alt=""/>
                                	<?php } }else{ echo '<img src="images/profile/pic1.jpg" width="20" alt=""/>';}?> 
                                	
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">

                                    <a href="<?php if($role==2){ echo "employer_profile";}else if($role==1){ echo "profile";}else if($role==3){ echo "campus-profile"; }?>" class="dropdown-item ai-icon">
                                        <svg id="icon-user2" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">Profile </span>
                                    </a> 
                                   
                                    <a href="../logout" class="dropdown-item ai-icon">
                                        <svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>