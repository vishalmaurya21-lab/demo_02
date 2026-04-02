<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <hr>
    <div class="user-form">

        <form action="{{route('student.update', $student->id)}}" align="center" method="POST">
            @csrf
            <h2>Student Edit Form</h2>
            <input type="text" name="name" id="name" value="{{$student->name}}"><br><br>
            <input type="text" name="email" id="email" value="{{$student->email}}"><br><br>
            <input type="text" name="phone" id="phone" value="{{$student->phone}}"><br><br>

            @foreach ($courses as $course)
                <input type="checkbox" 
                       name="course[]" 
                       value="{{$course->id}}"
                       {{$student->courses->contains($course->id) ? 'checked' : ''}}>
                {{$course->name}} <br>
            @endforeach

            {{-- @forelse ($courses as $course)
                <input type="checkbox" name="courses[]" value="{{ $course->id }}">
            {{ $course->name }}
            @empty
                <p>No courses available.</p>
            @endforelse --}}
            <br><br>
            <input type="submit" name="submit" value="Update"><br>
        </form>
    </div>
    <hr>
</body>
</html>