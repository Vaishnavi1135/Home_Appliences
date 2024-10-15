
<section class="content">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Plans</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php echo form_open("admin/plans/save",'');?>
                        <?php echo form_hidden('id',0); ?>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="plan_name">Plan_name</label>
                                <input type="text" class="form-control" name="plan_name" id="plan_name" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="ammount">Ammount</label>
                                <input type="text" class="form-control" name="ammount" id="ammount" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="services">Services</label>
                                <textarea class="form-control" name="services" id="services"></textarea>
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