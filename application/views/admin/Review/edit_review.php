
<section class="content">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Review</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <?php echo form_open("admin/review/save",'');?>
                    <?php echo form_hidden('id',$reviews->id); ?>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image" value="<?=$reviews->image?>" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?=$reviews->name?>" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" id="description" value="<?=$reviews->description?>">
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