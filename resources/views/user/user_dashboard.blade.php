<x-header />
<x-u_navbar />
<div class="container-fluid">
    <div class="row my-3">
        @foreach ($data as $item)
        <div class="col-4 m-2">
            <div class="card text-center">
                <center><img class="card-img-top" src="{{url('/images/'.$item['image'])}}" style="height:200px;width:200px;" alt="Card image cap">
                </center><div class="card-body">
                    <h5 class="card-title">{{$item['name']}}</h5>
                    <p class="card-text">{{$item['description']}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><b>Category:</b> {{$item['category']}}</small>
                    <small class="text-muted"><b>Price:</b> {{$item['price']}}</small>
                </div>
                </div>
        </div>
        @endforeach
    </div>
</div>