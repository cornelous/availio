<?php 
	session_start();
	
	include 'ac-config.inc.php';
	include 'connection.php';
	
	if (isset($_POST['submit'])) {
	
	$user = $_POST['username'];
	$email = $_POST['email'];
	$pass = md5($_POST['password']);
	$state = 1;

	date_default_timezone_set('Africa/Johannesburg');
	$date_visit = date('Y-m-d H:i:s', time());

	$level = 2;

	//CHECKING IF EMAIL EXIST IN DATABASE
	$check_query = "SELECT email FROM bookings_admin_users WHERE email='".$email."' ";
	$check_result = mysql_query($check_query);  

	if(mysql_num_rows($check_result) > 0){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('You have already register with this email address!!!')
							window.location.href='index.php#register'
					</SCRIPT>");
		}else{

			$reg_query = "INSERT INTO bookings_admin_users ( level, username, password, state, date_visit, email ) VALUES 
					  ('$level','$user','$pass', '$state','$date_visit','$email')";
			$reg_result = mysql_query($reg_query);

			 echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('You Have been Registerd, You can now login!')
							window.location.href='admin/index.php'
					</SCRIPT>");
		}


	 }
			

 ?>
<!DOCTYPE html>
<html lang="x-default" class=" enableFluid global-nav-dark region-int no-js">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <title>Availio</title>
    <meta name="description" content="">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <link rel="stylesheet" href="css/common.css">
    
    <link rel="stylesheet" href="css/styles.css">

    <link rel="shortcut icon" href="">
    <script type="text/javascript" src="admin/js/gen_validatorv31.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    
    <script>
		$(document).ready(function(){
			$('a[href^="#"]').on('click',function (e) {
				e.preventDefault();
		
				var target = this.hash;
				$target = $(target);
		
				$('html, body').stop().animate({
					'scrollTop': $target.offset().top
				}, 900, 'swing', function () {
					window.location.hash = target;
				});
			});
		});
	</script>
    
</head>

<body>

<!-- START HEADER -->
    <header id="global-header" class="global-header-dark">
        <div class="global-header-container">
            <div class="global-header-left">
                <a class="global-header-logo" href="index.html" title="Availio - Holiday Availability Calendar">Availio</a>
            </div>
        </div>
    </header>
<!-- END HEADER -->

<!-- START MAIN -->
    <div class="main test-nav-old" role="main">
        
        <!-- START IMAGE CAPTION -->
            <div class="hero hero-2" id="hero">
                <div class="content">
                    <div class="content__main">
                        <h1>Availio is an <span class="underline">FREE</span> online calender and booking<br>system for Guest Houses and Apartments</h1>
        
                        <div class="content__ctas">
                            <a href="#register" class="cta js-play">Register</a>
                            <a href="admin/index.php" class="cta cta--strong">Login</a>
                        </div>
        
                        <div class="content__more-arrow">
                            <a href="#find-out-more">
                                Find out more
                                <div class="content__more-arrow__icon"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <!-- END IMAGE CAPTION -->
    
        <div id="find-out-more"></div>
    
        <!-- START OVERVIEW -->
            <section class="overview section" id="overview">
                <div class="section__description">
                    <div class="b-container">
                        <h2>Get a real-time view of your calendar</h2>
                        <p>Log in online anytime, anywhere on your Mac, PC, tablet or phone and see up-to-date bookings. It's calendar booking software that's simple, smart and occasionally magical.</p>
                    </div>
                </div>
        
                <div class="montage">
                    <div class="montage__center">
                    
                        <!-- START LAPTOP -->
                            <div class="montage__item montage__item--laptop">
                                <div class="montage__image"></div>
            
                                <div class="montage__content">
                                    <svg class="montage__line" width="40" height="46" viewBox="0 0 40 46" xmlns="http://www.w3.org/2000/svg"><path d="M38.166 1.122s-14.403 2.8-25.46 15.823C1.652 29.965 1.835 44.878 1.835 44.878" stroke="#fff" stroke-width="2" opacity=".4" fill="none"></path></svg>
            
                                        <h3 class="montage__heading">Embed On Your Website</h3>
                                        <p>Take the generated code and place your very own calendar onto your website.</p>
            
                                </div>
                            </div>
                        <!-- END LAPTOP -->
        
                        <!-- START PHONE -->
                            <div class="montage__item montage__item--phone">
                                <div class="montage__image"></div>
            
                                <div class="montage__content">
                                    <div class="montage__line"></div>
            
                                        <h3 class="montage__heading">Manage Your Calendars On The Go</h3>
                                        <p>Use your mobile phone or tablet to login and mange your calendar - from anywhere.</p>
            
                                </div>
                            </div>
                        <!-- END PHONE -->
        
                        <!-- START TABLET -->
                            <div class="montage__item montage__item--tablet">
                                <div class="montage__image"></div>
            
                                <div class="montage__content">
                                    <svg class="montage__line" width="26" height="29" viewBox="0 0 26 29" xmlns="http://www.w3.org/2000/svg"><path d="M.844 1.12S9.682 2.837 16.472 10.8c6.79 7.964 6.684 17.078 6.684 17.078" stroke="#fff" stroke-width="2" opacity=".4" fill="none"></path></svg>
            
                                        <h3 class="montage__heading">It's Unlimited</h3>
                                        <p>You can have as many calendars as you want for you rental properties. </p>
            
                                </div>
                            </div>
                        <!-- END TABLET -->
                        
                    </div>
                </div>
            </section>
        <!-- END OVERVIEW -->
    
        <!-- START FEATURES -->
            <section class="features section" id="features">
                <div class="b-container">
                    <div class="section__description">
                        <h2>Popular features that will change your life</h2>
                        <p>Online Booking software that makes it easy to manage your booking calendars and keep track of all your bookings.</p>
                    </div>
                    <ul class="features__list">
                    
                        <!-- START FEATURES CALENDARS -->
                            <li class="feature ">
                                <span class="feature__icon-wrapper">
                                    <img src="images/icon-create-calendars.png" title="Create Calendars" alt="Create Calendars">
                                </span>
                                <a href="#">
                                    <span class="feature__title">Create calendars</span>
                                </a>
                                <div class="feature__description">
                                    Create as many calendars as you need for your properties.
                                </div>
                            </li>
                        <!-- END FEATURES CALENDARS -->
                    
                        <!-- START FEATURES EMBED -->
                            <li class="feature ">
                                <span class="feature__icon-wrapper">
                                    <img src="images/icon-embed.png" title="Embed on your site" alt="Embed on your site">
                                </span>
                                <a href="#">
                                    <span class="feature__title">Embed on your site</span>
                                </a>
                                <div class="feature__description">
                                    Insert a calendar into your website with a few clicks.
                                </div>
                            </li>
                        <!-- END FEATURES EMBED -->
                    
                        <!-- START FEATURES BOOKING -->
                            <li class="feature ">
                                <span class="feature__icon-wrapper">
                                    <img src="images/icon-save-booking.png" title="Save booking details" alt="Save booking details">
                                </span>
                                <a href="#">
                                    <span class="feature__title">Save booking details</span>
                                </a>
                                <div class="feature__description">
                                    Never forget who booked to stay at your property.
                                </div>
                            </li>
                        <!-- END FEATURES BOOKING -->
                    
                        <!-- START FEATURES USER -->
                            <li class="feature ">
                                <span class="feature__icon-wrapper">
                                    <img src="images/icon-users.png" title="User management" alt="User management">
                                </span>
                                <a href="#">
                                    <span class="feature__title">User management</span>
                                </a>
                                <div class="feature__description">
                                    Add users and assign them to one or more calendars.
                                </div>
                            </li>
                        <!-- END FEATURES USER -->            
                    </ul>
                </div>
            </section>
        <!-- END FEATURES -->
        
        <div id="register"></div>
        
        <!-- START REGISTER -->
            <section class="features section register" id="features">
                <div class="b-container">
                    <div class="section__description">
                        <h2>Register for free <span class="section__description__small">- Simply fill out your details below and press the submit button to get registered</span></h2>
                    </div>
                    <form method="POST" action="#" id="regForm">
                        <input name="username" type="text" placeholder="Username" class="register-input" tabindex="1">
                        <input name="email" type="text" placeholder="Email Address" class="register-input" tabindex="2">
                        <input name="password" type="password" placeholder="Password" class="register-input" tabindex="3">
                        <input name="submit" type="submit" value="Register" class="register-btn">
                    </form>
                </div>
            </section>
			<script  type="text/javascript">
				var frmvalidator = new Validator("regForm");

				frmvalidator.addValidation("username","req","Username can not be Empty");
				frmvalidator.addValidation("email","req","Please enter your Email Address");
				frmvalidator.addValidation("email","email","Not a valid Email Address");
				frmvalidator.addValidation("password","req","Password can not be Empty");

			</script>
		
        <!-- END REGISTER -->
    
    </div>
<!-- END MAIN -->

<!-- START FOOTER -->
    <footer id="global-footer" class="global-footer-dark global-footer-normal">
        <div class="global-footer-container">
        
            <!-- START COPYRIGHT -->
                <div class="global-footer-copyright">
                    &copy; 2014 Availio. All rights reserved.
                </div>
            <!-- END COPYRIGHT -->
            
            <!-- START WEBSITE BY -->
                <div class="global-footer-website">
                    <a href="http://www.virtualdesigns.co.za" target="_blank">website designed by virtualdesigns.co.za</a>
                </div>
            <!-- END WEBSITE BY -->
            
        </div>
    </footer>
<!-- END FOOTER -->

</body>
</html>