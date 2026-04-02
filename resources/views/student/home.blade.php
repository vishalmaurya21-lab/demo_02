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
    <div align="center">

        <button type="button" class="show-form" >Add new Student</button>
    </div>
    <div class="user-form">

        <form id="register-form" action="{{route('student.store')}}" align="center" method="POST">
            @csrf
            <h2>Student Form</h2>
            <input type="text" name="name" id="name" placeholder="emter name"><br><br>
            <input type="text" name="email" id="email" placeholder="emter email"><br><br>
            <input type="text" name="phone" id="phone" placeholder="enter phone"><br><br>

            @forelse ($courses as $course)
                <input type="checkbox" name="courses[]" value="{{ $course->id }}">
            {{ $course->name }}
            @empty
                <p>No courses available.</p>
            @endforelse
            <br><br>
            <input type="submit" name="submit" value="Submit"><br>
        </form>
    </div>
    <hr>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(".user-form").hide();
    $(document).ready(function(){

        $(".show-form").on('click', function(){

            $(".user-form").toggle();
            $("#register-form")[0].reset();
        });
    });
    
</script>