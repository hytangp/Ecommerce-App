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
            <button type="submit" id="{{ $data['id'] }}" class="add_to_cart btn" style="color:white;background-color:#031633;">Add to Cart</button>
            <button type="submit" id="{{ $data['id'] }}" class="order_btn btn" style="color:white;background-color:#031633;">Order Now</button>
        </div>
    </div>
</div>

<script>
    
$(document).ready(function()
    {
        $('.add_to_cart').on('click',function()
        {
            //var  email = $(this).parent('div').attr('id');
            var id = $(this).attr('id');

            $.ajax({
                type:'GET',
                url:'/add_to_cart',
                data:{
                    product_id:id,
                },
                success:function()
                {
                    alert("Product added to Cart");
                }
            });
        });
    });

    $(document).ready(function()
    {
        $('.order_btn').click(function()
        {
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Order it!'
            }).then((result) => 
            {
                if (result.isConfirmed) 
                {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Order Placed successfully',
                        showConfirmButton: false,
                        timer: 1500
                            })
                    $.ajax({
                        type:'GET',
                        url:'/order',
                        data:
                        {
                            product_id:id,
                        },
                        success:function()
                        {
                            window.location.href = '/vieworders'
                        }
                    });

                }
                else
                {
                    Swal.fire({
                            position: 'top-end',
                            icon: 'danger',
                            title: 'Order Not Placed',
                            showConfirmButton: false,
                            timer: 1500
                            })
                }
            })
        });
});

</script>
