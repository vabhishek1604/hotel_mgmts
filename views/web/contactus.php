<?php

use app\models\Slider;
use app\models\Company;

?>

<!-- Hero Banner -->
<section class="hero-banner-wrapper background-image"
    data-src="<?php echo Yii::$app->request->baseUrl . Slider::get_random_image(); ?>">
    <div class="container">
        <!-- Banner Content -->
        <div class="banner-content text-center wow fadeInUp" data-wow-delay="0.3s">
            <h2>Contact Us</h2>
            <!-- Breadcrumb -->
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="<?= Yii::$app->urlManager->createUrl(["web/index"]); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"><a
                        href="<?= Yii::$app->urlManager->createUrl(["web/contactus"]); ?>">Contact
                        Us</a></li>
            </ol>


        </div>
        <!-- Banner Content end -->
    </div>
</section>
<!-- Hero Banner end -->


<!-- Contact Info Wrap -->
<div class="contact-info-wrapper">
    <div class="container">
        <div class="row no-gutters justify-content-center">
            <!-- single contact info -->
            <div class="col-sm-8 col-md-4  wow fadeInLeft" data-wow-delay="0.3s">
                <div class="single-contact-info d-flex align-items-center">
                    <div class="contact-info-icon">
                        <span><i class="fas fa-phone-volume"></i></span>
                    </div>
                    <div class="contact-info-content">
                        <a href="tel:+919300221111">
                            +91-9300221111
                        </a>
                    </div>
                </div>
            </div>
            <!-- single contact info end -->
            <!-- single contact info -->
            <div class="col-sm-8 col-md-4  wow fadeInUp" data-wow-delay="0.3s">
                <div class="single-contact-info d-flex align-items-center ">
                    <div class="contact-info-icon">
                        <span><i class="far fa-envelope-open"></i></span>
                    </div>
                    <div class="contact-info-content">
                        <a href="mailto:<?php echo Company::getCompanyData('official_email_id'); ?>">
                            <?php echo Company::getCompanyData('official_email_id'); ?>
                        </a>
                    </div>
                </div>
            </div>
            <!-- single contact info end -->
            <!-- single contact info -->
            <div class="col-sm-8 col-md-4  wow fadeInRight" data-wow-delay="0.3s">
                <div class="single-contact-info d-flex align-items-center">
                    <div class="contact-info-icon">
                        <span><i class="fas fa-map-marked-alt"></i></span>
                    </div>
                    <div class="contact-info-content">
                        <p>
                            <strong>DNG Head office: </strong>DNG Group Tulips 08, 2nd Floor B Block, Johnson Tower,
                            Narmada Road,
                            Jabalpur.
                        </p>
                    </div>
                </div>
            </div>
            <!-- single contact info end -->

        </div>
    </div>
</div>
<!-- Contact Info Wrap end -->


<!-- Contact form -->
<div class="contact-form-wrapper pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-lg-10 col-xl-8  wow fadeInUp" data-wow-delay="0.3s"
                style="background-color: #ed3237b3; border-radius: 6px; padding: 15px;">
                <form class="contact-us-form" id="contact-form" method="post">
                    <h5>Send Us a Message</h5>
                    <div class="row">
                        <!-- Single Input -->
                        <div class="col-md-6 form-group">
                            <label class="sr-only">Your Name</label>
                            <input type="text" placeholder="YOUR NAME" name="name" id="name">
                        </div>
                        <!-- Single Input -->
                        <div class="col-md-6 form-group">
                            <label class="sr-only">YOUR CONTACT NUMBER</label>
                            <input type="number" placeholder="YOUR CONTACT NUMBER"
                                onKeyPress="if(this.value.length==10) return false;" name="mobileno" id="mobileno">
                        </div>
                        <!-- Single Input -->
                        <div class="col-md-6 form-group">
                            <label class="sr-only">Your Email</label>
                            <input type="email" placeholder="YOUR EMAIL" name="email" id="email">
                        </div>
                        <!-- Single Input -->
                        <!-- <div class="col-md-6 form-group">
                            <label class="sr-only">Subject</label>
                            <input type="text" placeholder="SUBJECT" name="subject" id="subject">
                        </div> -->
                        <!-- Single Input -->
                        <div class="col-12 form-group">
                            <label class="sr-only">Your Message</label>
                            <textarea cols="30" rows="10"
                                placeholder="WHICH TYPE OF PROPTERTY YOU ARE SEARCHING FOR...."
                                name="message"></textarea>
                        </div>
                        <!-- Single Input -->
                        <div class="col-12 form-group text-center mb-0">
                            <button type="button" class="def-btn" id="submit_form">Send
                                Now</button>
                        </div>
                    </div>
                </form>

            </div>
            <div id="success_msg"></div>
        </div>


    </div>

</div>

<!-- Contact form end -->

<!-- Contact Map -->
<iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3668.442297296849!2d79.92593827531778!3d23.154051979081913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3981adfd62fcfff5%3A0x3feb075ed48f2b10!2sDNG%20GROUP%20TULIPS%2008%202ND%20FLOOR%20B%20BLOCK%20JOHNSON%20TOWER%20NARMADA%20ROAD!5e0!3m2!1sen!2sin!4v1704195997733!5m2!1sen!2sin"
    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>
<!-- Contact Map End -->

<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
        $('#submit_form').click(function () {
            var name = $("#name").val();
            if (name == "") {
                alert("Name Required");
                $("#name").focus();
                return false;
            }

            // var subject = $("#subject").val();
            // if (subject == "") {
            //     alert("Subject Required");
            //     $("#subject").focus();
            //     return false;
            // }

            var email = $("#email").val();
            var preg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
            if (email == "") {
                alert("Email Required");
                $("#email").focus();
                return false;
            } else if (preg.test(email) == false) {
                alert("Email Not Valid");
                $("#email").focus();
                return false;
            }

            var mobileno = $("#mobileno").val();
            if (mobileno == "") {
                alert("Mobile No. Required");
                $("#mobileno").focus();
                return false;
            }

            var subject = $("#subject").val();
            var message = $("#form_message").val();
            var dataString = "&name=" + name + "&mobileno=" + mobileno + "&email=" +
                email + "&message=" +
                message;
            // alert(dataString);

            // return false;
            var url = "<?php echo \Yii::$app->getUrlManager()->createUrl('web/contact_mail'); ?>";
            $.post(url, dataString, function (res) {
                if (res.msg == 'success') {
                    $('#success_msg').show();
                    $('#success_msg').html(res.data);
                    $('#success_msg').fadeOut(6000);
                    $('#contact_form')[0].reset();
                }

            });
        });
    });
</script>