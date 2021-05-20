<x-header />
<x-u_navbar />
        <div class="container-fluid row">
            <div class="col-4"></div>
            <div class="col-4">
                    <form method="POST" action="/postusersignin">
                        @csrf
                        @if(Session::get('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <div class="py-5 text-center">
                            <h1>Sign-In</h1>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email') }}" aria-describedby="emailHelp">
                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                        </div>
                        <button type="submit" class="btn" style="color:white;background-color:#031633;">Sign-In</button>
                    </form>
                    <center>
                    Not yet Registered?<a href="/signup" style="color:red">Sign-Up</a>
                    </center>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    </body>
</html>