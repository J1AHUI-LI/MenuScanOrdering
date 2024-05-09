<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'A_head.php'; ?>
</head>
<body>
    <?php include 'A_user_navbar.php'; ?>
    
    <?php
    $session = session();
    $orderSuccessMessage = $session->getFlashdata('order_success_message');
    if ($orderSuccessMessage) {
        echo '<script>alert("' . $orderSuccessMessage . '");</script>';
    }
    ?>

    <!-- Section 1 -->
    <div class="section-1">
        <div class="container">
            <section id="homeSection" class="d-flex justify-content-center">
                <div class="row homeRow">
                    <div class="col-lg-6 homeTxtCol d-flex align-items-center">
                        <div>
                            <h1 class="homeHeading">
                                Discover <br />
                                More <br />
                                Chinese Cuisine
                            </h1>
                            <div class="btn btn-primary mt-4">
                                <a href="<?= base_url('menu_forordering'); ?>" class="btn btn-primary">Find more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 homeImgCol">
                        <img class="homeImg" src="<?= base_url('img/chaoliangpi.webp'); ?>" alt="Chinese Cuisine" />
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- End Section 1 -->

    <!-- Section 2 -->
    <div class="section-2">
        <div class="container">
            <div class="card-group">
                <div class="card">
                    <img src="<?= base_url('img/bg1.jpg'); ?>" class="card-img-top" alt="Category">
                    <div class="card-body">
                    <h5 class="card-title">Mimua</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="<?= base_url('menu_forordering'); ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('img/bg2.jpg'); ?>" class="card-img-top" alt="Category">
                    <div class="card-body">
                    <h5 class="card-title">Lunch</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="<?= base_url('menu_forordering'); ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('img/bg3.jpg'); ?>" class="card-img-top" alt="Category">
                    <div class="card-body">
                    <h5 class="card-title">Dinner</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="<?= base_url('menu_forordering'); ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Section 2 -->

    <!-- Section 3 -->
    <div class="section-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0 mr-auto testimonial-wrap" data-aos="fade-up" data-aos-delay="0">
                    <span class="subtitle">Testimonials</span>
                    <h2 class="mb-5">Satisfied <strong class="text-primary">Customers</strong></h2>
                    <div class="owl-carousel wide-slider-testimonial">
                        <div class="item">
                            <blockquote class="block-testimonial">
                                <div class="author">
                                    <img src="<?= base_url('img/uifaces-popular-image.jpg'); ?>" alt="Customer">
                                    <h3>John Doe</h3>
                                    <p class="position mb-5">CEO, Founder</p>
                                </div>
                                <p>
                                    <div class="quote">“</div>
                                    &ldquo;God bless me get full marks!!!!!!
                                    Thank you marker.&rdquo;
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <span class="subtitle">Galleries</span>
                    <h2 class="mb-5">Photo <strong class="text-primary">Galleries</strong></h2>
                    <div class="row">
                        <div class="col-4 mb-4">
                            <a href="<?= base_url('img/Qishanshaozimian.webp'); ?>" data-fancybox="gallery" class="gal"><img src="<?= base_url('img/Qishanshaozimian.webp'); ?>" alt="Gallery Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4 mb-4">
                            <a href="<?= base_url('img/SpicyCucumber.webp'); ?>" data-fancybox="gallery" class="gal"><img src="<?= base_url('img/SpicyCucumber.webp'); ?>" alt="Gallery Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4 mb-4">
                            <a href="<?= base_url('img/Zhajiangmian.webp'); ?>" data-fancybox="gallery" class="gal"><img src="<?= base_url('img/Zhajiangmian.webp'); ?>" alt="Gallery Image" class="img-fluid"></a>
                        </div>
                        <div class="col-12">
                            <a href="<?= base_url('menu_forordering'); ?>" class="btn btn-primary">More Galleries</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Section 3 -->
    <!-- scripts here -->
    <?php include 'A_script.php'; ?>
</body>
</html>

