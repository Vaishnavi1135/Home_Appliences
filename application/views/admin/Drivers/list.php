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
                                <th>Capacity <select id="capacity" class="form-control">
                                            <option value="1">1</option>
                                            <option value="1">1</option>
                                            <option value="1">1</option>
                                            <option value="1">1</option>
                                        </select></th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Status</th>
                                <th>Created_by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                                $count = 1;
                                foreach ($drivers as $drivers) {
                                    ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $drivers->name ?></td>
                                    <td><?= $drivers->license_no ?></td>
                                    <td><?= $drivers->adhar_no ?></td>
                                    <td><?= $drivers->exp_date ?></td>
                                    <td><?= $drivers->phone ?></td>
                                    <td><?= $drivers->capacity ?></td>
                                    <td><?= $drivers->created_at ?></td>
                                    <td><?= $drivers->updated_at ?></td>
                                    <td><?= $drivers->status == 1 ? "Active" : "Inactive" ?></td>
                                    <td><?= $drivers->created_by ?></td>
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

<!-- <script>
    $(document).ready(function() {
    // Add a select dropdown for Capacity filter
    $('#example1 thead tr').clone(true).appendTo('#example1 thead');
    $('#example1 thead tr:eq(1) th').each(function(i) {
        if (i === 6) { // 6 = Capacity column index
            $(this).html('<select class="form-control"><option value="1">0-10 Tons</option><option value="2">10-20 Tons</option></select>');
        } else {
            $(this).html('');
        }
    });

    var table = $('#example1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        initComplete: function() {
            this.api()
                .columns(6) // Capacity column index
                .every(function() {
                    var column = this;
                    var select = $('select', column.header());
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });

                    select.on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });
                });
        },
    });
});

</script> -->


