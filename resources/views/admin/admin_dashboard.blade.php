<x-header />
<x-a_navbar />
@if(Auth::guard('admin')->check())
<div class="container-fluid">
    <div class="row align-items-start bg-dark">
        <div class="col-lg-4">
            <h1 class="display-1 text-danger"><b>Total Nos. of Products:</b></h1>
            <h1 class="display-5 text-light"><i>{{$productdata}}</i></h1>
        </div>
        <div class="col-lg-4">
            <h1 class="display-1 text-danger"><b>Total Nos. of Orders:</b></h1>
            <h1 class="display-5 text-light"><i>{{$orderdata}}</i></h1>
        </div>
        <div class="col-lg-4">
            <h1 class="display-1 text-danger"><b>Total Nos. of Users:</b></h1>
            <h1 class="display-5 text-light"><i>{{$userdata}}</i></h1>
            <h1 class="display-5 text-danger">Active Users-</h1><i><h1 class="display-5 text-light">{{$activeusers}}</i></h1>
            <h1 class="display-5 text-danger">Inactive Users-</h1><i><h1 class="display-5 text-light">{{$inactiveusers}}</i></h1>
        </div>
    </div>
</div>
@else
<div class="container-fluid">
    <div class="row align-items-start bg-dark">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            <h1 class="display-1 text-light"><b>Admin Side</b></h1>
            <h1 class="display-3 text-danger"><i>Please Login First</i></h1>
        </div>
    </div>
</div>
@endif