<x-header />
<x-u_navbar />
<div class="container-fluid">
    <marquee style="color:red" bgcolor='yellow'><b>**BEST OFFERS PREVAILING THIS DIWALI**</b></marquee>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <form class="d-flex" action="/search" method="POST">
            @csrf
            <input class="form-control me-2" type="search" name="searchproduct" placeholder="Search Products" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </nav>
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