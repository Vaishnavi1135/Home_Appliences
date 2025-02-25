<!-- <div class="container-xxl  wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="text-center">
                <h6 class="text-secondary text-uppercase">Testimonial</h6>
                <h1 class="mb-0">Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="<?php echo base_url();?>/assets/img/images (2).jpeg" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Priya</h5>
                        </div>
                    </div>
                    <p class="mb-0">"Porter's team was punctual, caring, and highly professional. Their self-sufficiency and humility impressed me, along with great customer support. Thank you!"
                    </p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="<?php echo base_url();?>/assets/img/images (5).jpeg" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Sita</h5>
                            
                        </div>
                    </div>
                    <p class="mb-0">"Smooth experience with Porter's packers and movers! The team was fantastic, handling every detail. Highly recommend their services!"
                    </p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="<?php echo base_url();?>/assets/img/images (4).jpeg" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Rohit</h5>
                            
                        </div>
                    </div>
                    <p class="mb-0">"Grateful for the punctuality and enthusiasm of the team. They handled items gently, took great care, and placed everything perfectly."
                    </p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="<?php echo base_url();?>/assets/img/images (6).jpeg" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Yashwant</h5>
                           
                        </div>
                    </div>
                    <p class="mb-0">"Top-notch service! Packing, dismantling, handling, transportation, and re-assembling were excellent. Shifting homes felt incredibly easy. Kudos to the team!"
                    </p>
                </div>
            </div>
        </div>
    </div>
    
 -->


 <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="text-center">
            <h6 class="text-secondary text-uppercase">Testimonial</h6>
            <h1 class="mb-0">Our Clients Say!</h1>
        </div>
        <!-- Owl Carousel with arrows -->
        <div class="owl-carousel testimonial-carousel wow fadeInUp " data-wow-delay="0.1s" >
            <!-- Testimonial Item 1 -->


            <?php              
            foreach ($review as $key => $value) {
                ?>

            <div class="testimonial-item p-4 my-5">
                <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                <div class="d-flex align-items-end mb-4">
                    <img class="img-fluid flex-shrink-0" src="<?php echo base_url('assets/images/'. $value->image);?>" style="width: 80px; height: 80px; object-fit: cover;">
                    <div class="ms-4">
                        <h5 class="mb-1"><?= $value->name ?></h5>
                    </div>
                </div>
                <p class="mb-0"><?= $value->description ?></p>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<!-- Owl Carousel Navigation Arrows -->
<style>
/* Additional Styling */
.testimonial-item {
    position: relative;
    background-color: #f9f9f9; /* Light background */
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    padding: 20px;
    transition: transform 0.3s ease-in-out;
}

.testimonial-item:hover {
    transform: scale(1.05); /* Slight scale on hover */
}

.testimonial-item img {
    border-radius: 50%; /* Circular image */
    object-fit: cover; /* Ensure the image fits nicely */
}

.testimonial-item p {
    font-style: italic;
    color: #333; /* Dark text for readability */
    line-height: 1.6;
}

.testimonial-item h5 {
    font-weight: bold;
    color: #007bff; /* Blue color for the name */
}

/* Customize the navigation arrows */
.owl-nav {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
}

.owl-prev, .owl-next {
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    border-radius: 50%;
    padding: 10px;
    font-size: 20px;
    z-index: 10;
    transition: background-color 0.3s;
}

.owl-prev:hover, .owl-next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}
</style>

<!-- Owl Carousel JS (if needed) -->
<script>
$(document).ready(function() {
    $(".testimonial-carousel").owlCarousel({
        loop: true,
        margin: 30,
        nav: true, /* Enable navigation arrows */
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        navText: [
            '<i class="fa fa-arrow-left"></i>',
            '<i class="fa fa-arrow-right"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });
});
</script>
