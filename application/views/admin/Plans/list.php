
<section class="content">
    <div class="container1">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Plans</h3>
                        <div style="float:right"><a href="<?= base_url('admin/plans/add/')?>" class="btn btn-sm btn-primary">Add New</a></div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>Sr.No</th>
                                <th>Plan_name</th>
                                <th>Ammount</th>
                                <th>Services</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Status</th>
                                <th>Created_by</th>
                               <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                            $count=1;
                            foreach($plans as $plans){

                           ?> 
                            <tr>
                            <tr>
                            <td><?= $count++?></td>
                                <td><?= $plans->plan_name?></td>
                                <td><?= $plans->ammount?></td>
                                <td><?= $plans->services?></td>
                                <td><?= $plans->created_at?></td>
                                <td><?= $plans->updated_at?></td>
                                <td><?= $plans->status==1 ? "Active" : "Inactive"?></td>
                                <td><?= $plans->created_by?></td>
                                <td>
                                <a   href="<?= base_url('admin/plans/edit/'. $plans->id)?>" class="btn btn-sm btn-primary"><i class="fa fa-solid fa-edit"></i></a>
                                <a  href="<?= base_url('admin/plans/delete/'. $plans->id)?>" onclick="return confirm('Are you sure want to delete?')" class="btn btn-sm btn-danger"><i class="fa fa-solid fa-trash"></i></a>

                                </td>
                                
                            </tr>
                                

                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
  $(function () {
   
    $('#example1').DataTable();
  });
</script>


