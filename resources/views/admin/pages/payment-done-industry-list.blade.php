@extends('admin.layout.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
                    Industry Payment Done List
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Industry List</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Industry Payment Done List </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    {{-- <div class="table-responsive"> --}}
                                        <table id="example"
                                            class="table table-striped table-hover table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Registartion Date</th>
                                                    <th>Industry Code</th>
                                                    <th>Project Title</th>
                                                    <th>Participant Name</th>
                                                    <th>Email Address</th>
                                                    <th>Contact No</th>
                                                    <th>Industry Type</th>
                                                    <th>Industry Name</th>
                                                    <th>Product Type</th>
                                                    <th>Mode Of Payment</th>
                                                    <th>UTR Code</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $serialNumber = 1; // Initialize the serial number counter
                                                ?>
                                                @foreach ($project_data as $item)
                                                    <tr>
                                                        <td>{{ $serialNumber }}</td>
                                                        <td>{{ $item->start_date }}</td>
                                                        <td>
                                                           <h6 style="color:red">{{ $item->industry_code }}</h6>
                                                       </td>
                                                       <td>{{ $item->project_title }}</td>
                                                         <td>{{ $item->f_name }} {{ $item->m_name }} {{ $item->l_name }}</td>
                                                       <td>{{ $item->u_email }}</td>
                                                       <td>{{ $item->mobile_no }}</td>
                                                       <td>{{ $industryTypeNames[$item->industry_type] }}</td>
                                                       <td>{{ $item->industry_name }}</td>
                                                       <td>{{ $item->product_type }}</td>
                                                       <td>{{ $paymentModeNames[$item->payment_type] }}</td>
                                                       <td>{{ $item->transaction_details }}</td>
                                                    </tr>
                                                    @php
                                                        $serialNumber++; // Increment the serial number counter
                                                    @endphp
                                                @endforeach
                                            </tbody>

                                        </table>
                                    {{-- </div> --}}
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ url('/admin/show-industry') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <!-- content-wrapper ends -->
        <script>
            jQuery(document).ready(function($) {
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excel',
                        className: 'btn btn-info text-light', // Add Bootstrap button classes
                        title: 'ETS2023_IND' + getCurrentDateTime() // Set the Excel file name dynamically
                    }, ]
                });
            });

            function getCurrentDateTime() {
        var now = new Date();
        var year = now.getFullYear();
        var month = (now.getMonth() + 1).toString().padStart(2, '0');
        var day = now.getDate().toString().padStart(2, '0');
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
        var seconds = now.getSeconds().toString().padStart(2, '0');
        
        return `-${year}-${month}-${day}_${hours}-${minutes}-${seconds}`;
    }
        </script>
    @endsection
