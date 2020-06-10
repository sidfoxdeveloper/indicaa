<?php
   $adminEmail = "info@jhkinfotech.com";
   //$adminEmail = "jhkinfotech@gmail.com";
    
    //**************** Form ******************//     
    if( isset($_POST["serviceForm"]) && $_POST["serviceForm"] == "serviceForm") {
            
        if( isset($_POST["email"]) && !empty($_POST['email']) && isset($_POST["user_name"]) && !empty($_POST['user_name']) ) {

            // Build POST request:
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = '6Ldjjf0UAAAAALe69lLQKacBaz1Qcgzb9_d4r4kX';
            $recaptcha_response = $_POST['recaptcha_response'];

            // Make and decode POST request:
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
            $recaptcha = json_decode($recaptcha);

            // Take action based on the score returned:
            if ($recaptcha->score >= 0.5) {
                
                // Verified - send email
                $htmlmessage1 = '<h3 style="text-align:center;">Client Query Details</h3>';
                $htmlmessage1 .= '<br><br>';  

                $htmlmessage1 .= '<li style="list-style:none;">
                                    <span class="ul-li-span1" style="display:inline-block; float:left; font-family: "robotobold"; font-size:16px; color:#ef5438; line-height:1.5; padding: 5px 0px;"><strong>User Name: </strong></span>
                                    <span class="ul-li-span2" style="display:inline-block; float:left;  font-size:16px; line-height:1.5; color:#161616;font-family: "robotomedium";padding: 5px 0px;">&nbsp;'.$_POST['user_name'].'</span>
                                </li>';
                $htmlmessage1 .= '<li style="list-style:none;">
                                    <span class="ul-li-span1" style="display:inline-block; float:left; font-family: "robotobold"; font-size:16px; color:#ef5438; line-height:1.5; padding: 5px 0px;"><strong>Email: </strong></span>
                                    <span class="ul-li-span2" style="display:inline-block; float:left;  font-size:16px; line-height:1.5; color:#161616;font-family: "robotomedium";padding: 5px 0px;">&nbsp;'.$_POST['email'].'</span>
                                </li>';
                $htmlmessage1 .= '<li style="list-style:none;">
                                    <span class="ul-li-span1" style="display:inline-block; float:left; font-family: "robotobold"; font-size:16px; color:#ef5438; line-height:1.5; padding: 5px 0px;"><strong>Description : </strong></span>
                                    <span class="ul-li-span2" style="display:inline-block; float:left;  font-size:16px; line-height:1.5; color:#161616;font-family: "robotomedium";padding: 5px 0px;">&nbsp;'.$_POST['description'].'</span>
                                </li>';

                $body = $htmlmessage1;
                $customeEmail = trim($_POST['email']);
                $subject = 'New Client Inquiry';

                $to = $adminEmail;
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
                $headers .= 'From:JHK Infotech Pvt Ltd <noreply@jhkinfotech.com">\r\n';
                $result = mail($to, $subject, $body, $headers);

                if($result) {

                    $htmlmessage1C = '<h3 style="text-align:center;">Thank you for connect with JHK Infotech. We will reply you asps</h3>';
                    $htmlmessage1C .= '<br><br>';
                    $bodyC = $htmlmessage1C;

                    $to = $customeEmail;
                    $subject = 'Thank You for connect with us.';
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
                    $headers .= 'From:JHK Infotech Pvt Ltd <noreply@jhkinfotech.com">\r\n "';
                    
                    mail($to, $subject, $bodyC, $headers); 

                    $_SESSION["status"] = "success";    

                } else {
                    $_SESSION["status"] = "error";
                }
                
            }
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Web Development, Web Design, Magento Developer, Wordpress Developer, Android Developer, IOS Developer, IT Partners, Laravel Developer, PHP Developer</title>
    <meta name="description" content="One Of The Leading IT Company Which Holds More Than 400 Clients World Wide. It Helps To Convert Your Idea into Real Life by Giving it Digital Look. There are Excellent  & Skillful Developers and Designer Who are Always Ready to Help You and Give You Support. It Provides Number Of IT Services Like: Web Development, Web Designing, Mobile APPs, Maintenance, Support and Many more. Let you Take on a  Drive in Web World." />

    <?php include 'include/header-files.php'; ?>
    
    <script src="https://www.google.com/recaptcha/api.js?render=6Ldjjf0UAAAAAMc-eK69O5zkfqKeFjAwlpc0aoZB"></script>
    <script>    
        grecaptcha.ready(function () {
            grecaptcha.execute('6Ldjjf0UAAAAAMc-eK69O5zkfqKeFjAwlpc0aoZB', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
    
</head>

<body>

    <!-- Include Header -->
    <?php include 'include/header.php';?>
    <!-- Include Header End -->

    <!-- Home Page Slider -->
    <?php include 'include/home-slider.php';?>
    <!-- Home Page Slider End -->


    <!-- Welcome JHK Part -->
    <section class="welcomeJhkMain" id="aboutUs">

        <div class="container">

            <div class="row">

                <div class="col-md-12 col-lg-5">
                    <div class="welcomeJhk">
                        
                        <div class="jhkTitle">
                            <h1 class="bold1">
                                <small class="upper">Hello,</small>
                                <span class="upper">Welcome to <span class="skyBlue1">jhk</span></span>
                            </h1>
                            <!-- <p>Web Designing & Development Company in Rajkot</p> -->
                        </div>

                        <p class="font2">As a trustworthy Web Service Provider Company, we Assure Our Clients to Give them Our Best. We Provide Solution from Startup to Enterprise level Company. We are Immensely Dedicated to Our Services that fulfill Business Requirements Of Clients and We built Trustful & Long term alliance with Them.</p>
                        <a href="<?php echo URL_BASE.'/'.SEO_ABOUTUS;?>" class="btn btn1 upper bold1" title="Read More Information">Read More</a>
                    </div>

                </div>

                <div class="col-md-12 col-lg-7">

                    <div class="imageFrameOne">

                        <div class="imageFrameOneImage">
                            <img src="images/1.webp" onerror="this.onerror=null; this.src='images/1.jpg';" class="img-fluid" alt="Introduction about JHK Infotech." />
                        </div>

                        <div class="imageFrameOneImageBg">
                            <img src="images/2.webp" onerror="this.onerror=null; this.src='images/2.jpg';" class="img-fluid" alt="Introduction about JHK Infotech." />
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- Welcome JHK Part End -->


    <!-- Our Service Slider Part Start -->
    <?php include 'include/our-service-slider.php';?>
    <!-- Our Service Slider Part End -->

    
    <!-- Our Works Part Start -->
    <section class="ourWorks" id="our-Work">
        <div class="container position-relative">
            
            <div class="row row9 align-items-end">

                <div class="col-md-12 col-lg-6 mb-3 mb-lg-0">
                    <h2 class="leftWhite">
                        <span>Our Works</span>
                        <small class="normal font2">We are committed to providing our customers with exceptional service while offering our employees the best training.</small>
                    </h2>
                    <a href="https://pickeringtoyota.com/" target="_blank">
                        <div class="ourWorkImage">
                            <div class="galleryImage1">
                                <img src="images/ourWork1.webp" onerror="this.onerror=null; this.src='images/ourWork1.jpg';" class="img-fluid" alt="Projects Developed by JHK." />
                            </div>

                            <div class="overlay">
                                <span class="plusIcon">+</span>
                                <h4 class="font2">Custom CRM</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-12 col-lg-6">
                    
                    <div class="row row9">

                        <div class="col-md-4 col-lg-12 mb-3">
                            
                            <a href="http://www.arabgamex.com/" target="_blank">
                                <div class="ourWorkImage">
                                    <div class="galleryImage2">
                                        <img src="images/ourWork2.webp" onerror="this.onerror=null; this.src='images/ourWork2.jpg';" class="img-fluid" alt="Projects Developed by JHK." />
                                    </div>

                                    <div class="overlay">
                                        <span class="plusIcon">+</span>
                                        <h4 class="font2">Design</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-6 mb-3 mb-lg-0">
                            <a href="https://www.cloudmatika.co.id/" target="_blank">
                                <div class="ourWorkImage">
                                    <div class="galleryImage3">
                                        <img src="images/ourWork3.webp" onerror="this.onerror=null; this.src='images/ourWork3.jpg';" class="img-fluid" alt="Projects Developed by JHK." />
                                    </div>

                                    <div class="overlay">
                                        <span class="plusIcon">+</span>
                                        <h4 class="font2">Custom CRM</h4>
                                    </div>

                                </div>
                            </a>
                        </div>
                        
                        <div class="col-sm-6 col-md-4 col-lg-6 mb-3 mb-lg-0">
                            <a href="https://nasnah.com/" target="_blank">
                                <div class="ourWorkImage">

                                    <div class="galleryImage3">
                                        <img src="images/ourWork4.webp" onerror="this.onerror=null; this.src='images/ourWork4.jpg';" class="img-fluid" alt="Projects Developed by JHK." />
                                    </div>

                                    <div class="overlay">
                                        <span class="plusIcon">+</span>
                                        <h4 class="font2">Custom CRM</h4>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-5">                
                <a href="<?php echo URL_BASE.'/'.SEO_OUR_WORK;?>" class="btn btn2 upper bold1" title="IT Projects">View All</a>
            </div>

        </div>
    </section>
    <!-- Our Works Part End -->


    <!-- Welcome JHK Part -->
    <section class="welcomeJhkMain" id="ourClient">

        <div class="container">

            <div class="row">

                <div class="col-md-12 col-lg-7">
                    <div class="imageFrameOne imageFrameTwo">
                        <div class="imageFrameOneImage">
                            <img src="images/clientFront.webp" onerror="this.onerror=null; this.src='images/clientFront.jpg';" alt="five Star Reviews of JHK" class="img-fluid" />                            
                        </div>
                        
                        <div class="imageFrameOneImageBg">
                            <img src="images/clientBack.webp" onerror="this.onerror=null; this.src='images/clientBack.jpg';" alt="five Star Reviews of JHK" class="img-fluid" />
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-5">

                    <div class="clientsTrusted font2">
                        <h3>We are Trusted by More<br />Than <span class="skyBlue1">300<sup>+</sup></span> Clients</h3>

                        <div class="quoteIconAndLine"><span><i class="fas fa-quote-left skyBlue1"></i></span></div>

                        <div class="clientsTrustedCarousel owl-carousel owl-theme">
                            <div class="item">
                                <p>We have Wide list of Our Clients in Each Corner Of the world. We have Built Strong & Trustful Alliance with Our Them.</p>
                            </div>
                            <div class="item">
                                <p>We always Support them in Need of them, We suggest them To go in Right Direction to choose Right Technology for their Business Requirements.</p>
                            </div>
                            <div class="item">
                                <p>We Help those who Not able to Figure out their Own Future Requirements about the Business.</p>
                            </div>
                            <div class="item">
                                <p>Our Clients Positive Reviews Motivate Us to Boost Our Skill and Do Our Best Of Best. We Always Upgrade Our Expertise with New Innovative Ideas.</p>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <a href="<?php echo URL_BASE.'/'.SEO_OUR_CLIENT; ?>" class="link02 font-14 upper bold" title="Client Reviews">View All<i class="fas fa-arrow-alt-circle-right pl-1"></i></a>
                        </div>

                    </div>

                </div>

                

            </div>

        </div>

    </section>
    <!-- Welcome JHK Part End -->


    <!-- Getin Touch And Newsletter Part -->
    <section class="getinTouchAndNewsletter">
        <div class="container-fluid px-0">

            <div class="row noSpace align-self-start">

                <div class="col-md-12 col-lg-6">

                    <div class="getinTouchPart">
                        <div class="getinTouchAndNewsletterData">
                            <h3>Follow Us</h3>
                            <p class="font2">Find Us and Stay Connected with us on <br />Given Social Platform.</p>

                            <div class="getinTouchSocial">
                                <a rel="nofollow" title="JHK Facebook Profile" target="_blank" href="https://www.facebook.com/JHKINFOTECH"><i class="fab fa-facebook-f"></i></a>
                                <a rel="nofollow" title="JHK Twitter Profile" target="_blank" href="https://twitter.com/InfotechJhk"><i class="fab fa-twitter"></i></a>
                                <a rel="nofollow" title="JHK LinkedIn Profile" target="_blank" href="https://www.instagram.com/jhkinfotech/"><i class="fab fa-instagram"></i></a>
                                <a rel="nofollow" title="JHK Instagram Profile" target="_blank" href="https://www.linkedin.com/company/jhkinfotech"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-12 col-lg-6">

                    <div class="NewsletterPart">
                        <div class="getinTouchAndNewsletterData">
                            <h3>Get in Touch</h3>
                            <p class="font2">Let us Keep Giving you Updates About <br />Our Latest News On your Email Id</p>
                            <form action="" method="post" id="getInTouch" name="getInTouch" class="formOne row row6" >
                                
                                <input type="hidden" name="serviceForm" value="serviceForm" />
                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                                
                                <div class="form-group col-md-6 col-lg-6">
                                    <input type="text" class="form-control" placeholder="Name *" name="user_name" id="user_name" required >
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <input type="email" class="form-control" placeholder="Email *" name="email" id="email" required >
                                </div>
                                <div class="form-group col-md-6 col-lg-12">
                                    <textarea class="form-control h-auto" rows="3" placeholder="What are you Looking For ? *" name="description" id="description" required ></textarea>
                                </div>
                                
                                <div class="col-md-6 col-lg-12 mt-2">
                                    <button type="submit" id="submit_button" class="btn btn4 bold1 upper g-recaptcha"  >
                                        <i class="fas fa-envelope normal pr-2"></i>Send
                                    </button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Getin Touch And Newsletter End -->

<!-- All Script -->
<?php include 'include/footer-files.php';?>    

<!-- Include Footer -->
<?php include 'include/footer.php';
if($_SESSION["status"] == "success"): ?>
    <script>
        swal('Thank You!', "Your request send successfully", "success");
    </script>
<?php 
endif;
if($_SESSION["status"] == "error"):
?>
    <script>
        swal({ title:"Oops!", text:"Your request could not sent, please try again", type:"error" });
    </script>
<?php    
endif;

unset($_SESSION["status"]);
unset($_SESSION);

session_unset();

?>
<!-- Include Footer End -->

</body>
</html>