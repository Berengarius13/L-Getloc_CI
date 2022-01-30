<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="row">

        <div class="col-lg-3 mb-4">

            <div class="card bg-primary border-left-light text-white shadow">
                <div class="card-body">
                    <div class="form-group">
                        <select name="ip" id="ip" class="form-control input-lg">
                            <option value="">IP Address</option>
                            <!-- 
                                * Option value attribute is set as row id
                                * 
                             -->
                            <?php
                            foreach ($loc_datas as $row) {
                                echo '<option value="' . $row->created_ip_address . '">' . $row->created_ip_address . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="text-white-50 small">Select the IP address</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card bg-success border-left-light text-white shadow">
                <div class="card-body">
                    <div class="form-group">
                        <select name="date" id="date" class="form-control input-lg">
                            <option value="">Select Date</option>

                        </select>
                    </div>
                    <div class="text-white-50 small">Select Date</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card bg-info border-left-light text-white shadow">
                <div class="card-body">
                    <div class="form-group">
                        <select name="time" id="time" class="form-control input-lg">
                            <option value="">Select Time</option>

                        </select>
                    </div>
                    <div class="text-white-50 small">Select Time</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card bg-danger border-left-light text-white shadow">
                <div class="card-body">
                    <div class="form-group">
                        <select name="imei" id="imei" class="form-control input-lg">
                            <option value="">Select IMEI</option>

                        </select>
                    </div>
                    <div class="text-white-50 small">IMEI functionality to be added in future</div>
                </div>
            </div>
        </div>

    </div>


    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Latitude</div>
                            <div name="latitude" id="latitude" class="h5 mb-0 font-weight-bold text-gray-800">?</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Longitude</div>
                            <div id="longitude" class="h5 mb-0 font-weight-bold text-gray-800">?</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Accuracy</div>
                            <div id="accuracy" class="h5 mb-0 font-weight-bold text-gray-800">?</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bullseye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Altitude</div>
                            <div id="altitude" class="h5 mb-0 font-weight-bold text-gray-800">?</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Speed</div>
                            <div id="speed" class="h5 mb-0 font-weight-bold text-gray-800">?</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tachometer-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Direction</div>
                            <div id="direction" class="h5 mb-0 font-weight-bold text-gray-800">?</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-street-view fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
    <!-- Content Row -->

    <div class="row">



        <!-- Pie Chart -->
        <div class="col-xl col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">MAP</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div id="map" class="card-body">

                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->





</div>
<!-- /.container-fluid -->

<!-- JQuery Part -->
<!-- 
    * Document can safely run only when it's ready 
    * "$('#ip')" is a selector used to select "id" in jquery
    * .val() to get value selected
    * three parts , url, method and object
-->
<script>
    $(document).ready(function() {
        $('#ip').change(function() {
            // This code will select value under the option which is id of row
            var ip = $('#ip').val();
            // console.log(ip);
            if (ip != '') {

                $.ajax({
                    url: "<?php echo base_url() ?>Admin/fetch_date",
                    method: "POST",
                    data: {
                        ip: ip
                    },
                    success: function(data) {
                        // If we have successfully retreived data we will put it in date by
                        $('#date').html(data);
                        // This will fill date select box that it have received from server
                    },
                    fail: function() {
                        alert("error in first ajax");
                    }
                });
            }
        });
        $('#date').change(function() {
            var date = $('#date').val();
            var ip = $('#ip').val();
            // console.log(date);
            if (date != '') {
                $.ajax({
                    url: "<?php echo base_url() ?>Admin/fetch_time",
                    method: "POST",
                    data: {
                        date: date,
                        ip: ip
                    },
                    success: function(data) {
                        $("#time").html(data);
                    },
                    fail: function() {
                        alert("error in second ajax");
                    }

                });
            }
        });
        $('#time').change(function() {
            var id = $('#time').val();
            if (id != '') {
                $.ajax({
                    url: "<?php echo base_url() ?>Admin/fetch_location",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        // console.log(data);
                        // Rememeber to use ` ` these ticks instead of " "
                        const obj = JSON.parse(data);
                        var lat = obj.lat;
                        var lon = obj.lon;
                        // Estimate accuracy
                        var num = obj.acc;
                        var num = parseFloat(num);
                        var accuracy = num.toFixed(2);
                        $('#latitude').html(`<p>${obj.lat}</p>`);
                        $('#longitude').html(`${obj.lon}`)
                        $('#accuracy').html(`${accuracy}`);
                        $('#altitude').html(`${obj.alt}`);
                        $('#direction').html(`${obj.dir}`);
                        $('#speed').html(`${obj.spd}`);
                        $('#map').html(`<div class="embed-responsive embed-responsive-16by9">
                        <div  class="embed-responsive-item" >
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=${lat},${lon} "width="1200" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Location Marker
                        
                    </div>`)
                    }
                });
            }

        });

    });
</script>