@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
                    Industry Register List
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Industry List</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Industry Register List </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">

                                   @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif


                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Email</th>
                                                    <th>Mobile No.</th>
                                                    <th>Project Status</th>
                                                    <th>Payment Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               

                                                <?php
                                                $serialNumber = 1; // Initialize the serial number counter
                                                ?>
                                                @foreach ($project_data as $item)
                                                    @if ($item->registration_type == 1)
                                                        <tr>
                                                            <td>{{ $serialNumber }}</td>
                                                            <td>{{ $item->u_email }}</td>
                                                            <td>{{ $item->mobile_no }}</td>
                                    
                                                            <td>
                                                                @if ($item->is_project_uploaded == 1)
                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                        Details Filled
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-sm">Yet to upload</button>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($item->is_payment_done == 1)
                                                                    <button type="button" class="btn btn-success btn-sm">Confirmed</button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-sm">Not Confirmed</button>
                                                                @endif
                                                            </td>
                                    
                                                            <td class="d-flex">
                                                                @if ($item->is_project_uploaded == 1)
                                                                    <a data-id="{{ $item->id }}" class="show-btn btn btn-sm btn-outline-primary m-1">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                @else
                                                                    {{ 'No Project Details Uploaded Yet' }}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @php
                                                    $serialNumber++; // Increment the serial number counter
                                                @endphp
                                                    @endif
                                                   
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                    
                                    
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

     // Add click event handler for the image download button
     $('#example').on('click', '.download-image', function() {
            var imageUrl = $(this).data('image');
            downloadImage(imageUrl);
        });

        function downloadImage(imageUrl) {
        var a = document.createElement('a');
        a.href = imageUrl;
        a.download = 'image.jpg'; // You can specify a custom file name here
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
        </script>
    @endsection
