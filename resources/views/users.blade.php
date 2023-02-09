

<!DOCTYPE html>
<html>
<head>
    <title>Import CSV File to Database Example - LaravelTuts.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    

</head>
<body>
     
<div class="container">
    <div class="card mt-3 mb-3">
        <div class="card-header text-center">
            <h4>Import CSV File </h4>
        </div>
        <div class="card-body">
            <form id="productForm" action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
            @csrf    
            <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-primary">Import User Data</button>
                <input type="hidden" name="id" id="id">
            </form>
  
            <table class="table table-bordered mt-3" id ="table-data">
                <tr>
                    <th>ID</th>
                    <th>Sapid</th>
                    <th>Hostname</th>
                    <th>Loopback</th>
                    <th>Mac Address</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->sapid }}</td>
                    <td>{{ $user->hostname }}</td>
                    <td>{{ $user->loopback }}</td>
                    <td>{{ $user->mac_address }}</td>
                    <td><a href="javascript:void(0);" data-toggle="tooltip"  data-original-title="Delete" class="btn btn-danger btn-sm deleteEmployee" data-id="{{ $user->id }}">Delete</a></td>
                    <td><a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{ $user->id }}" data-original-title="Edit" class="edit btn btn-primary btn-sm editEmployee">Edit</a></td>
                </tr>
                @endforeach
            </table>

            <div class="modal fade" id="company-modal" aria-hidden="true">
  
        </div>
    </div>
</div>



     
</body>

<script type="text/javascript">
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$(function () {
    
    $('body').on('click', '.deleteEmployee', function () {
     
     var id = $(this).data("id");
     confirm("Are You sure want to delete !");
     var url = '{{ route("users.delete",":id") }}';
     url = url.replace(':id', id);
     var $tr = $(this).closest('tr');
     $.ajax({
            type: "POST",
            url: url,
            success: function (data) {
                $tr.find('td').remove();                    
                      
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });       
 });



</script>

</html>