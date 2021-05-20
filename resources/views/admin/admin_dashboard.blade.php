<x-header />
<x-a_navbar />
@if(Auth::guard('admin')->check())
<div class="container-fluid">
    <div class="row align-items-start bg-dark">
        <div class="col-lg-4">
            <h1 class="display-1 text-light"><b>Total Nos. of Products:</b></h1>
            <h1 class="display-3 text-light"><i>{{$data}}</i></h1>
        </div>
        <div class="col-lg-4">
            <h1 class="display-1 text-light"><b>Total Nos. of Orders:</b></h1>
            <h1 class="display-3 text-light"><i>-</i></h1>
        </div>
        <div class="col-lg-4">
            <h1 class="display-1 text-light"><b>Total Nos. of Users:</b></h1>
            <h1 class="display-3 text-light"><i>-</i></h1>
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