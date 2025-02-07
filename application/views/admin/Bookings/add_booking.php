<section class="content">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Driver</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php echo form_open("admin/drivers/save",'');?>
                        <?php echo form_hidden('id',0); ?>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" >
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
                                <label for="plan">Plan Name</label>
                                <input type="text" class="form-control" name="plan" id="plan" >
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12 form-group">
                            <label for="cost">Cost</label>
                            <input type="number" class="form-control"  name="cost" id="cost">
                            </div>
                        </div>
                        

                        

                        
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="submit"  class="btn btn-success" name="submit" id="submit" value="Save">
                                <input type="reset" class="btn btn-default" name="reset" id="reset" value="Reset">
                                <input type="button" class="btn btn-danger"  value="Cancel" onclick="window.location.href='<?= base_url('admin/drivers/') ?>'">
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        
                    </div>
                </div>
            </div>
    
    
</section>