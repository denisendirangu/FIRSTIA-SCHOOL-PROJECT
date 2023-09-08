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
        <p style="padding:3px;">FIRSTIA SCHOOL</p>
            <img src="images/logo.jpg" style="width: 140px; height: 70px">
        </div>

        <div class="categories w-75">
            <div class=""></div>
            <div class=""></div>
            <div class=""></div>
            <a href="student" class="w-100"><button class="nav_btn w-100"><span class="hov"></span> BACK</button></a>

            <div class="menu-div">
                <h3 class="ps-4">{{ $LoggedUserInfo['stud_name']}}</h3>
            </div>
        </div>
    </nav>
    <section class="main-section w-100 m-0">
        <div class="header w-75">
            <h3>AVAILABLE COURSES</h3>
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
        <div class="registration-section w-75">
            @foreach ($unit as $item)
            <div class="unit-card-reg">
                <div class="card-details w-100">
                    <h6>COURSE NAME: </h6>
                    <h4>{{$item->unit_name}}</h4>
                    <p>Chapters: <span class="chapters">{{$item->unit_chapters}}</span></p>
                    <h6>Description:</h6>
                    <hr class="w-50">
                    <span class="chapters">{{$item->unit_desc}}</span>
                    <hr>
                    <div class="w-100" style="display: flex; flex-direction:row; text-transform:uppercase; align-items:baseline; gap:2rem;">
                        <h6>LECTURER:
                        </h6>
                        <p>{{$item->unit_lecturer}}</p>
                    </div>

                </div>
                <form action="{{url('reg_unit/'.$item->id )}}" method="post">@csrf<button class="register-btn">REGISTER</button></form>

            </div>
            @endforeach
        </div>
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