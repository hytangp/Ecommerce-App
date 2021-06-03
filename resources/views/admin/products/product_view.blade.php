<x-header />
<x-a_navbar />

<div class="m-3 d-flex justify-content-between">
    <button type="button" class="btn btn-success"><a class="text-white" href="{{ route('Add-Product') }}">Add Product</a></button>
    <div class="col-1 d-flex">  
        <select class="form-select" id="product_category" aria-label="Default select example" onChange="window.location.href = this.options[this.selectedIndex].value">
            <option hidden>Sort:</option>
            @foreach($category_data as $item)
            <option value="/admin/sort_product/category={{$item['category']}}">{{$item['category']}}</option>
            @endforeach
          </select> 
    </div>

</div>
    
<div class="container-fluid">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Image</th>
                <th>Price</th>
                <th>Description</th>
                <th>Status</th>
                <th class="text-center" colspan="2">Actions</th>
            </tr>
        </thead>
        @foreach($data as $item)
            <tr class="product-{{$item['id']}}" id="{{$item['id']}}">
                <td>@if($item['status']=='Unavailable')
                    <input class="form-check-input checkStatus" type="checkbox"
                           id="checkStatus_{{$item['id']}}"></td>
                    @else
                    <input class="form-check-input checkStatus" checked type="checkbox"
                           id="checkStatus_{{$item['id']}}"></td>
                    @endif</td>
                <td>{{ $item['id'] }}</td>              
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['category'] }}</td>
                <td>{{ $item['image'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['description'] }}</td>
                @if($item['status']=='Available')
                <td id="status_{{$item['id']}}" style="color:greenyellow">{{$item['status']}}</td>
                @else
                <td id="status_{{$item['id']}}">{{$item['status']}}</td>
                @endif
                <td><a href="/admin/editproduct/{{ $item['id'] }}" class="btn btn-primary">Edit</a></td>
                <td><a href="#" class="btn btn-danger delete_btn">Delete</a></td>
            </tr>
        @endforeach
    </table>
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-4">
        {{$data->links()}}
        </div>
    </div>
</div>

<script>
    $(document).ready(function()
    {
        $('.delete_btn').click(function()
        {
            var id = $(this).parents("tr").attr("id");
            //alert(id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => 
            {
                if (result.isConfirmed) 
                {
                    $.ajax(
                        {
                            type : "GET",
                            url : "/admin/productdelete/"+id,
                            success: function (response)
                            {
                            /*alert("hello");*/
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Record deleted successfully',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                $('.product-'+id).empty();
                            },
                        });
                }
            })
        });
});    


$(document).ready(function()
    {
        $('.checkStatus').on('click',function()
        {
            var id = $(this).parents('tr').attr('id');
            if($('#checkStatus_'+id).is(':checked'))
            {
                status = 'Available';
            }
            else
            {
                status = 'Unavailable';
            }
            $.ajax({
                type:'GET',
                url:'/admin/updateproductstatus',
                data:{
                    product_id:id,
                    product_status:status,
                },
                success:function()
                {
                    if(status=='Available')
                    {
                    $('#status_'+id).css('color','greenyellow');
                    }
                    else
                    {
                        $('#status_'+id).css('color','white');
                    }
                    $('#status_'+id).text(status);
                },
            });
        });
    });
    
</script>
