<!DOCTYPE html>
<html lang="en">

@include('temps.header')

<body>
    @include('temps.nav')
    <section class="login-body w-100">
        <form action="{{route('auth.admin-user')}}" method="POST" class="form-control p-4 w-50">
            @csrf
            <nav>
            <button class="btn btn-secondary p-2 m-1 w-30"><a href="adminlogin" style="text-decoration:none; color:white;">ADMIN</a></button>
            <button class="btn btn-secondary p-2 m-1 w-30"><a href="leclogin" style="text-decoration:none; color:white;">LECTURER</a></button>
            <button class="btn btn-secondary p-2 m-1 w-30"><a href="login" style="text-decoration:none; color:white;">STUDENT</a></button>
            </nav>
            <div class="usr-input w-100">
                <h2>ADMIN LOGIN</h2>
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
            <div class="usr_input w-100">
                <label for="password">Enter your email here:</label>
                <input type="email" name="email" required placeholder="Email" class="form-control" value="">
                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
            </div>
            <div class="usr_input w-100">
                <label for="email">Enter your password here:</label>
                <input type="password" name="password" required class="form-control" value="">
                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
            </div>
            <div class="usr_input w-100">
                <a href="register">Don't have an account?</a>
            </div>
            <button class="btn btn-secondary p-2 m-1 w-100" type="submit">SUBMIT</button>
        </form>
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