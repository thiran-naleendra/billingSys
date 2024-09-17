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
                                <h3 class="card-title">Item List</h3>
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
                                            <td>
                                                @php
                                                    $item_category = '';
                                                    
                                                    switch ($item->item_category) {
                                                        case 0:
                                                            $item_category = 'Camera';
                                                            break;
                                                        case 1:
                                                            $item_category = 'DVR';
                                                            break;
                                                        case 2:
                                                            $item_category = 'Cable';
                                                            break;
                                                        case 3:
                                                            $item_category = 'Adaptors';
                                                            break;
                                                        case 2:
                                                            $item_category = 'Others';
                                                            break;
                                                    }
                                                    echo $item_category;
                                                @endphp
                                            </td>
                                            <td>{{ $item->item_description }}</td>
                                            <th>{{ $item->serial_no }}</th>
                                            <td>Rs.{{ $item->item_price }}</td>
                                            <td>
                                                <a href="{{ route('edit-item', $item->id) }}" class="btn btn-success">Edit</a>
                                                <form action="{{ route('item.delete', $item->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form></td>
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
