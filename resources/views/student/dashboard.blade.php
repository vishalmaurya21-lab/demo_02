{{-- <script>alert("{{session('success')}}")</script> --}}
@if (session('username'))
    <h2 align="center">Welcome {{session('username')}}</h2>
@endif
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
    dd($students);
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
            <a href="#">Edit</a> |
            <a href="#">Delete</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6">No record found</td>
    </tr>
    @endforelse
</table>