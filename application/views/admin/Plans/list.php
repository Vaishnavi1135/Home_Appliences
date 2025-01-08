
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
                        <h3 class="card-title">Plans</h3>
                        <div style="float:right"><a href="<?= base_url('admin/plans/add/')?>" class="btn btn-sm btn-primary">Add New</a></div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class=" serverside-datatable table table-bordered table-striped">
                    <!-- <table width="100%" class="serverside-datatable table table-striped table-bordered table-hover" id="patient_table" url="<?php echo base_url('admin/plans/get_plans'); ?>"> -->

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
   
    // $('#example1').DataTable({
    //   "paging": true,
    //   "lengthChange": true,
    //   "searching": true,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>
<script>
    // $('.serverside-datatable').each(function () {

    $(document).ready(function () {
    // Initialize DataTable
    $('#example1').DataTable({
        responsive: true,
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
        lengthMenu: [
            [10, 25, 50, 99999],
            [10, 25, 50, "All"]
        ],
        buttons: [
            { extend: 'copy', className: 'btn-sm' },
            { extend: 'csv', title: 'Plans', className: 'btn-sm' },
            { extend: 'excel', title: 'Plans', className: 'btn-sm' },
            { extend: 'pdf', title: 'Plans', className: 'btn-sm' },
            { extend: 'print', className: 'btn-sm' }
        ],
        processing: true,
        serverSide: true,
        ajax: {
            url: $('#example1').attr('url'),
            type: "POST",
        }
    });
});

</script>



