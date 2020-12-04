<!--Navigation START-->
<div class="navigation font-decorated">
    <div class="nav_a">
        <div class="nav_a_signin">
            @auth{{--ログイン状態によって表示切替--}}
                <form action="{{ route('logout') }}" method="POST" name="logout">@csrf</form>
                <i class="fas fa-sign-out-alt"></i>
                <a href="javascript:logout.submit()">Logout</a>
            @else
                @hasSection('hideLogin')
                @else
                    <i class="fas fa-sign-in-alt"></i>
                    <a href="{{ route('login') }}">Login</a>
                @endif

                @hasSection('hideSignUp')
                @else
                <!--($__env->yieldContent('hideSignUp') === '')-->
                    <i class="fas fa-plus"></i>
                    <a href="{{ route('register') }}">Sign Up</a>
                @endif
            @endauth
        </div>

    </div>
    <div class="nav">
        <a class="nav_b_logo" href="/">IS IT</a>
        <p class="nav_b_title">@yield('nav_title')</p>
        <div class="nav_b">
            <a class="nav-link" href="#">Link A</a>
            <a class="nav-link" href="#">Link B</a>
            <a class="nav-link" href="#">Link C</a>
            <a class="nav-link" href="#">Link D</a>
            <a class="nav-link" href="/knowledge/yourPost">YOUR POST</a>
        </div>

        <label class="hamburger" for="hamburger">
            <input type="checkbox" id="hamburger">
            <div class="line one"></div>
            <div class="line two"></div>
            <div class="line three"></div>

            <div class="nav-side">
                <a class="nav-link side" href="#">Link A</a>
                <a class="nav-link side" href="#">Link B</a>
                <a class="nav-link side" href="#">Link C</a>
                <a class="nav-link side" href="#">Link D</a>
                <a class="nav-link side" href="#">Link E</a>
            </div>
        </label>
    </div>
</div>
<!--Navigation END-->
