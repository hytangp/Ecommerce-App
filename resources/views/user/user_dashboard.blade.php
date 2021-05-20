<x-header />
<x-u_navbar />
<div class="container-fluid">
    <div class="row my-3">
        @foreach ($data as $item)
        <div class="col-4">
            <div class="card">
                <img class="card-img-top" src="C:\xampp\htdocs\Ecommerce-App\resources\image\{{$item['image']}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$item['name']}}</h5>
                    <p class="card-text">{{$item['description']}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Category:{{$item['category']}}</small>
                    <small class="text-muted">Price:{{$item['price']}}</small>
                </div>
                </div>
        </div>
        @endforeach
    </div>
</div>