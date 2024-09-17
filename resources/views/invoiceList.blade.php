@extends('layouts.app')

@section('content')
    <div class="ontainer-fluid">


        <!-- Display success message if invoice is saved -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card card-blue">
            <div class="card-header">
                <h3 class="card-title">Item List</h3>
            </div>
            <br>
            <table class="display" id="dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Customer Address</th>
                        <th>Items</th>
                        <th>Quantities</th>
                        <th>Prices</th>
                        <th>Serial Numbers</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        @php
                            // Split the comma-separated strings into arrays
                            $items = explode(', ', $invoice->item_name);
                            $quantities = explode(', ', $invoice->qty);
                            $prices = explode(', ', $invoice->item_price);
                            $serials = explode(', ', $invoice->serial_no);

                            // Ensure all arrays have the same length
                            $maxCount = min(count($items), count($quantities), count($prices), count($serials));
                        @endphp

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $invoice->customer_name }}</td>
                            <td>{{ $invoice->customer_address }}</td>

                            {{-- List of Items --}}
                            <td>
                                <ul>
                                    @for ($i = 0; $i < $maxCount; $i++)
                                        <li>{{ $items[$i] }}</li>
                                    @endfor
                                </ul>
                            </td>

                            {{-- List of Quantities --}}
                            <td>
                                <ul>
                                    @for ($i = 0; $i < $maxCount; $i++)
                                        <li>{{ $quantities[$i] }}</li>
                                    @endfor
                                </ul>
                            </td>

                            {{-- List of Prices --}}
                            <td>
                                <ul>
                                    @for ($i = 0; $i < $maxCount; $i++)
                                        <li>{{ $prices[$i] }}</li>
                                    @endfor
                                </ul>
                            </td>

                            {{-- List of Serial Numbers --}}
                            <td>
                                <ul>
                                    @for ($i = 0; $i < $maxCount; $i++)
                                        <li>{{ $serials[$i] }}</li>
                                    @endfor
                                </ul>
                            </td>

                            {{-- Calculate total --}}
                            @php
                                $total = 0;
                                for ($i = 0; $i < $maxCount; $i++) {
                                    $total += (float) $prices[$i] * (int) $quantities[$i];
                                }
                            @endphp
                            <td>{{ number_format($total, 2) }}</td>
                            <td>Paid</td>
                            {{-- Display Created At --}}
                            <td>{{ $invoice->created_at ? $invoice->created_at : 'N/A' }}</td>
                            <td><a href="{{ route('invoice.view', ['id' => $invoice->id]) }}" class="btn btn-success">View</a>
                                <form action="{{ route('invoice.delete', ['id' => $invoice->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
