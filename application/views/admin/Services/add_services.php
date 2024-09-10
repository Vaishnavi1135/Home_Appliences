
<section class="content">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Services</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php echo form_open("admin/services/save",'');?>
                        <?php echo form_hidden('id',0); ?>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
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