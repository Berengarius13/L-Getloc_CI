<!-- Custom styles for this page -->
<link href="<?php echo base_url();?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Error Information Table</h1>
<p class="mb-4">This table contains information if some error has been occured.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table #3</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>IP Address</th>
                        <th>Denied?</th>
                        <th>Unavailable?</th>
                        <th>Timeout?</th>
                        <th>Unknown?</th>
                        <th>Support?</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- Here tr is table row tag, td is table data tag, th is table header tag  -->
                <!-- We will use a php foreach loop (works until end of array) -->
                <?php
                    $i = 0;

                    foreach($error_datas as $data){
                    // We will close php tag here to easily edit the html
                    $i++;
                    ?>
                    <!-- Html part -->
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $data['created_ip_address']?></td>
                        <td><?php echo $data['denied']?></td>
                        <td><?php echo $data['anavailable']?></td>
                        <td><?php echo $data['timeout']?></td>
                        <td><?php echo $data['unknown']?></td>
                        <td><?php echo $data['support']?></td>
                        <td><?php echo $data['creation_time']?></td>
                        <td><?php echo $data['creation_date']?></td>
                        <td>
                            <!-- Whenvever we use base_url() we try to use the routes functinality of system, we will give the routes link -->
                            <a href="<?php echo base_url('admin/table_3/delete/'.$data['id'])?>" class="fas fa-trash"></a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
                <!-- <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot> -->

            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->