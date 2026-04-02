{{-- <script>alert("{{session('success')}}")</script> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>DAshboard</title>
</head>
<body>
    
@if (session('username'))
    <h2 align="center">Welcome {{session('username')}}</h2>
@endif
<div align="center">

    <a href="{{route('student.logout')}}">LogOut</a>
</div>

<table border="2px" width="80%" align="center">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Courses</th>
        <th>Action</th>
    </tr>

    @forelse ($students as $student)
    <?php
    // $student->id = '2';
    // dd($students);
    // dd($student->courses);
    ?>
    <tr>
        <td>{{$student->id}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->phone}}</td>

        <td>
            @foreach ($student->courses as $course)
                {{ $course->name }}<br>
            @endforeach
        </td>

        <td>
            <a href="{{route('student.edit', $student->id)}}">Edit</a> |
            <a href="{{route('student.delete', $student->id)}}" onclick="return confirm('are you sure')">Delete</a> 
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6">No record found</td>
    </tr>
    @endforelse
</table>
<div class="pagination justify-content-center">
    
    {{$students->links('pagination::bootstrap-5')}}
</div>

</body>
</html>