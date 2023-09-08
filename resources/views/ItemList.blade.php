@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">


            <!-- Content Wrapper. Contains page content -->
            <div>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>ITEM LIST</h1>
                            </div>
                            <br><br>

                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Item List</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">



                        <div class="card card-blue">
                            <div class="card-header">
                                <h3 class="card-title">Add Items</h3>
                            </div>
                            <br>
                            <table id="dataTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item Name</th>
                                        <th>Item Category</th>
                                        <th>Item Description</th>
                                        <th>Serial No</th>
                                        <th>Item Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->item_name }}</td>
                                            <td>{{ $item->item_category }}</td>
                                            <td>{{ $item->item_description }}</td>
                                            <th>{{ $item->serial_no }}</th>
                                            <td>Rs.{{ $item->item_price }}</td>
                                            <td><button class="btn btn-success ">Edit</button> &ensp;<button class="btn btn-danger">Delete</button></td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>



                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>

        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- bs-custom-file-input -->
        <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../dist/js/demo.js"></script>
        <!-- Page specific script -->
        <script>
            $(function() {
                bsCustomFileInput.init();
            });
        </script>
    </body>

    </html>
@endsection
