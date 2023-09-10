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
                                <h1>ADD ITEMS</h1>
                            </div>
                            <br><br>

                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Add Items</li>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('item_store') }}" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Item Name</label>
                                                <input type="text" name="item" id="item" class="form-control"
                                                    placeholder="Item Name..." required>
                                            </div>
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" name="price" id="price" class="form-control"
                                                    placeholder="Price..." required>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" id="description" rows="4" cols="50" class="form-control"
                                                    placeholder="Description" required></textarea>
                                            </div>



                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Catagory</label>
                                                <select name="category" id="category" class="form-control" required>
                                                    <option value=""><-- Select --></option>
                                                    <option value="0">Camera</option>
                                                    <option value="1">DVR</option>
                                                    <option value="2">Cables</option>
                                                    <option value="3">Adapters</option>
                                                    <option value="4">Others</option>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Serial Number</label>
                                                <input name="serialNo" type="text" class="form-control"
                                                    placeholder="Serial Number..." required>
                                            </div>


                                        </div>

                                        <button type="submit" class="btn btn-success col-sm-12">Add Items</button>

                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                    <!-- general form elements disabled -->


                                </form>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>

                </section>
                <!-- /.content -->
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
                                    <td><a href="{{ route('edit-item', ['id' => $item->id]) }}"
                                            class="btn btn-primary ">Edit</a> &ensp;<button
                                            class="btn btn-danger">Delete</button></td>
                                </tr>
                            @endforeach
                    </table>
                </div>
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
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
            })()
        </script>
    </body>

    </html>
@endsection
