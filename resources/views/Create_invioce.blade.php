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
                                <h1>Create invoice/Bill</h1>
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


                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add Items to Bill</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('session') }}" method="POST" class="needs-validation" novalidate >
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Item Name</label>
                                                <select name="item_id" id="searchByNameDropdown" class="form-control" required>
                                                    <option value=""><-- Select --></option>
                                                    @foreach ($item as $item)
                                                        <option value="{{ $item->id }}"
                                                            data-price="{{ $item->item_price }}" data-discription="{{$item->item_description}}">{{ $item->item_name }}
                                                            &ensp;| Rs.{{ $item->item_price }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>price</label>
                                                    <input type="text" name="item_price" id="item_price"
                                                        class="form-control" placeholder="" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Qty</label>
                                                <input type="number" name="qty" id="qty" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="item_description" id="item_description" class="form-control" required>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success col-sm-12">Add Item</button>

                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                    <!-- general form elements disabled -->

                                </form>
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                        <br><br>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">List </h3>
                            </div>
                            <br>
                            <div class="d-flex flex-row-reverse">
                                <a href="{{ route('clear_session') }}" class="btn btn-danger">Clear Table</a>
                            </div>
                            <br>
                            <table id="dataTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item Name</th>
                                        <th>QTY</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('selectedItems', []) as $index => $selectedItem)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $selectedItem['item_name'] }}</td>
                                            <td>{{ $selectedItem['qty'] }}</td>
                                            <td>{{ $selectedItem['item_price'] }}</td>
                                            <td><form action="{{ route('delete-selected-item', ['index' => $index]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form></td>
                                        </tr>
                                    @endforeach
                            </table>
                            <br>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('invoice') }}" class="btn btn-primary col-sm-3 ">Create Invoice</a>
                                <br>
                                <button class="btn btn-primary col-sm-3">Create Bill</button>
                            </div>
                        </div>
                </section>
                <!-- /.content -->
            </div>

        </div>
        <!-- ./wrapper -->

        

        {{-- Re-importing jQuery via cdn cause the other one doesn't work --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Other script dependencies -->
<script src="path/to/your/dashboard2.js"></script>

        <script>
            $(function() {
                bsCustomFileInput.init();

                // Get the selected item's price when the user changes the selection
                $('#searchByNameDropdown').on('change', function() {

                    var selectedItem = $(this).find('option:selected');
                    var selectedDescription = $(this).find('option:selected');
                    var selectedItemPrice = selectedItem.data('price');
                    var selectedItemDescription = selectedDescription.data('discription');
                    // Set the selected item's price in the "Price" input field
                    $('#item_price').val(selectedItemPrice);
                    $('#item_description').val(selectedItemDescription);
                });
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
