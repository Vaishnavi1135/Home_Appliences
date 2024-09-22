
<section class="content">
    <div class="container1">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Services</h3>
                        <div style="float:right"><a href="<?= base_url('admin/services/add/')?>" class="btn btn-sm btn-primary">Add New</a></div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
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
                            foreach($services as $services){

                           ?> 
                        
                            <tr>
                            <td><?= $count++?></td>
                                <td><img src="<?php echo base_url();?>assets/images/<?= $services->image?> "></td>
                                <td><?= $services->name?></td>
                                <td><?= $services->description?></td>
                                <td><?= $services->created_at?></td>
                                <td><?= $services->updated_at?></td>
                                <td><?= $services->status==1 ? "Active" : "Inactive"?></td>
                                <td><?= $services->created_by?></td>
                                <td>
                                <a   href="<?= base_url('admin/services/edit/'. $services->id)?>" class="btn btn-sm btn-primary"><i class="fa fa-solid fa-edit"></i></a>
                                <a  href="<?= base_url('admin/services/delete/'. $services->id)?>" onclick="return confirm('Are you sure want to delete?')" class="btn btn-sm btn-danger"><i class="fa fa-solid fa-trash"></i></a>

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


