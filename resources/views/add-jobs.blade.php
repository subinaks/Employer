
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Employer
        </h2>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" href="{{asset('css/design.css')}}">
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

</head>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-12 lg:px-12">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <body>
                    <div class="container">
                       
                     
                        <form action="/submit-job" id="ft-form" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" name="id" value="@if(isset($job->id)){{$job->id}}@endif">
                            <fieldset>
                              <legend>Add Job</legend>
                              <div class="two-cols">
                                <label>
                                  Job Name *
                                  <input type="text" name="job_name" value="@if(isset($job->job_name)){{$job->job_name}}@endif" required>
                                </label>
                                <label>
                                   Email To *
                                  <input type="email" name="email" value="@if(isset($job->email)){{$job->email}}@endif" required>
                                </label>
                              </div>
                              <div class="two-cols">
                                <label>
                                  Emirates
                                  <select name="emirates" required>
                                    <option value="Dubai" @if(isset($job->emirate) && $job->emirate=="Dubai") selected @endif>Dubai</option>
                                    <option value="Sharjah" @if(isset($job->emirate) && $job->emirate=="Sharjah") selected @endif>Sharjah</option>
                                    <option value="Ajman" @if(isset($job->emirate) && $job->emirate=="Ajman") selected @endif>Ajman</option>
                                  </select>
                                </label>
                                <label>
                                    Location *
                                    <input type="text" name="location" value="@if(isset($job->location)){{$job->location}}@endif" required>
                                </label>
                                
                              </div>
                            
                              <div class="two-cols">
                                <label>
                                  Company Name *
                                  <input type="tel" name="company_name" value="@if(isset($job->company_name)){{$job->company_name}}@endif" required>
                                </label>
                                <label>
                                 Job Type *
                                 <select name="job_type" required>
                                    <option value="full_time" @if(isset($job->job_type) && $job->job_type=="full_time") selected @endif>Full Time</option>
                                    <option value="part_time" @if(isset($job->job_type) && $job->job_type=="part_time") selected @endif>Part Time</option>
                                  </select>
                                </label>
                              </div>
                              <div class="two-cols">
                                
                                <label>
                                    Till Date
                                    <input type="date" name="till_date" value="@if(isset($job->till_date)){{$job->till_date}}@endif" required>
                                  </label>
                                  <label>
                                    Remarks
                                     <input type="text" name="remarks" value="@if(isset($job->remarks)){{$job->remarks}}@endif" required>
                                   </label>
                              </div>
                            </fieldset>
                            <fieldset>
                             
                              <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                              <div class="two-cols">
                                <label>
                                 Image
                                  <input type="file" onchange="loadCover(event)" name="image" accept="image/*">
                                </label>
                                
                             
                              </div>
                              <img id="logoCover" src="@if(isset($job->image)){{asset($job->image)}}@endif"  class="object-fit" style="width:45px; height:45px">
                              <p>Possible file types: .jpg,.jpeg,.png. Maximum file size: 1 MB.</p>
                            </fieldset>
                            <div class="btns">
                              <input type="text" name="_gotcha" value="" style="display:none;">
                              <input type="submit" value="Submit application" class="mb-2">
                            </div>
                          </form>
                    </div>
                    <script>
                          var loadCover = function(event) {
        var image = document.getElementById('logoCover');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
                    </script>
                    </body>
                  
                </div>
            </div>
        </div>   
        </div>
    </div>
</x-app-layout>

</html>
 