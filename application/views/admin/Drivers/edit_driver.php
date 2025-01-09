

<section class="content">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Driver</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <?php echo form_open("admin/driver/save",'');?>
                    <!-- <?php echo form_hidden('id',$driver->id); ?> -->
                    <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="license_no">License_No</label>
                                <input type="number" class="form-control" name="license_no" id="license_no" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="adhar_no">Adhar_No</label>
                                <input type="number" class="form-control" name="adhar_no" id="adhar_no" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="exp_date">Exp_Date </label>
                                <input type="date" class="form-control" name="exp_date" id="exp_date" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control"  name="phone" id="phone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                            <label for="capacity">Capacity In Tons</label>
                            <select 
                                class="form-control" 
                                name="capacity" 
                                id="capacity" 
                                required>
                                <option value="">Select Capacity Of Vehicle</option>
                                <option value="5">0-10 Tons</option>
                                <option value="10">10-20 Tons</option>
                                <option value="15">20-30 Tons</option>
                                <option value="20">30-40 Tons</option>
                                <option value="25">40-50 Tons</option>
                            </select>
                            <small class="form-text text-muted">
                            Please enter the capacity in tons (e.g., 10.5, 20, etc.).
                            </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="submit" class="btn btn-success" name="submit" id="submit" value="Save">
                                <input type="reset" class="btn btn-default" name="reset" id="reset" value="Reset">
                                <input type="button" class="btn btn-danger"  value="Cancel">
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
    
    
</section>