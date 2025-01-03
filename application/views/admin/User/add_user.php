
<section class="content">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php echo form_open("admin/users/save",'');?>
                        <?php echo form_hidden('id',0); ?>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" >
                            </div>
                        </div>

                        <!-- <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="lname" >
                            </div>
                        </div> -->

                        

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="passsword">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="passsword">Confirm Password</label>
                                <input type="passsword" class="form-control" name="confirmpassword" id="confirmpassword">
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