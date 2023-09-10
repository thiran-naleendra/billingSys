@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">


            <!-- Content Wrapper. Contains page content -->
            <div>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1> Add Customer </h1>
                            </div>
                            <br><br>

                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript:;" onclick="window.print()"
                                            class="btn btn-sm btn-white m-b-10 p-l-5"><i
                                                class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a></li>
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
                                <h3 class="card-title">Add Customer</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('create_customer') }}" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Customer Name</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Name..." required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" id="email" class="form-control"
                                                    placeholder="Email..." required>
                                            </div>
                                            



                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="text" name="number" id="number" class="form-control"
                                                    placeholder="Number..." required>
                                            </div>

                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" id="address" rows="4" cols="50" class="form-control"
                                                    placeholder="Address" required></textarea>
                                            </div>


                                        </div>

                                        <button type="submit" class="btn btn-success col-sm-12">Add Customer</button>

                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                    <!-- general form elements disabled -->


                                </form>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>



                        <div class="card card-blue">
                            <div class="card-header">
                                <h3 class="card-title">Customer List</h3>
                            </div>
                            <br>
                            <table id="dataTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer as $cs)
                                        <tr>
                                            <td>{{ $cs->id }}</td>
                                            <td>{{ $cs->name }}</td>
                                            <td>{{ $cs->mobile_no }}</td>
                                            <td>{{ $cs->email }}</td>
                                            <td>{{ $cs->address }}</td>
                                            
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>



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
