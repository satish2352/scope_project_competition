@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
                    Industry Presentation List
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Industry</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Industry Presentation List </li>
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
                                                    <th>Email </th>
                                                    <th>Mobile No.</th>
                                                    <th>Industry Name</th>
                                                    <th>Project Code</th>
                                                    <th>Project</th>
                                                    <!--<th>Payment Proof</th>-->
                                                    
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
                                                    <td>{{ $item->project_title }}</td>
                                                    <td>
                                                        <h6 style="color:red">{{ $item->industry_code }}</h6>
                                                    </td>
                                                <td>
                                                     <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <a class="btn btn-primary py-2" target="_blank"
                                                                href="{{ env('APP_URL') . '/storage/all_web_data/industry/project_docs/' . $item['project_presentation'] }}">
                                                                View Presentation </a>
                                                        </div>
                                                    </div>
                                                </td>
                                               <!-- <td>-->
                                               <!--     <div class="col-lg-6 col-md-6 col-sm-6 ">-->
                                               <!--         <div class="form-group d-flex justify-content-center align-items-center">-->
                                               <!--             <img style="width: 70px; height: 70px;"-->
                                               <!--                 src="{{ env('APP_URL') . '/storage/all_web_data/industry/images/payment_proof/' . $item['payment_proof'] }}">-->
                                                           
                                               <!--                 <div class="ml-2">-->
                                               <!--                     <button class="btn btn-success download-image py-2"-->
                                               <!--                     data-image="{{ env('APP_URL') . '/storage/all_web_data/industry/images/payment_proof/' . $item['payment_proof'] }}">-->
                                               <!--                     Download-->
                                               <!--                 </button>-->
                                               <!--                 </div>-->
                                               <!--         </div>-->
                                               <!--     </div>-->
                                               <!--</td>-->
                                                   
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

        <form method="POST" action="{{ url('/admin/show-users') }}" id="showform">
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
