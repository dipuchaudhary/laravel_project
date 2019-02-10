@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enter Employee details</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('emp_update') }}">
                        @csrf

                        <input type="hidden" name=" id" value="{{$second->id}}">
                        
                        <div class="form-group row">
                            <label for="emp_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="emp_name" type="text" class="form-control{{ $errors->has('emp_name') ? ' is-invalid' : '' }}" name="emp_name" value="{{$second->emp_name }}" required autofocus>

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
                                <input id="email" type="email" class="form-control{{ $errors->has('emp_email') ? ' is-invalid' : '' }}" name="emp_email" value="{{ $second->emp_email }}" required>

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
                                <input id="emp_type" type="text" class="form-control{{ $errors->has('emp_type') ? ' is-invalid' : '' }}" name="emp_type" value="{{ $second->emp_type}}" required>

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
                                <input id="emp_id" type="number" class="form-control" name="emp_id"  value="{{ $second->emp_id}}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('update') }}
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
        @foreach($second1 as $second1s)
            <tr>
               <!--  <td>
                    {{$second1s->id}}
                </td> -->
                <td>
                    {{$second1s->emp_name}}
                </td>
                <td>
                    {{$second1s->emp_email}}
                </td>
                <td>
                    {{$second1s->emp_type}}
                </td>
                <td>
                    {{$second1s->emp_id}}
                </td>
                <td>
                	<a class="btn btn-primary" href="{{url('edit')}}/{{$second1s->id}}">Edit</a>
                </td>
                

            </tr>
        @endforeach
    </table>
    
</div>

@endsection

