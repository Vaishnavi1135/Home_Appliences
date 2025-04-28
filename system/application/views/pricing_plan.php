<style>
        /* Style for tabs */
        .nav-tabs .nav-link {
            background-color: red;
            color: white;
            border: 1px solid white;
            width: 422px ;
            height:50px;
            font-size:20px;
           position:center;
        }
        .nav-tabs .nav-link.active {
            background-color: white;
            color: black;
        }
        .nav-tabs .nav-link:hover {
            background-color: #cc0000;
            color: white;
        }
        .nav-tabs {
            width: 100%;
        }
    </style>
    <!-- Tabs Section -->
    <div class="container py-3">

    <ul class="nav nav-tabs" id="pricingTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="packers-tab" data-toggle="tab" href="#packers" role="tab" aria-controls="packers" aria-selected="true">Packers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="movers-tab" data-toggle="tab" href="#movers" role="tab" aria-controls="movers" aria-selected="false">Movers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="packers-movers-tab" data-toggle="tab" href="#packers-movers" role="tab" aria-controls="packers-movers" aria-selected="false">Packers and Movers</a>
            </li>
        </ul>
        <div class="tab-content" id="pricingTabsContent">
            <!-- Packers Tab Content -->
            <div class="tab-pane fade show active" id="packers" role="tabpanel" aria-labelledby="packers-tab">
            <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">Packers</h6>
                    <h1 class="mb-5">Perfect Pricing Plan for Packers</h1>
                    <!-- Packers Content -->
                </div>
                <div class="row g-4">
                        <?php foreach ($plans as $key => $value) { ?>
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="price-item">
                                <div class="border-bottom p-4 mb-4">
                                    <h5 class="text-primary mb-1"><?= $value->plan_name ?></h5>
                                    <h1 class="display-5 mb-0"><?= $value->ammount ?><small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ kg</small></h1>
                                </div>
                                <div class="p-4 pt-0">
                                    <p><i class="fa fa-check text-success me-3"></i><?= $value->services ?></p>
                                    <p><i class="fa fa-check text-success me-3"></i><?= $value->services ?></p>
                                    <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Order Now</span></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    </div>
            </div>
            <!-- Movers Tab Content -->
            <div class="tab-pane fade" id="movers" role="tabpanel" aria-labelledby="movers-tab">
            <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">Movers</h6>
                    <h1 class="mb-5">Perfect Pricing Plan for Movers</h1>
                    <!-- Movers Content -->
                </div>
                <div class="row g-4">
                        <?php foreach ($plans as $key => $value) { ?>
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="price-item">
                                <div class="border-bottom p-4 mb-4">
                                    <h5 class="text-primary mb-1"><?= $value->plan_name ?></h5>
                                    <h1 class="display-5 mb-0"><?= $value->ammount ?><small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ kg</small></h1>
                                </div>
                                <div class="p-4 pt-0">
                                    <p><i class="fa fa-check text-success me-3"></i><?= $value->services ?></p>
                                    <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Order Now</span></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                 </div>
            </div>
            <!-- Packers and Movers Tab Content -->
            <div class="tab-pane fade" id="packers-movers" role="tabpanel" aria-labelledby="packers-movers-tab">
            <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">Packers and Movers</h6>
                    <h1 class="mb-5">Perfect Pricing Plan for Packers and Movers</h1>
                    <!-- Packers and Movers Content -->
                </div>

                <div class="row g-4">
                        <?php foreach ($plans as $key => $value) { ?>
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.5s">
                            <div class="price-item">
                                <div class="border-bottom p-4 mb-4">
                                    <h5 class="text-primary mb-1"><?= $value->plan_name ?></h5>
                                    <h1 class="display-5 mb-0"><?= $value->ammount ?><small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ kg</small></h1>
                                </div>
                                <div class="p-4 pt-0">
                                    <p><i class="fa fa-check text-success me-3"></i><?= $value->services ?></p>
                                    <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Order Now</span></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
       
</div>