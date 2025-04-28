
<script src="https://smtpjs.com/v3/smtp.js"></script>
<div class="container">
        <div class="row g-6">
            <div class="col-lg-6 wow fadeInUp pb-5" data-wow-delay="0.1s">
                <img class="img-fluid mb-8" src="<?php echo base_url();?>\assets\images\food-delivery.png" alt="Food Delivery">
            </div>
            <div class="col-lg-6 mt-5 pb-5">
                <h3 class="text-danger text-uppercase mt-3" style="font-style: italic;">Get A Free Quote...!!</h3>
                <div class="bg-light text-center p-5 wow fadeIn mt-5 pt-5" data-wow-delay="0.5s">
                <?php echo form_open("quote/save", array("id" => "quoteForm"));?>
                <?php echo form_hidden('id',0); ?>
                        <div class="row g-3">
                            <!-- <div class="col-12 col-sm-12">
                                <input type="date" class="form-control border-0" placeholder="Date" style="height: 55px;">
                            </div> -->
                            <div class="col-12 col-sm-12">
                                <input type="text" id="name" name="name" class="form-control border-0" placeholder="Name" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-12">
                                <input type="email" id="email" name="email" class="form-control border-0" placeholder="Email" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-12">
                                <input type="number" name="phone" class="form-control border-0" placeholder="Phone No" style="height: 55px;" required>
                            </div>
                            <!-- <div class="col-12 col-sm-12">
                               <input type="text" class="form-control border-0" placeholder="Address" style="height: 55px;">
                            </div> -->
                            <!-- <div class="col-12 col-sm-12">
                                 <textarea id="items" name="items" class="form-control border-0" placeholder="List items to be shifted" style="height: 100px;" required></textarea>
                            </div> -->
                            <div class="col-12">
                                <button type="submit" href=""  class="btn btn-primary w-100 py-3">Select Items</button>
                            </div>
                            
                        </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("quoteForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent default form submission
// alert("hello");
            let formData = new FormData(this);

            fetch("<?php echo base_url('quote/save'); ?>", {
                method: "POST",
                body: formData
            })
            .then(response => response.json()){})
            .then(data => {
                if (data.success) {
                    // Redirect to another page after successful submission
                    window.location.href = "<?php echo base_url("home/selectitem"); ?>";
                } else {
                    alert("Failed to save data. Please try again.");
                }
            });
            // .catch(error => console.error("Error:", error));
        });

</script>

<!-- <script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("quoteForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        let formData = new FormData(this);

        fetch("<?php echo base_url('quote/save'); ?>", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Quote submitted successfully!");
                window.location.href = "<?php echo base_url("home/selectitem"); ?>";
            } else {
                alert("Failed to save data. Please try again.");
            }
        })
        .catch(error => console.error("Error:", error));
    });
});
</script> -->



   