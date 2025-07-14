<!-- Hero Slider Area -->
<?php

use app\models\Company;
use app\models\Projectavailabilities;
use app\models\Projectimages;
use app\models\Slider;

?>
<style type="text/css">
.default-text-content ul li {
    margin: 0;
    padding: 0;
    list-style: square !important;
}

.default-text-content li {
    margin-left: 20px;
}
</style>
<!-- Hero Slider Area end -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php
        $i      = 1;
        $slider = Slider::find(['slid_isactive' => 1])->all();
        foreach ($slider as $sl) {
            ?>
        <div class="carousel-item <?php if ($i == 1)
                echo 'active'; ?>">
            <img src="<?php echo Yii::$app->request->baseUrl . $sl->slid_url; ?>" class="d-block w-100" alt="...">
            <!-- <div class="carousel-caption d-none d-md-block">
                <h5 style="color:#fff;"><span style="color:#c40000;">Find Your Dream</span> Home for Living</h5>
                <p style="color:#fff">It is a long established fact that a reader will be distracted by the readable
                    content of a
                    page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of
                    letters, as opposed</p>
            </div> -->
        </div>
        <?php $i++;
        } ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- About us section -->
<section class="about-us-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12 wow fadeInRight" data-wow-delay="0.3s">
                <div class="about-us-content">
                    <h3><span class="text-center">
                            DNG Builders
                        </span></h3>
                    <p>DNG Group is a well-established and reputable brand in the Real Estate Sector with a rich history
                        of providing exceptional services to its customers over the past 21 years. The group has a
                        significant presence in the Real Estate Sector in CENTRAL INDIA and is dedicated to offering
                        affordable housing solutions to a wide range of customers.</p>
                    <p>The journey of the DNG Group began with the establishment of two firms, "DNG BUILDER" and “DNG
                        BUILDCON,” led by visionary entrepreneurs Mr. Deepak Agrawal and Mr. Gaurav Agrawal in November
                        2002 and November 2012, respectively. Since their inception, these firms have successfully
                        completed numerous construction projects, showcasing their commitment to quality and excellence.
                    </p>
                    <p>Over the years, DNG Group has accomplished many construction projects, focusing on delivering
                        exceptional results. Their expertise extends to various construction activities, reflecting
                        their versatility and adaptability in the real estate industry.</p>
                    <p>Notably, DNG Group has played a crucial role as a contractor for various educational institutes,
                        corporate firms, and the Government of Madhya Pradesh. Their involvement in these projects
                        underscores their capability to handle projects of various sizes and complexities.</p>
                    <p>In addition to these prestigious projects, DNG Group has undertaken the construction of flats,
                        singles, and duplex units at multiple sites, contributing to the growth and development of
                        CENTRAL INDIA's real estate landscape. Their commitment to quality, innovation, and customer
                        satisfaction has been evident in these endeavours.</p>
                    <p>Some of the prominent works undertaken by DNG Group include:</p>
                    <div class="default-text-content">
                        <ul>
                            <li>
                                <strong>Educational Institutes:</strong> DNG Group has been a trusted partner for
                                educational institutions,
                                ensuring the construction of modern and functional campuses to foster the growth of the
                                region's education sector.
                            </li>
                            <li>
                                <strong>Corporate Firms:</strong> They have successfully completed
                                projects for corporate clients, delivering commercial spaces that meet businesses'
                                specific
                                needs and standards.
                            </li>
                            <li>
                                <strong>Government of Madhya Pradesh:</strong> DNG Group's
                                collaboration with the government signifies their contribution to public infrastructure
                                and
                                development, strengthening the region's infrastructure.
                            </li>
                            <li>
                                <strong>Residential Projects:</strong> DNG Group has also
                                ventured into the residential sector, building flats, singlex, and duplex units,
                                offering
                                comfortable and affordable housing solutions for the community.
                            </li>
                        </ul>
                    </div>
                    <p>DNG Group's extensive experience, dedication to quality, and diverse project portfolio make them
                        a prominent and trusted player in the Real Estate Sector in CENTRAL INDIA. Their commitment to
                        excellence and their track record of successful projects have earned them a solid reputation in
                        the industry.</p>
                    <a href="<?= Yii::$app->urlManager->createUrl(["web/aboutus"]); ?>" class="def-btn">Read More</a>
                </div>
            </div>
        </div><br><br>
        <div class="row">
            <!-- about us img -->
            <div class="col-lg-12 col-xl-12 wow fadeInLeft" data-wow-delay="0.3s">
                <div class="about-us-img">
                    <?php
                    $images = Projectimages::get_random_image(6);
                    foreach ($images as $image) {
                        if (!empty($image->pimg_url)) {
                            ?>
                    <img src="<?= Yii::$app->request->baseUrl; ?><?= $image->pimg_url; ?>" class="sm-img"
                        alt="About us image">
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- about us img end -->
            <!-- about us content area -->
            <!-- about us content area end -->
        </div>
    </div>
</section>
<!-- About us section end -->

<!-- Top Properties Area -->
<section class="top-properties-area pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center text-center">
            <!-- Section Title -->
            <div class="col-md-10 col-lg-8 col-xl-6  wow fadeInUp" data-wow-delay="0.3s">
                <div class="section-title">
                    <h2>Our Projects</h2>
                    <p>Since 29th of Nov 2002 in this little time we have achieved many of war footing jobs targets in
                        different types of construction activities. </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row top-properties-slider">

        </div>
    </div>
</section>
<!-- Top Properties Area end -->
<!-- Modal HTML -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #ff000073; margin-top:108px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="margin-left:128px; color:white;">Send Us a Message
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="contact-us-form" id="contact-form" method="post">
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
                        <div class="col-md-12 form-group">
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
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#myModal').modal('show');
    $('#contact-form').submit(function(e) {
        e.preventDefault();
    });

});
</script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    $('#submit_form').click(function() {
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
        var dataString = "&name=" + name + "&mobileno=" + mobileno + "&email=" + email + "&message=" +
            message;
        // alert(dataString);

        // return false;
        var url = "<?php echo \Yii::$app->getUrlManager()->createUrl('web/contact_mail'); ?>";
        $.post(url, dataString, function(res) {
            if (res.msg == 'success') {
                $('#success_msg').show();
                $('#success_msg').html(res.data);
                $('#success_msg').fadeOut(6000);
                $('#contact-form')[0].reset();
                setInterval(function() {
                    $('#myModal').modal('hide');
                }, 6000);
            }
        });
    });
});
</script>