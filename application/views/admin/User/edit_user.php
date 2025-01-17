
<section class="content">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php echo form_open("admin/users/save",'');?>
                        <?php echo form_hidden('id',$user->id); ?>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" class="form-control" id="fname" value="<?=$user->fname?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" class="form-control" id="lname" value="<?=$user->lname?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" value="<?=$user->username?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="<?=$user->email?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="passsword">Password</label>
                                <input type="password" name="password" class="form-control" id="password" value="<?=$user->password?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="phone">Phone</label>
                                <input type="tel"  pattern="^[789][0-9]{9}$"  name="phone" class="form-control" id="phone" value="<?=$user->phone?>">
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