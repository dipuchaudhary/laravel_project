@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enter Employee details</div>

                @if (count($errors)>0)
                    <div class="alert alert-success">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                        
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ url('emp_insert5') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="emp_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="emp_name" type="text" class="form-control{{ $errors->has('emp_name') ? ' is-invalid' : '' }}" name="emp_name" value="{{ old('emp_name') }}" required autofocus>

                                @if ($errors->has('emp_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emp_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emp_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('emp_email') ? ' is-invalid' : '' }}" name="emp_email" value="{{ old('emp_email') }}" required>

                                @if ($errors->has('emp_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emp_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emp_type" class="col-md-4 col-form-label text-md-right">{{ __('emp_type') }}</label>

                            <div class="col-md-6">
                                <input id="emp_type" type="text" class="form-control{{ $errors->has('emp_type') ? ' is-invalid' : '' }}" name="emp_type" required>

                                @if ($errors->has('emp_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emp_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emp_id" class="col-md-4 col-form-label text-md-right">{{ __('emp_id') }}</label>

                            <div class="col-md-6">
                                <input id="emp_id" type="number" class="form-control" name="emp_id" required>
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{{csrf_token()}}}"/>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-6 control-label">Upload Profile Pic</label>
                            <div class="col-sm-4">
                                <input type="file" name="image" class="form-control" id="name" placeholder="Upload" accept=".jpg">
                                
                            </div>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        
    </div>
<div class="col-md-6">
<div class="input-group">
    <form action="{{ url('empSearch')}}" method="GET" class="form-inline">
        <input type="text" class="form-control" placeholder="Search for..." name="searchEmp">
        <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Go!</button>

        </span>
</form>
</div><!-- /input-group -->
<a href="{{action('SixController@downloadAllPDF')}}" class="btn btn-warning">downloadAllpdf</a>
</div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<br>



<div class="container">
    <table class="table table-hover">

        <tr>
            <th>
                Profile Pic
            </th>

            <th>
                Employee Name
            </th>
            <th>
                Employee email
            </th>
            <th>
                Employee type
            </th>
            <th>
                Employee id
            </th>
            <th>
                Action
            </th>
           
        </tr>
        @foreach($six as $sixs)
            <tr>
               <!--  <td>
                    {{$sixs->id}}
                </td> -->
                <td>
                    <img src="{{'../storage/app/images/'.$sixs->file_upload}}" width="150 px" height="150 px" style="border-radius: 50%">
                </td>
                <td>
                    {{$sixs->emp_name}}
                </td>
                <td>
                    {{$sixs->emp_email}}
                </td>
                <td>
                    {{$sixs->emp_type}}
                </td>
                <td>
                    {{$sixs->emp_id}}
                </td>
                <td>
                    <a class="btn btn-primary" href="{{url('edit5')}}/{{$sixs->id}}">Edit</a>
                    <button onclick="view('{{ $sixs-> id}}')" class="btn btn-primary">View</button>
                    <a class="btn btn-danger" href="{{url('delete')}}/{{$sixs->id}}">Delete</a>
                    <a href="{{action('SixController@downloadPDF',$sixs->id)}}" class="btn btn-warning">download pdf</a>

                </td>
                

            </tr>
        @endforeach
    </table>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                {{ $six->render()}}
                
            </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Employee Details</h4>
           <button type="button" class="close" data-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group"> 
                <label>Emp Name:</label>
            <input type="text" name="emp_name" id="employee_name" disabled class="form-control" width="500px">
            </div>
              <div class="form-group">
                <label>Emp Email:</label>
                <input type="email" name="emp_email" id="employee_email" disabled class="form-control">
               </div>
               <div class="form-group"> 
                <label>Emp Type:</label>
                <input type="text" name="emp_type" id="employee_type" disabled class="form-control">
                </div>
               <div class="form-group">
                <label>Emp Id:</label>
                <input type="number" name="emp_id" id="employee_id" disabled class="form-control">
               </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
            
        </div>
    
</div>

@endsection

@section('js')

<script type="text/javascript">
    function view(id)
    {
        $.ajax({
            method: 'GET',
            url: "{{ route('view.emp')}}",
            data: {
                id: id
            },
            success: function(data)
            {
                $('#employee_name').val(data.emp_name);
                $('#employee_email').val(data.emp_email);
                $('#employee_type').val(data.emp_type);
                $('#employee_id').val(data.emp_id);
                $('#myModal').modal('show');
            }
        })
    }
</script>
