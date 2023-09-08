@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <style>
            body {
                margin-top: 20px;
                background: #eee;
            }

            h2 {
                color: rgb(0, 163, 108);
                font-size: 40px;
                font-weight: 600
            }

            .invoice {
                background: #fff;
                padding: 20px
            }

            .invoice-company {
                font-size: 20px
            }

            .invoice-header {
                margin: 0 -20px;
                background: #f0f3f4;
                padding: 20px
            }

            .invoice-date,
            .invoice-from,
            .invoice-to {
                display: table-cell;
                width: 1%
            }

            .invoice-from,
            .invoice-to {
                padding-right: 20px
            }

            .invoice-date .date,
            .invoice-from strong,
            .invoice-to strong {
                font-size: 16px;
                font-weight: 600
            }

            .invoice-date {
                text-align: right;
                padding-left: 20px
            }

            .invoice-price {
                background: #f0f3f4;
                display: table;
                width: 100%
            }

            .invoice-price .invoice-price-left,
            .invoice-price .invoice-price-right {
                display: table-cell;
                padding: 20px;
                font-size: 20px;
                font-weight: 600;
                width: 75%;
                position: relative;
                vertical-align: middle
            }

            .invoice-price .invoice-price-left .sub-price {
                display: table-cell;
                vertical-align: middle;
                padding: 0 20px
            }

            .invoice-price small {
                font-size: 12px;
                font-weight: 400;
                display: block
            }

            .invoice-price .invoice-price-row {
                display: table;
                float: left
            }

            .invoice-price .invoice-price-right {
                width: 25%;
                background: #2d353c;
                color: #fff;
                font-size: 28px;
                text-align: right;
                vertical-align: bottom;
                font-weight: 300
            }

            .invoice-price .invoice-price-right small {
                display: block;
                opacity: .6;
                position: absolute;
                top: 10px;
                left: 10px;
                font-size: 12px
            }

            .invoice-footer {
                border-top: 1px solid #ddd;
                padding-top: 10px;
                font-size: 10px
            }

            .invoice-note {
                color: #999;
                margin-top: 80px;
                font-size: 85%
            }

            .invoice>div:not(.invoice-footer) {
                margin-bottom: 20px
            }

            .btn.btn-white,
            .btn.btn-white.disabled,
            .btn.btn-white.disabled:focus,
            .btn.btn-white.disabled:hover,
            .btn.btn-white[disabled],
            .btn.btn-white[disabled]:focus,
            .btn.btn-white[disabled]:hover {
                color: #2d353c;
                background: #fff;
                border-color: #d9dfe3;
            }
        </style>
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
                                <h1>Quotation</h1>
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






                        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
                            rel="stylesheet">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="invoice">
                                    <!-- begin invoice-company -->
                                    <div class="invoice-company text-inverse f-w-600">
                                        <span class="pull-right hidden-print">

                                            {{-- <a href="javascript:;" onclick="window.print()"
                                                class="btn btn-sm btn-white m-b-10 p-l-5"><i
                                                    class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a> --}}
                                        </span>
                                        <img src="{{ url('img/LG2.png') }}" alt="">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <hr>
                                        <h2>Quotation</h2>
                                        <hr>
                                    </div>
                                    <!-- end invoice-company -->
                                    <!-- begin invoice-header -->
                                    <div class="invoice-header">
                                        <div class="invoice-from">
                                            <small>from</small>
                                            <address class="m-t-5 m-b-5">
                                                <strong class="text-inverse">Twitter, Inc.</strong><br>
                                                Street Address<br>
                                                City, Zip Code<br>
                                                Phone: (123) 456-7890<br>
                                                Fax: (123) 456-7890
                                            </address>
                                        </div>
                                        <div class="invoice-to">
                                            <small>to</small>
                                            <address class="m-t-5 m-b-5">
                                                <strong class="text-inverse">Company Name</strong><br>
                                                Street Address<br>
                                                City, Zip Code<br>
                                                Phone: (123) 456-7890<br>
                                                Fax: (123) 456-7890
                                            </address>
                                        </div>
                                        <div class="invoice-date">
                                            <small>Invoice </small>
                                            <div class="date text-inverse m-t-5">August 3,2012</div>
                                            <div class="invoice-detail">
                                                #0000123DSS<br>
                                                Services Product
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end invoice-header -->
                                    <!-- begin invoice-content -->
                                    <div class="invoice-content">
                                        <!-- begin table-responsive -->
                                        <div class="table-responsive">
                                            <table class="table table-invoice">
                                                <thead>
                                                    <tr>
                                                        <th>Item Name </th>
                                                        <th class="text-center" width="10%">Qty</th>

                                                        <th class="text-right" width="20%">Unit Price</th>
                                                        <th class="text-right" width="20%">Tolat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @if (session('selectedItems'))
                                                            <?php $grandTotal = 0; ?> <!-- Initialize the grand total variable -->



                                                            @foreach (session('selectedItems', []) as $selectedItem)
                                                                <?php
                                                                $itemTotal = $selectedItem['qty'] * $selectedItem['item_price']; // Calculate the total for each selected item
                                                                $grandTotal += $itemTotal; // Add the item total to the grand total
                                                                ?>
                                                                <td>
                                                                    <span
                                                                        class="text-inverse">{{ $selectedItem['item_name'] }}</span> <br>
                                                                        <small>{{ $selectedItem['item_description'] }}</small>
                                                                </td>
                                                                <td class="text-center">{{ $selectedItem['qty'] }}</td>

                                                                <td class="text-right">Rs{{ $selectedItem['item_price'] }}
                                                                </td>
                                                                <td class="text-right">Rs{{ $itemTotal }}
                                                                </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                        <!-- begin invoice-price -->
                                        <div class="invoice-price">
                                            <div class="invoice-price-left">
                                                <div class="invoice-price-row">
                                                    <div class="sub-price">
                                                        <small>SUBTOTAL</small>
                                                        <span class="text-inverse">Rs.{{ $grandTotal }}</span>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="invoice-price-right">
                                                <small>TOTAL</small> <span class="f-w-600">Rs.{{ $grandTotal }}/=</span>
                                            </div>
                                            @endif
                                        </div>
                                        <!-- end invoice-price -->
                                    </div>
                                    <!-- end invoice-content -->
                                    <!-- begin invoice-note -->
                                    <div class="invoice-note">
                                        * Make all cheques payable to [Your Company Name]<br>
                                        * Payment is due within 30 days<br>
                                        * If you have any questions concerning this invoice, contact [Name, Phone Number,
                                        Email]
                                    </div>
                                    <!-- end invoice-note -->
                                    <!-- begin invoice-footer -->
                                    <div class="invoice-footer">
                                        <p class="text-center m-b-5 f-w-600">
                                            THANK YOU FOR YOUR BUSINESS
                                        </p>
                                        <p class="text-center">
                                            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i>
                                                matiasgallipoli.com</span>
                                            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i>
                                                T:016-18192302</span>
                                            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i>
                                                rtiemps@gmail.com</span>
                                        </p>
                                    </div>
                                    <!-- end invoice-footer -->
                                </div>
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
    </body>

    </html>
@endsection
