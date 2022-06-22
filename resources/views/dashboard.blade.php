<x-app-layout>
    {{-- <x-slot name="header"> --}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Employer
        </h2>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
         
<title>Users</title>
        
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
    {{-- </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-12 lg:px-12">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <body>
                    <div class="container">
                        <h4>My Job Listing Details</h4>
                        <div class="card-body">
                          
                            <a href="/add-job"  style="float: right;" class="btn btn-primary mt-3"><i class="fas fa-plus"></i> Add Job</a><br>
                       
                    </div><br>
               

                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Position Name</th>
                                    <th>Company Name</th>
                                    <th>Email To</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    </body>
                    <script type="text/javascript">
                      $(function () {
                        var table = $('.data-table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: {
                              url: "{{ route('dashboard') }}"
                            },
                            columns: [
                                {data: 'DT_RowIndex',orderable: false, searchable: false},
                                {data: 'job_name', name: 'job_name'},
                                {data: 'company_name', name: 'company_name'},
                                {data: 'email', name: 'email'},
                                {data: 'location', name: 'location'},
                                {data: 'action', name: 'action', orderable: false, searchable: false},
                            ]
                        });
                      
                      });
                    </script>
                </div>
            </div>
        </div>   
        </div>
    </div>
</x-app-layout>
