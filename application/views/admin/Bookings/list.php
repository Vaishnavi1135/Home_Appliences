<style>
    .button-container {
  display: flex;
  gap: 10px; 
}

</style>
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
                        <h3 class="card-title">Bookings</h3>
                        <div style="float:right"><a href="<?= base_url('admin/bookings/add/')?>" class="btn btn-sm btn-primary">Add_Booking</a></div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table width="100%" class="serverside-datatable table table-striped table-bordered table-hover" id="example1" url="<?php echo base_url('admin/Bookings/get_bookings'); ?>">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Plan</th>
                                <th>Cost</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                                $count = 1;
                                foreach ($booking as $bookings) {
                                    ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $booking->name ?></td>
                                    <td><?= $booking->name ?></td>
                                    <td>
                            <div class="button-container">
                                <a   href="<?= base_url('admin/drivers/edit/'. $drivers->id)?>" class="btn btn-sm btn-primary"><i class="fa fa-solid fa-edit"></i></a>
                                <a  href="<?= base_url('admin/drivers/delete/'. $drivers->id)?>" onclick="return confirm('Are you sure want to delete?')" class="btn btn-sm btn-danger"><i class="fa fa-solid fa-trash"></i></a>
                            </div>
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
            { extend: 'csv', title: 'Drivers', className: 'btn-sm' },
            { extend: 'excel', title: 'Drivers', className: 'btn-sm' },
            { extend: 'pdf', title: 'Drivers', className: 'btn-sm' },
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
