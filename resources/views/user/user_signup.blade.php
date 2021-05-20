<x-header />
<x-u_navbar />
<div class="container-fluid row">
    <div class="col-4"></div>
    <div class="col-4">
        <form method="POST" action="/postregisteruser">
            @csrf
            <div class="py-4">
                <h1>Sign-Up</h1>
            </div>
            <div class="mb-2">
                <label class="form-label">Name</label>
                <input type="text" name="user_name" class="form-control" aria-describedby="emailHelp">
                <span class="text-danger">@error('user_name'){{ $message }}@enderror</span>
            </div>
            <div class="mb-2">
                <label class="form-label">Email</label>
                <input type="email" name="user_email" class="form-control" aria-describedby="emailHelp">
                <span class="text-danger">@error('user_email'){{ $message }}@enderror</span>
            </div>
            <div class="mb-2">
                <label class="form-label">Contact Number</label>
                <input type="text" name="user_contactnumber" class="form-control" aria-describedby="emailHelp">
                <span class="text-danger">@error('user_contactnumber'){{ $message }}@enderror</span>
            </div>
            <div class="mb-2">
                <label class="form-label">Address</label>
                <input type="text" name="user_address" class="form-control" aria-describedby="emailHelp">
                <span class="text-danger">@error('user_address'){{ $message }}@enderror</span>
            </div>
            <div class="mb-2">
                <label class="form-label">Password</label>
                <input type="password" name="user_password" class="form-control">
                <span class="text-danger">@error('user_password'){{ $message }}@enderror</span>
            </div>
            <button type="submit" class="btn" style="color:white;background-color:#031633;">Sign-Up</button>
        </form>
    </div>
    <div class="col-4"></div>
</div>
</div>
</body>
</html>
