    <div class="row g-5 mx-lg-0 mb-5 pb-5" style="background-color:;">
        <div class="container-xxl pb-5">
            <div class="container py-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">Our Services</h6>
                    <h1 class="mb-5">Explore Our Services</h1>
                </div>
                <div class="row g-3">
                    <?php foreach ($services as $key => $value) {
                        
                    ?>
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s" >
                        <div class="service-item p-4">
                            <div class="overflow-hidden mb-4">
                                <img class="img-fluid" src="<?php echo base_url('assets/images/'. $value->image);?>" alt="">
                            </div>
                            <h4 class="mb-3"><?= $value->name?></h4>
                            <p><?= $value->description?></p>
                            <a class="btn-slide mt-2" href="<?php echo base_url("services/view_service/ "  );?>"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <!-- <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item p-4">
                            <div class="overflow-hidden mb-4">
                                <img class="img-fluid" src="<?php echo base_url();?>\assets\images\modular-kitchen-accessories-for-modern-homes.jpg" alt="">
                            </div>
                            <h4 class="mb-2"> KITCHEN <br>APPLIENCES</h4>
                            <p>Think about moving your home from one place to another. When you need to transfer your household effect.The circumstance of a home shifting will also force you to root out your well-established kitchen,whether you like it or not,for transferring kitchen items to your new home.Disposing don’t need move</p>
                            <a class="btn-slide mt-2" href="<?php echo base_url("services/kitchen");?>"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s" >
                        <div class="service-item p-4">
                            <div class="overflow-hidden mb-4">
                                <img class="img-fluid" src="<?php echo base_url();?>\assets\images\premium_photo-1663126312373-b2d5264c2edd.jpeg" alt="">
                            </div>
                            <h4 class="mb-3"> FURNITURE APPLIENCES</h4>
                            <p>Moving locally can seem less complex than a long-distance relocation, but furniture still requires careful handling. Here's how our local furniture shifting service ensures a smooth transition for your prized possessions It requires careful planning and execution</p>
                            <a class="btn-slide mt-2" href="<?php echo base_url("services/furniture");?>"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s" >
                        <div class="service-item p-4">
                            <div class="overflow-hidden mb-4">
                                <img class="img-fluid" src="<?php echo base_url();?>\assets\images\istockphoto-510242145-612x612.jpg" alt="">
                            </div>
                            <h4 class="mb-3"> VEHICLE <br>APPLIENCES</h4>
                            <p>KPM is an online directory that offers competitive quotes to those individuals that are looking forward to make their car shifting experience a memorable affair to remember. We help those who are looking for reliable vehicle shifting services with the leading vehicle shifting </p>
                            <a class="btn-slide mt-2" href="<?php echo base_url("services/vehicle");?>"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>