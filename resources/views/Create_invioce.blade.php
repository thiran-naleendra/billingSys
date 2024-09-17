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
                                <h1>Create Invoice/Bill</h1>
                            </div>
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

                        <!-- Add Items Form -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add Items to Bill</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('session') }}" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- Item Dropdown -->
                                            <div class="form-group">
                                                <label>Item Name</label>
                                                <select name="item_id" id="searchByNameDropdown" class="form-control" required>
                                                    <option value=""><-- Select --></option>
                                                    @foreach ($item as $item)
                                                        <option value="{{ $item->id }}" data-price="{{ $item->item_price }}" data-description="{{ $item->item_description }}" data-serial="{{ $item->serial_no }}">
                                                            {{ $item->item_name }} | Rs.{{ $item->item_price }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <!-- Price, Qty, Description, Serial -->
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" name="item_price" id="item_price" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Qty</label>
                                                <input type="number" name="qty" id="qty" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="item_description" id="item_description" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Serial</label>
                                                <input type="text" name="serial_no" id="serial" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success col-sm-12">Add Item</button>
                                </form>
                            </div>
                        </div>

                        <!-- Customer Form -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Customer</h3>
                            </div>
                            <br>

                            <form method="post" action="{{ route('customer-session') }}" class="needs-validation" novalidate>
                                @csrf
                                <label for="id">Select Customer:</label>
                                <select name="id" id="id" class="form-control" required>
                                    <option value=""><--Select--></option>
                                    @foreach ($customer as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <button type="submit" class="btn btn-success col-sm-12">Add Customer</button>
                                <br>
                            </form>

                            <!-- Display selected customer -->
                            <br><br>
                            <table class="display" style="width:100%" id="example">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Address</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (session()->has('selectedCustomer'))
                                        <tr>
                                            <td>{{ session('selectedCustomer.name') }}</td>
                                            <td>{{ session('selectedCustomer.address') }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <!-- Items Table -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Items List</h3>
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
                                        <th>Serial</th>
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
                                            <td>{{ $selectedItem['serial_no'] }}</td>
                                            <td>
                                                <form action="{{ route('delete-selected-item', ['index' => $index]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <div class="d-flex justify-content-between">
                                <form action="{{ route('store-invoice') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Save Invoice</button>
                                </form>
                                {{-- <a href="{{ route('invoice') }}" class="btn btn-primary col-sm-3">Create Invoice</a> --}}
                            </div>
                        </div>

                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>

        </div>
        <!-- ./wrapper -->

        {{-- Re-importing jQuery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(function() {
                $('#searchByNameDropdown').on('change', function() {
                    var selectedItem = $(this).find('option:selected');
                    $('#item_price').val(selectedItem.data('price'));
                    $('#item_description').val(selectedItem.data('description'));
                    $('#serial').val(selectedItem.data('serial'));
                });
            });
        </script>
        <script>
            (function() {
                'use strict';
                var forms = document.querySelectorAll('.needs-validation');
                Array.prototype.slice.call(forms).forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            })();
        </script>
    </body>
    </html>
@endsection
