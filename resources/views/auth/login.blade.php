@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <div class="form-group mt-4">
                            <input type="text" id="username" name="username" class="form-control"
                                placeholder="Username" />
                        </div>
                        <div class="form-group mt-4">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password" />
                        </div>
                        <div class="form-group mt-4">
                            <button type="button" id="sign-in-button" class="form-control  btn btn-primary">Sign
                                In</button>
                        </div>
                        <div class="form-group text-center mt-3">
                            <span class="badge bg-danger " id="auth-msg"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
//  get the sign in button ID
let signInButton = document.getElementById("sign-in-button");

// bind the button to click event
signInButton.addEventListener("click", function(e) {
    e.preventDefault();

    // get the username and password from the form input
    let credentials = {
        username: document.getElementById('username').value,
        password: document.getElementById('password').value
    }

    // authenticate to laravel
    axios.post("{{url('/')}}/sign-in", credentials).then(res => {
        if (res && res.request && res.request.status === 200) {
            location.href = "{{url('/')}}/home";
        }
    }).catch(err => {
        let authErrorElement = document.getElementById("auth-msg");
        if (err && err.response && err.response.status == 422) {
            authErrorElement.innerHTML = "Username or Password is incorrect";
            console.log(err);
        }

    });
});
</script>
@endsection