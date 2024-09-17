@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                                <form action="{{ route('item.update', ['id' => $item->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Item Name</label>
                                                <input type="text" name="item" id="item" class="form-control"
                                                    value="{{ $item->item_name }}" placeholder="Item Name..." required>
                                            </div>
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" name="price" id="price" class="form-control"
                                                    value="{{ $item->item_price }}" placeholder="Price..." required>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="description" id="description"
                                                    class="form-control" value="{{ $item->item_description }}"
                                                    placeholder="Price..." required>
                                                < </div>



                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Catagory</label>
                                                    <select name="category" id="category" class="form-control" required>
                                                        <option value=""><-- Select --></option>
                                                        <option value="0"
                                                            {{ $item->item_category == 0 ? 'selected' : '' }}>Camera
                                                        </option>
                                                        <option value="1"
                                                            {{ $item->item_category == 1 ? 'selected' : '' }}>DVR</option>
                                                        <option value="2"
                                                            {{ $item->item_category == 2 ? 'selected' : '' }}>Cables
                                                        </option>
                                                        <option value="3"
                                                            {{ $item->item_category == 3 ? 'selected' : '' }}>Adapters
                                                        </option>
                                                        <option value="4"
                                                            {{ $item->item_category == 4 ? 'selected' : '' }}>Others
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Serial Number</label>
                                                    <input name="serialNo" type="text" class="form-control"
                                                        value="{{ $item->serial_no }}" placeholder="Serial Number..."
                                                        required>
                                                </div>


                                            </div>

                                            <button type="submit" id="updateButton"
                                                class="btn btn-success col-sm-12">Update Items</button>
                                            
                                            



                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                        <!-- general form elements disabled -->


                                </form>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>

                </section>

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
