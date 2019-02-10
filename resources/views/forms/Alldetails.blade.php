<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>pdf generation demo</title>
  </head>
  <body>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>