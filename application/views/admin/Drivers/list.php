
<section class="content">
    <div class="container1">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                <?php if($this->session->flashdata('status')) {?>
            <div class="alert alert-success alert-dismissible fade show">  
            <?= $this->session->flashdata('status');?>
        </div>
        
        <?php }?>

                    <div class="card-header">
                        <h3 class="card-title">Driver</h3>
                        <div style="float:right"><a href="<?= base_url('admin/drivers/add/')?>" class="btn btn-sm btn-primary">Add New</a></div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Name</th>
                                <th>License_No</th>
                                <th>Adhar_No</th>
                                <th>Exp_Date</th>
                                <th>Phone</th>
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
                            foreach($driver as $drivers){

                           ?> 
                        
                            <tr>
                            <td><?= $count++?></td>
                                <td><?= $drivers->name?></td>
                                <td><?= $drivers->license_no?></td>
                                <td><?= $drivers->adhar_no?></td>
                                <td><?= $drivers->exp_date?></td>
                                <td><?= $drivers->phone?></td>
                                <td><?= $drivers->created_at?></td>
                                <td><?= $drivers->updated_at?></td>
                                <td><?= $drivers->status==1 ? "Active" : "Inactive"?></td>
                                <td><?= $drivers->created_by?></td>
                                <td>
                                <a   href="<?= base_url('admin/drivers/edit/'. $driver->id)?>" class="btn btn-sm btn-primary"><i class="fa fa-solid fa-edit"></i></a>
                                <a  href="<?= base_url('admin/drivers/delete/'. $driver->id)?>" onclick="return confirm('Are you sure want to delete?')" class="btn btn-sm btn-danger"><i class="fa fa-solid fa-trash"></i></a>

                                </td>
                                
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
   
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


