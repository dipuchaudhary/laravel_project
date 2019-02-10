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
                    <form method="POST" action="{{ url('emp_insert3') }}">
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
<div class="container">
    <table class="table table-hover">

        <tr>

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
        @foreach($fourth as $fourths)
            <tr>
               <!--  <td>
                    {{$fourths->id}}
                </td> -->
                <td>
                    {{$fourths->emp_name}}
                </td>
                <td>
                    {{$fourths->emp_email}}
                </td>
                <td>
                    {{$fourths->emp_type}}
                </td>
                <td>
                    {{$fourths->emp_id}}
                </td>
                <td>
                    <a class="btn btn-primary" href="{{url('edit3')}}/{{$fourths->id}}">Edit</a>
                    <button onclick="view('{{ $fourths-> id}}')" class="btn btn-primary">View</button>
                    <a class="btn btn-danger" href="{{url('delete')}}/{{$fourths->id}}">Delete</a>
                </td>
                

            </tr>
        @endforeach
    </table>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                {{ $fourth->render()}}
                
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
