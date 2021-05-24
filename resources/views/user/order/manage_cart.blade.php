<x-header />
<x-u_navbar />
    
<div class="container-fluid">
    <h3>Products added in Cart:</h3>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Image</th>
                <th>Price</th>
                <th>Description</th>
                <th colspan=2><center>Actions</center></th>
            </tr>
        </thead>
        @foreach($data as $item)
            <tr class="product-{{$item->id}}" id="{{$item->id}}">
                <td>{{ $item->id }}</td>              
                <td>{{ $item->name }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->image }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->description }}</td>
                <td><a href="#" class="btn btn-danger order_btn">Order</a></td>
                <td><a href="#" class="btn btn-danger delete_btn">Delete</a></td>
            </tr>
        @endforeach
        <tr>
            <td colspan=6></td>
            <td>Total:</td>
            <td>{{ $total_price }}</td>
        </tr>
    </table>
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-4">
        
        </div>
    </div>
</div>

<script> 

$(document).ready(function()
    {
        $('.delete_btn').on('click',function()
        {
            var id = $(this).parents("tr").attr("id");
            $.ajax({
                type:'GET',
                url:'/delete_from_cart',
                data:{
                    product_id:id,
                },
                success:function()
                {
                    $('.product-'+id).empty();
                }
            });
        });
    });

    $(document).ready(function()
    {
        $('.order_btn').click(function()
        {
            var id = $(this).parents("tr").attr("id");
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