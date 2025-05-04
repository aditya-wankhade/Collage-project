<?php include('include/header.php'); ?>
<!-- main header end -->

<!-- Banner start -->
<div class="banner banner-bg" id="particles-banner-wrapper">
    <div id="particles-banner"></div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item item-bg active">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-left">
                    <div class="carousel-content container">
                        <div class="t-center">
                            <h2 data-animation="animated fadeInDown delay-05s">Find Your Dream Properties</h2>
                            <p class="text-p" data-animation="animated fadeInUp delay-10s">
                                This is real estate website is help you to find the best property
                            </p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- Featured properties start -->
<div class="featured-properties content-area-19">
    <div class="container">
        <div class="main-title">
            <h1>Featured Properties</h1>
            <p>Don't Wait to buy real estate ,
                buy real estate and wait.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft delay-04s">
                <div class="card property-box-2">
                    <!-- property img -->
                    <div class="property-thumbnail">
                        <a href="" class="property-img">
                            <img src="assets/img/property-3.jpg" alt="property-3" class="img-fluid">
                        </a>

                    </div>
                    <!-- detail -->
                    <div class="detail">
                        <h5 class="title"><a href="">Sweet Family Home</a></h5>
                        <h4 class="price">

                        </h4>
                        <p>Home is where you are surrounded by love laughter, and joyful memories.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp delay-04s">
                <div class="card property-box-2">
                    <!-- property img -->
                    <div class="property-thumbnail">
                        <a href="" class="property-img">
                            <img src="assets/img/property-7.jpg" alt="property-7" class="img-fluid">
                        </a>

                    </div>
                    <!-- detail -->
                    <div class="detail">
                        <h5 class="title"><a href="">Relaxing Apartment</a></h5>
                        <h4 class="price">

                        </h4>
                        <p>The perfect location for your lifestyle , Live in the heart of the city</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp delay-04s">
                <div class="card property-box-2">
                    <!-- property img -->
                    <div class="property-thumbnail">
                        <a href="" class="property-img">
                            <img src="assets/img/property-5.jpg" alt="property-5" class="img-fluid">
                        </a>

                    </div>
                    <!-- detail -->
                    <div class="detail">
                        <h5 class="title"><a href="">Villas</a></h5>
                        <h4 class="price">

                        </h4>
                        <p>A loving atmosphere in your home is the foundation for your life..</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInRight delay-04s">
                <div class="card property-box-2">
                    <!-- property img -->
                    <div class="property-thumbnail">
                        <a href="" class="property-img">
                            <img src="assets/img/property-1.jpg" alt="property-1" class="img-fluid">
                        </a>

                    </div>
                    <!-- detail -->
                    <div class="detail">
                        <h5 class="title"><a href=>Real Luxury Villa</a></h5>
                        <h4 class="price">

                        </h4>
                        <p>A house is made of walls and beams; a home is built with love and dreams.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featured properties end -->


<!-- Recent Properties start -->
<div class="recent-properties content-area-2">
    <div class="container">
        <div class="main-title">
            <h1>Recent Properties</h1>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
        </div>
        <div class="row">

            <div class="row">
                <?php
                include 'include/config.php';
                $query1 = mysqli_query($con, "select * from admin");
                $admin = mysqli_fetch_array($query1);

                $u_name = ucfirst($admin['name']);

                $query = mysqli_query($con, "select * from property");
                while ($res = mysqli_fetch_array($query)) {
                    $id = $res['id'];
                    $img = $res['image'];

                ?>
                    <div class="col-lg-5 col-md-6 col-sm-6 wow fadeInUp delay-04s">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <div class="tag button alt featured">Featured</div>
                                    <div class="price-ratings-box">
                                        <p class="price">
                                            Rs <?php echo $res['price']; ?>
                                        </p>

                                    </div>
                                    <img src="admin/images/20161005213936-rental-homes-balconies.jpeg" alt="property-1" class="img-fluid">
                                </a>
                                <div class="property-overlay">
                                    <a href="properties-details.php?id=<?php echo $id; ?>" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <!-- <a class="overlay-link property-video" title="Test Title">
                                <i class="fa fa-video-camera"></i>
                            </a>-->
                                    <div class="property-magnify-gallery">
                                        <a href="admin/images/property_image/<?php echo $img; ?>" class="overlay-link">
                                            <i class="fa fa-expand"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="properties-details.php?id=<?php echo $id; ?>"><?php echo $res['title']; ?></a>
                                </h1>
                                <div class="location">
                                    <a href="properties-details.php?id=<?php echo $id; ?>">
                                        <i class="fa fa-map-marker"></i><?php echo $res['address']; ?>
                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-bed"></i> <?php echo $res['bedroom']; ?> : Bedroom
                                    </li>
                                    <li>
                                        <i class="flaticon-bath"></i> <?php echo $res['hall']; ?> : Hall
                                    </li>
                                    <li>
                                        <i class="flaticon-square-layouting-with-black-square-in-east-area"></i><?php echo $res['sqr_price']; ?> Sq Ft
                                    </li>
                                    <li>
                                        <i class="fa fa-coffee"></i> <?php echo $res['kichan']; ?> : kitchen
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                                <a href="#">
                                    <i class="fa fa-user"></i> <?php echo $u_name; ?>
                                </a>
                                <span>

                                </span>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>
    </div>
</div>
<!-- Recent Properties end -->


<!-- Testimonial 2 start -->
<div class="testimonial-2 overview-bgi" style="background-image: url(assets/img/testimonial-property.jpg)">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="testimonial-inner">
                    <header class="testimonia-header">
                        <h1>Testimonial</h1>
                    </header>
                    <div id="carouselExampleIndicators7" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="avatar">
                                            <!-- <img src="assets/img/avatar/avatar-2.jpg" alt="avatar-2" class="img-fluid rounded"> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <p class="lead">
                                            "For us, This is very helpful website for searching a perfect combination of lifestyle & affordable pricing for the Home"
                                        </p>
                                        <div class="author-name">
                                            Gaurav khade
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star-half-full"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="avatar">
                                            <!-- <img src="assets/img/avatar/avatar.jpg" alt="avatar" class="img-fluid rounded"> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <p class="lead">
                                            "There are no words to express my huge gratitude you to you and to Teena for the advice you provided and for
                                            being so accommodating and responsive to all the requests regarding the properties I viewed and particularly the property I bought. </p>
                                        <div class="author-name">
                                            pratik bodade
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star-half-full"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="avatar">
                                            <!-- <img src="assets/img/avatar/avatar-3.jpg" alt="avatar-3" class="img-fluid rounded"> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <p class="lead">
                                            "Thank you so much for the great service you provided us throughout the settlement process. You made it so carefree and easy
                                            for us throughout the whole process. If we knew it was that easy to buy a house, we would have done it sooner!
                                        </p>
                                        <div class="author-name">
                                            Aditya wankhade
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star-half-full"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleIndicators7" role="button" data-slide="prev">
                            <span class="slider-mover-left" aria-hidden="true">
                                <i class="fa fa-angle-left"></i>
                            </span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators7" role="button" data-slide="next">
                            <span class="slider-mover-right" aria-hidden="true">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br /><br /><br /><br />
<!-- Testimonial 2 end -->





<!-- Footer start -->
<?php include('include/footer.php'); ?>