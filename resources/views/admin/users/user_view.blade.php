<x-header />
<x-a_navbar />

<div class="container-fluid">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Status</th>
            </tr>
        </thead>
        @foreach($data as $user)
            <tr class="user-{{$user['id']}}" id="{{$user['id']}}">
                <td>@if($user['status']=='0')
                    <input class="form-check-input checkStatus" type="checkbox"
                           id="checkStatus_{{$user['id']}}"></td>
                    @else
                    <input class="form-check-input checkStatus" checked type="checkbox"
                           id="checkStatus_{{$user['id']}}"></td>
                    @endif</td>
                <td>{{ $user['id'] }}</td>              
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['contactnumber'] }}</td>
                <td>{{ $user['email'] }}</td>
                @if($user['status']=='1')
                <td id="status_{{$user['id']}}" style="color:greenyellow">Active</td>
                @else
                <td id="status_{{$user['id']}}">Inactive</td>
                @endif
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
        $('.checkStatus').on('click',function()
        {
            var id = $(this).parents('tr').attr('id');
            if($('#checkStatus_'+id).is(':checked'))
            {
                status = 'Active';
                send_status = '1';
            }
            else
            {
                status = 'Inactive';
                send_status = '0';
            }
            $.ajax({
                type:'GET',
                url:'/admin/updateuserstatus',
                data:{
                    user_id:id,
                    user_status:send_status,
                },
                success:function()
                {
                    if(status=='Active')
                    {
                    $('#status_'+id).css('color','greenyellow');
                    }
                    else
                    {
                        $('#status_'+id).css('color','white');
                    }
                    $('#status_'+id).text(status);
                },
                error: function (response){
                    window.location = '/signin';
                }
            });
        });
    });

</script>