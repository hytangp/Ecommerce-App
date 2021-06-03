<x-header />
<x-u_navbar />
    
<div class="container-fluid">
    <h3>Orders</h3>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Image</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        @if(!$data)
           <tr>
               <td colspan=6>No Orders</td>
           </tr> 
        @else
        @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>              
                <td>{{ $item->name }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->image }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->description }}</td>
            </tr>
        @endforeach
        @endif
    </table>
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-4">
        
        </div>
    </div>
</div>