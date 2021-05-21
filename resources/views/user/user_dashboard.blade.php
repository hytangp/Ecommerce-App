<x-header />
<x-u_navbar />
<div class="container-fluid">
    <marquee style="color:red" bgcolor='yellow'><b>**BEST OFFERS PREVAILING THIS DIWALI**</b></marquee>
    <div class="row my-3">
        @foreach ($data as $item)
        <div class="col-4 p-2">
            <div class="card text-center" onclick="window.location.href='/product_view/product={{$item['id']}}'">
                <center>
                    <img class="card-img-top" src="{{url('/images/'.$item['image'])}}" style="height:200px;width:200px;" alt="Card image cap">
                </center>
                <div class="card-body">
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