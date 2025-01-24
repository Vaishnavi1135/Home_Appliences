<div class="container">
    <div class="container">
        <div class="row g-6">
            <div class="col-lg-6 wow fadeInUp pb-5" data-wow-delay="0.1s">
                <img class="img-fluid mb-8" src="<?php echo base_url();?>/assets/images/food-delivery.png" alt="">
            </div>
            <div class="col-lg-6 mt-5 pb-5">
                <h3 class="text-danger text-uppercase mt-3" style="text-italic"> Get A Free Quote...!!</h3>
                <div class="bg-light text-center p-5 wow fadeIn mt-5 pt-5" data-wow-delay="0.5s">
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-12">
                                <select class="form-select border-0" style="height: 55px;" id="serviceSelect">
                                    <option selected>Select Services</option>
                                    <option value="1">Packers</option>
                                    <option value="2">Movers</option>
                                    <option value="3">Both Packers And Movers</option>
                                </select>
                            </div>
                            <!-- <div class="col-12 col-sm-12">
                            <label for="distance"></label>
                                <input type="number" class="form-control border-0" id="distance" placeholder="Distance " value="" style="height: 55px;">
                            </div> -->

                            <div class="col-12 col-sm-12" id="locationLabels" style="display: none;">
                                <label for="locationFrom"></label>
                                <input type="text" class="form-control border-0" id="locationFrom" placeholder="Location From" style="height: 55px;">
                                
                                <label for="locationTo"></label>
                                <input type="text" class="form-control border-0" id="locationTo" placeholder="Location To" style="height: 55px;">
                            </div>

                            <a href="<?php echo base_url("home/free_quote2");?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Go</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('serviceSelect').addEventListener('change', function() {
        var selectedValue = this.value;
        var locationLabels = document.getElementById('locationLabels');

        // Show location fields based on selected service
        if (selectedValue === "1") { // "Packers" option
            locationLabels.style.display = 'block'; // Show labels only
            document.getElementById('locationFrom').style.display = 'block';
            document.getElementById('locationTo').style.display = 'none'; // Hide "Location To"
        } else if (selectedValue === "2" || selectedValue === "3") { // "Movers" or "Both Packers And Movers"
            locationLabels.style.display = 'block'; // Show both labels
            document.getElementById('locationFrom').style.display = 'block';
            document.getElementById('locationTo').style.display = 'block'; // Show "Location To"
        } else {
            locationLabels.style.display = 'none'; // Hide labels for other options
        }
    });
</script>