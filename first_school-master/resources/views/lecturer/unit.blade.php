<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Fontawesome icons cdn link -->
    <script src="https://kit.fontawesome.com/db540a34d6.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/student.css">
    <title>FIRST SCHOOL</title>
</head>

<body>
    <nav class="main-nav w-100">
        <div class="logo-div">
            <img src="/images/first_sch.png" alt="">
        </div>

        <div class="categories w-75">
            <div class=""></div>
            <div class=""></div>
            <div class=""></div>
            <a href="{{route('teacher')}}" class="w-100"><button class="nav_btn w-100"><span class="hov"></span> BACK</button></a>

            <div class="menu-div">
                <h3 class="ps-4">{{ $LoggedUserInfo['staff_name']}}</h3>
            </div>
        </div>
    </nav>
    <section class="unit w-100">
        <div class="unit-head w-100">
            <div class="unit-name w-75">
                <h2>{{$unit->unit_name}}</h2>
                <h4>ICS{{$unit->unit_code}}</h4>
            </div>
            <div class="lecturer w-25">
                <p>Tr. {{$unit->unit_lecturer}}</p>
            </div>
        </div>

        <div class="content w-100 m-0 p-2">
            <div class="header">
                <h4>ADD COURSEWORK</h4>
                <hr>
            </div>
            @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif

            @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
            @endif
            <form action="{{ url('add-work/'.$unit->id) }}" method="post">
                @csrf
                <div class="form-input p-2 w-100">
                    <label for="header">TITLE:</label>
                    <input type="text" required name="cwork_head" class="form-control w-75">
                </div>
                <div class="form-input p-2 w-100">
                    <label for="header">DETAILS:</label>
                    <textarea name="cwork_desc" required class="form-control w-75" id="" rows="4"></textarea>
                </div>
                <div class="form-input p-2 w-100">
                    <button class="btn btn-dark">
                        ADD COURSEWORK
                    </button>
                </div>


            </form>

        </div>
        @foreach ($unit_coursework as $item)
        <div class="content w-100">
            <h3>{{$item->cwork_head}}</h3>
            <p>{{$item->cwork_desc}}</p>
            <a href="{{ url('delete-work/'.$item->id) }}"><button class="btn btn-outline-danger">DELETE WORK</button></a>
        </div>
        @endforeach

    </section>
    <footer class="footer w-100">
        <div class="upper-footer w-100 ">
            <h3>FROM OUR SCHOOLYARD</h3>
            <p>@firstschool</p>
            <h5>FOLLOW US ON INSTAGRAM</h5>
        </div>
        <div class="lower-footer w-75">
            <div class="footer-list w-100">
                <h4>CONTACT US</h4>
                <h4>COME SEE US</h4>
                <h4>PRESS</h4>
                <h4>CAREERS</h4>
            </div>
            <p class="w-75">© Copyright 2022 First School. All rights reserved. Terms of Use and Privacy Policy. Site Credits.</p>
        </div>
    </footer>
</body>

</html>