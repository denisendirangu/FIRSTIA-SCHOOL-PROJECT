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
            <a href="register_units"> <button class="nav_btn w-100"><span class="hov"></span>UNIT REGISTRATION</button></a>
            <a href="logout"> <button class="nav_btn w-100"><span class="hov"></span> LOGOUT</button></a>


            <div class="menu-div">
                <h3 class="ps-4">{{ $LoggedUserInfo['stud_name']}}</h3>
            </div>
        </div>
    </nav>
    <section class="main w-100">
        <div class="programs w-75">
            <div class="header w-100">
                <h2>Upcoming programs</h2>
            </div>
            <hr>
            <div class="prog-grid w-75">
                <div class="prog-card w-100">
                    <img src="images/candace.jpg" alt="">

                    <div class="details pt-2">
                        <h4>MEET CANDACE, AN MIT PROF..</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium quis temporibus dolorum magni tempore eveniet iusto minima quisquam impedit! Illo pariatur ab dicta provident id.</p>
                    </div>
                    <div class="prog-btn w-100">
                        <!-- HTML !-->
                        <button class="button-54 w-100" role="button">READ MORE</button>

                    </div>
                </div>
                <div class="prog-card w-100">
                    <img src="images/kinder.jpg" alt="">

                    <div class="details pt-2">
                        <h4>LEARN C#, EASY AS ABC</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium quis temporibus dolorum magni tempore eveniet iusto minima quisquam impedit! Illo pariatur ab dicta provident id.</p>
                    </div>
                    <div class="prog-btn w-100">
                        <!-- HTML !-->
                        <button class="button-54 w-100" role="button">READ MORE</button>

                    </div>
                </div>
                <div class="prog-card w-100">
                    <img src="images/kinder.jpg" alt="">

                    <div class="details pt-2">
                        <h4>LEARN C#, EASY AS ABC</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium quis temporibus dolorum magni tempore eveniet iusto minima quisquam impedit! Illo pariatur ab dicta provident id.</p>
                    </div>
                    <div class="prog-btn w-100">
                        <!-- HTML !-->
                        <button class="button-54 w-100" role="button">READ MORE</button>

                    </div>
                </div>
            </div>
        </div>
        <hr class="w-75">
        <div class="units w-75">
            <div class="header w-100">
                <h2>My units</h2>
            </div>
            <hr>
            <div class="units-grid w-100">

                @foreach ($my_units as $item)
                <div class="unit-card w-100">
                    <div class="sect-1">
                        <h6>Course</h6>
                        <h2>{{$item->unit_name}}</h2>
                    </div>
                    <div class="course-info">
                        <div class="progress-container">
                            <div class="progress"></div>
                            <span class="progress-text">
                                6/9 Challenges
                            </span>
                        </div>
                        <h6>STARTED ON:</h6>
                        <h4>{{$item->created_at}}</h4>
                        <h6>ENDS ON:</h6>
                        <h4>-</h4>
                        <a href="{{ url('course/'.$item->unit_id) }}"> <button class="button-54">Continue</button></a>
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