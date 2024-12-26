<section class="content">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Driver</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php echo form_open("admin/driver/save",'');?>
                        <?php echo form_hidden('id',0); ?>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="driver_name">Name</label>
                                <input type="text" class="form-control" name="driver_name" id="driver_name" >
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
                                <input type="submit"  class="btn btn-success" name="submit" id="submit" value="Save">
                                <input type="reset" class="btn btn-default" name="reset" id="reset" value="Reset">
                                <input type="button" class="btn btn-danger"  value="Cancel">
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        
                    </div>
                </div>
            </div>
    
    
</section>