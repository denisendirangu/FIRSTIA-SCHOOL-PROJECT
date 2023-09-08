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

    <link rel="stylesheet" href="css/admin.css">
    <script src="/JS/admin.js" defer></script>
    <title>ADMIN-FIRSTIA SCHOOL</title>
</head>

<body>
    <nav class="admin-nav w-100">
        <div class="logo-div">
        <p style="padding:3px;">FIRSTIA SCHOOL</p>
            <img src="images/logo.jpg" style="width: 140px; height: 70px">
        </div>

        <div class="categories">
            <button class="nav_btn">STUDENTS</button>
            <button class="nav_btn">STAFF</button>
            <button class="nav_btn">COURSES</button>
            <button class="nav_btn">SETTINGS</button>
            <a href="{{route('logout')}}"><button class="nav_btn">LOGOUT</button></a>
        </div>
        <div class="admin-profile pe-4">
            <h4>{{$LoggedUserInfo['staff_name']}}</h4>
        </div>
    </nav>
    <section class="target target-selected w-100">
        <div class="header w-100 p-3">
            <h3>Students</h3>
            <hr>
        </div>
        <div class="main-panel w-100">
            <div class="category-summary">
                <div class="buttons-list w-100">
                    <button class="btn-option selected">GENERAL <span class="fragment"></span></button>
                    <a href="register"><button class="btn-option">ADD STUDENT <span class="fragment"></span></button></a>
                </div>
            </div>
            <div class="category-tables">

                <div class="panel active w-100">
                    <div class="cat-head w-100">
                        <h4>GENERAL OVERVIEW</h4>
                        <hr class="w-100">
                    </div>
                    <div class="table-section w-100">
                        <table class="table table-dark table-striped w-100">
                            <thead class="table-thead">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">STUDENT ID</th>
                                    <th scope="col">OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student_data as $item)
                                <tr>
                                    <td scope="row">{{ $item->stud_id }}</td>
                                    <td>{{ $item->stud_name }}</td>
                                    <td>{{ $item->stud_email }}</td>
                                    <td>{{ $item->stud_id }}</td>
                                    <td>
                                        <div class="options">
                                            <a href="{{ url('update-student/'.$item->stud_id) }}"><button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                            <a href="{{ url('delete-student/'.$item->stud_id) }}"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <section class="target w-100">
        <div class="header w-100 p-3">
            <h3>Staff</h3>
            <hr>
        </div>
        <div class="main-panel w-100">
            <div class="category-summary">
                <div class="buttons-list w-100">
                    <button class="btn-staff btn_side_selected">GENERAL <span class="fragment"></span></button>
                    <button class="btn-staff">ADD STAFF <span class="fragment"></span></button>
                </div>
            </div>
            <div class="category-tables">
                <div class="panel-staff staff-active w-100">
                    <div class="cat-head w-100">
                        <h4>GENERAL STAFF OVERVIEW</h4>
                        <hr class="w-100">
                    </div>
                    @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    <hr>
                    @endif

                    @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    <hr>
                    @endif
                    <div class="table-section w-100">
                        <table class="table table-dark table-striped w-100">
                            <thead class="table-thead">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">STAFF NAME</th>
                                    <th scope="col">STAFF EMAIL</th>
                                    <th scope="col">STAFF ID</th>
                                    <th scope="col">OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @csrf
                                @foreach ($staff_data as $item)
                                <tr>
                                    <td scope="row">{{ $item->staff_id }}</td>
                                    <td>{{ $item->staff_name }}</td>
                                    <td>{{ $item->staff_email }}</td>
                                    <td>{{ $item->staff_role }}</td>
                                    <td>
                                        <div class="options">
                                            <a href="{{ url('edit-student/'.$item->stud_id) }}"><button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                            <a href="{{ url('delete-staff/'.$item->staff_id) }}"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-staff w-100">
                    <div class="cat-head w-100">
                        <h4>ADD STAFF</h4>
                        <hr class="w-100">
                    </div>
                    <form action="{{route('auth.add-staff')}}" class="w-100" method="post">

                        @csrf
                        @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        <hr>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                        <hr>
                        @endif
                        <div class="form-input w-100">
                            <label for="name">NAME:</label>
                            <input type="text" class="form-control w-75" id="name" name="name" />
                        </div>
                        <hr>
                        <div class="form-input w-100">
                            <label for="name">EMAIL:</label>
                            <input type="email" class="form-control w-75" id="email" name="email" />
                        </div>
                        <hr>
                        <div class="form-input w-100">
                            <label for="name">PASSWORD:</label>
                            <input type="password" class="form-control w-75" id="password" name="password" />
                        </div>
                        <hr>
                        <div class="form-input w-100">
                            <label for="password">CONFIRM PASSWORD:</label>
                            <input type="password" class="form-control w-75" id="con_pass" name="con_pass" />
                        </div>
                        <hr>
                        <div class="form-input w-100">
                            <label for="password">Role:</label>
                            <select name="role_id" class="form-control w-25" id="">
                                <option value="2" selected>TEACHER</option>
                                <option value="1">MANAGER</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-input w-100">
                            <button class="btn btn-primary" type="submit">ADD STAFF</button>
                        </div>


                    </form>

                </div>



            </div>
        </div>

    </section>
    <section class="target w-100">
        <div class="header w-100 p-3">
            <h3>COURSES</h3>
            <hr>
        </div>
        <div class="main-panel w-100">
            <div class="category-summary">
                <div class="buttons-list w-100">
                    <button class="course-btn course-btn-selected">ALL COURSES <span class="fragment"></span></button>
                    <button class="course-btn">ADD COURSES <span class="fragment"></span></button>
                </div>
            </div>
            <div class="category-tables">

                <div class="course-panel course-panel-selected w-100">
                    <div class="cat-head w-100">
                        <h4>ALL COURSES</h4>
                        <hr class="w-100">
                    </div>
                    <div class="table-section w-100">
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
                        <table class="table table-dark table-striped w-100">
                            <thead class="table-thead">
                                <tr>
                                    <th scope="row">#</th>
                                    <th scope="col">COURSE NAME</th>
                                    <th scope="col">COURSE CODE</th>
                                    <th scope="col">DESCRIPTION</th>

                                    <th scope="col">CHAPTERS</th>
                                    <th scope="col">LECTURER</th>
                                    <th scope="col">START DAY</th>

                                    <th scope="col">OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @csrf
                                @foreach ($unit_data as $item)
                                <tr>
                                    <td scope="row">{{ $item->id }}</td>
                                    <td>{{ $item->unit_name }}</td>
                                    <td>{{ $item->unit_code }}</td>
                                    <td>{{ $item->unit_desc }}</td>
                                    <td>{{ $item->unit_chapters }}</td>
                                    <td>{{ $item->unit_lecturer }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ url('delete-unit/'.$item->id) }}"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="course-panel w-100">
                    <div class="cat-head w-100">
                        <h4>ADD COURSES FORM</h4>
                        <hr class="w-100">
                    </div>
                    <div class="table-section w-100">
                        @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        <hr>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                        <hr>
                        @endif


                        <div class="form-holder w-100 p-4">
                            <form action="{{route('auth.add-unit')}}" method="post" class="form-control w-75 py-4 ">
                                @csrf
                                <div class="form-input w-100">
                                    <label for="unit_name">Course name:</label>
                                    <input type="text" name="unit_name" class="form-control w-75">
                                    <span class="text-danger">@error('unit_name'){{ $message }} @enderror</span>
                                </div>
                                <hr>
                                <div class="form-input w-100">
                                    <label for="unit_desc">Course description:</label>
                                    <textarea class="form-control w-75" name="unit_desc" rows="5" id="comment"></textarea>
                                    <span class="text-danger">@error('unit_desc'){{ $message }} @enderror</span>
                                </div>
                                <hr>
                                <div class="form-input w-100">
                                    <label for="unit_name">Course code:</label>
                                    <input type="text" name="unit_code" class="form-control w-75">
                                    <span class="text-danger">@error('unit_code'){{ $message }} @enderror</span>
                                </div>
                                <hr>
                                <div class="form-input w-100">
                                    <label for="unit_name">Course chapters:</label>
                                    <input type="number" name="unit_chapters" class="form-control w-75">
                                    <span class="text-danger">@error('unit_chapters'){{ $message }} @enderror</span>
                                </div>
                                <hr>
                                <div class="form-input w-100">
                                    <label for="unit_name">Course lecturer:</label>
                                    <select name="unit_lec" id="" class="form-control w-75">
                                        @foreach ($staff_data as $lecturer)
                                        <option value="{{ $lecturer->staff_name }}">{{ $lecturer->staff_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="w-50 py-2">
                                    <button class="btn btn-primary w-100">ADD UNIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </section>
    <section class="target w-100">
        <div class="header">
            <h3>Settings</h3>
            <hr>
        </div>
        <div class="text-settings w-100">
            <p>Our lazy devs are still working on this bit,</p>
            <p>Follow the link below for some entertainment instead</p>
            <a href="https://youtu.be/dQw4w9WgXcQ" title="QUALITY STUFF"> QUALITY CONTENT</a>
        </div>
    </section>
</body>

<script>

</script>

</html>