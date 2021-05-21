<x-header />
<x-u_navbar />

<div class="container-fluid">
    <marquee style="color:red" bgcolor='yellow'><b>**BEST OFFERS PREVAILING THIS DIWALI**</b></marquee>
    <div class="row">   
        <div class="col-lg-6">
            <center>
                <img class="card-img-top" src="{{url('/images/'.$data['image'])}}" style="height:500px;width:600px;" alt="Card image cap">
            </center>
        </div>
        <div class="col-lg-6 text-center" style="padding-top:150px">
            <h1>{{$data['name']}}</h1>
            <h3>{{$data['description']}}</h3>
            <h5>Category: {{$data['category']}}</h5>
            <h5>Price: {{$data['price']}} </h5>
            <button type="submit" class="btn" style="color:white;background-color:#031633;">Add to Cart</button>
            <button type="submit" class="btn" style="color:white;background-color:#031633;">Order Now</button>

        </div>
    </div>
</div>