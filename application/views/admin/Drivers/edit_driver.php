<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Driver</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php echo form_open("admin/driver/save", 'method="post"'); ?>
                <!-- <?php echo form_hidden('id', $driver->id); ?> -->

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?= $drivers->name ?>" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="license_no">License Number</label>
                        <input type="number" class="form-control" name="license_no" id="license_no" value="<?= $drivers->license_no ?>" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="adhar_no">Aadhar Number</label>
                        <input type="number" class="form-control" name="adhar_no" id="adhar_no" value="<?= $drivers->adhar_no ?>" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="exp_date">Expiry Date</label>
                        <input type="date" class="form-control" name="exp_date" id="exp_date" value="<?= $drivers->exp_date ?>" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" name="phone" id="phone" value="<?= $drivers->phone ?>" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="capacity">Capacity in Tons</label>
                        <select class="form-control" name="capacity" id="capacity" required>
                            <option value="">Select Capacity of Vehicle</option>
                            <option value="5" <?= $drivers->capacity == "5" ? "selected" : "" ?>>0-10 Tons</option>
                            <option value="10" <?= $drivers->capacity == "10" ? "selected" : "" ?>>10-20 Tons</option>
                            <option value="15" <?= $drivers->capacity == "15" ? "selected" : "" ?>>20-30 Tons</option>
                            <option value="20" <?= $drivers->capacity == "20" ? "selected" : "" ?>>30-40 Tons</option>
                            <option value="25" <?= $drivers->capacity == "25" ? "selected" : "" ?>>40-50 Tons</option>
                        </select>
                        <small class="form-text text-muted">
                            Please select the capacity in tons.
                        </small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="submit" class="btn btn-success" name="submit" id="submit" value="Save">
                        <input type="reset" class="btn btn-default" name="reset" id="reset" value="Reset">
                        <input type="button" class="btn btn-danger" value="Cancel" onclick="window.location.href='<?= base_url('admin/driver'); ?>'">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>
