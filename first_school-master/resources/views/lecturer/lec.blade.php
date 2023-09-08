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

    <link rel="stylesheet" href="css/student.css">
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
            <a href="logout"> <button class="nav_btn w-100"><span class="hov"></span> LOGOUT</button></a>



            <div class="menu-div">
                <h3 class="ps-4">{{ $LoggedUserInfo['staff_name']}}</h3>
            </div>
        </div>
    </nav>
    <section class="main w-100">
        <hr class="w-75">
        <div class="units w-75">
            <div class="header w-100">
                <h2>My units</h2>
            </div>
            <hr>
            <div class="units-grid w-100">
                @foreach ($unit_data as $item)
                <div class="unit-card w-100">
                    <div class="sect-1">
                        <h6>Course</h6>
                        <h2>{{$item->unit_name}}</h2>
                        <a href="#">>{{$item->unit_chapters}}chapters <i class="fas fa-chevron-right"></i></a>
                    </div>
                    <div class="course-info">

                        <h6>COURSE DESCRIPTION</h6>
                        <p>>{{$item->unit_desc}}</p>
                        <a href="{{ url('unit/'.$item->id) }}"> <button class="button-54">VIEW</button></a>
                    </div>
                </div>
                @endforeach
            </div>

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