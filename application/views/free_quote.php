<div class="container ">
    <div class="container">
        <div class="row g-6">
            <div class="col-lg-6 wow fadeInUp pb-5" data-wow-delay="0.1s">
                <img class="img-fluid mb-8" src="<?php echo base_url();?>/assets/images/food-delivery.png" alt="">
            </div>
            <div class="col-lg-6 mt-5 pb-5">
                <h3 class="text-danger text-uppercase mt-3" style="text-italic"> Get A Free Quote...!!</h3>
                <div class="bg-light text-center p-5 wow fadeIn mt-5 pt-5" data-wow-delay="0.5s">
                    <form id="quoteForm">
                        <div class="row g-3">
                            <div class="col-12 col-sm-12">
                                <select class="form-select border-0" style="height: 55px;" id="serviceSelect">
                                    <option value="" selected>Select Services</option>
                                    <option value="1">Packers</option>
                                    <option value="2">Movers</option>
                                    <option value="3">Both Packers And Movers</option>
                                </select>
                                <span id="serviceError" style="color: red; display: none;">Please select a service.</span>
                            </div>

                            <div class="col-12 col-sm-12" id="locationLabels" style="display: none;">
                                <label for="locationFrom"></label>
                                <input type="text" class="form-control border-0" id="locationFrom" placeholder="Location From" style="height: 55px;">
                                <span id="locationFromError" style="color: red; display: none;">Please enter location from.</span>
                                
                                <label for="locationTo"></label>
                                <input type="text" class="form-control border-0" id="locationTo" placeholder="Location To" style="height: 55px;">
                                <span id="locationToError" style="color: red; display: none;">Please enter location to.</span>
                            </div>

                            <a href="#" id="submitBtn" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Go</a>
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
            locationLabels.style.display = 'block';
            document.getElementById('locationFrom').style.display = 'block';
            document.getElementById('locationTo').style.display = 'none';
        } else if (selectedValue === "2" || selectedValue === "3") { // "Movers" or "Both"
            locationLabels.style.display = 'block';
            document.getElementById('locationFrom').style.display = 'block';
            document.getElementById('locationTo').style.display = 'block';
        } else {
            locationLabels.style.display = 'none';
        }
    });

    document.getElementById('submitBtn').addEventListener('click', function(event) {
        var serviceSelect = document.getElementById('serviceSelect');
        var locationFrom = document.getElementById('locationFrom');
        var locationTo = document.getElementById('locationTo');
        var serviceError = document.getElementById('serviceError');
        var locationFromError = document.getElementById('locationFromError');
        var locationToError = document.getElementById('locationToError');
        var isValid = true;
        
        if (serviceSelect.value === "") {
            serviceError.style.display = 'block';
            isValid = false;
        } else {
            serviceError.style.display = 'none';
        }

        if (locationFrom.style.display !== 'none' && locationFrom.value.trim() === "") {
            locationFromError.style.display = 'block';
            isValid = false;
        } else {
            locationFromError.style.display = 'none';
        }

        if (locationTo.style.display !== 'none' && locationTo.value.trim() === "") {
            locationToError.style.display = 'block';
            isValid = false;
        } else {
            locationToError.style.display = 'none';
        }

        if (!isValid) {
            event.preventDefault();
        } else {
            window.location.href = "<?php echo base_url('home/free_quote2');?>";
        }
    });
</script>