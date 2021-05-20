<x-header />
<x-a_navbar />
<div class="container-fluid row">
    <div class="col-4"></div>
    <div class="col-4">

        @if(!isset($data))
        <form method="POST" action="/admin/postaddproduct">
            @csrf
            <div class="py-3">
                <h1>Add Products</h1>
            </div>
            <div class="mb-2">
                <label class="form-label">Product Name:</label>
                <input type="text" name="product_name" class="form-control" aria-describedby="emailHelp">
                <span class="text-danger">@error('product_name'){{ $message }}@enderror</span>
            </div>

            <select class="form-select mb-2" name="product_category" aria-label="Default select example">
                <option selected>Product Category</option>
                <option value="T-Shirts">T-Shirts</option>
                <option value="Jeans">Jeans</option>
                <option value="Shoes">Shoes</option>
              </select>
              <span class="text-danger">@error('product_category'){{ $message }}@enderror</span>

            <div class="mb-3">
                <label for="product_image" class="form-label">Product Image</label>
                <input class="form-control" name="product_image" type="file" id="product_image">
                <span class="text-danger">@error('product_image'){{ $message }}@enderror</span>
            </div>
              
            <div class="mb-3">
                <label class="form-label">Product Price</label>
                <input type="number" name="product_price" class="form-control" aria-describedby="emailHelp">
                <span class="text-danger">@error('productprice'){{ $message }}@enderror</span>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Product Description</label>
                <input type="text" name="product_desc" class="form-control" aria-describedby="emailHelp">
                <span class="text-danger">@error('productdesc'){{ $message }}@enderror</span>
            </div>

            <button type="submit" class="btn" style="color:white;background-color:#031633;">Add Product</button>
        </form>
        @else
                <form method="POST" action="/admin/posteditproduct/{{$data['id']}}">
                    @csrf
            <div class="py-3">
                <h1>Edit Products</h1>
            </div>
            <div class="mb-2">
                <label class="form-label">Product Name:</label>
                <input type="text" name="product_name" class="form-control" value="{{$data['name']}}" aria-describedby="emailHelp">
                <span class="text-danger">@error('product_name'){{ $message }}@enderror</span>
            </div>

            <select class="form-select mb-2" name="product_category" aria-label="Default select example">
                <option selected>{{$data['category']}}</option>
                <option value="T-Shirts">T-Shirts</option>
                <option value="Jeans">Jeans</option>
                <option value="Shoes">Shoes</option>
              </select>
              <span class="text-danger">@error('product_category'){{ $message }}@enderror</span>

            <div class="mb-3">
                <label for="product_image" class="form-label">Product Image</label>
                <input class="form-control" name="product_image" type="file" id="product_image">
                <span>{{$data['image']."*"}}</span>
                <span class="text-danger">@error('product_image'){{ $message }}@enderror</span>
            </div>
              
            <div class="mb-3">
                <label class="form-label">Product Price</label>
                <input type="number" name="product_price" value="{{$data['price']}}" class="form-control" aria-describedby="emailHelp">
                <span class="text-danger">@error('productprice'){{ $message }}@enderror</span>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Product Description</label>
                <input type="text" name="product_desc" value="{{$data['description']}}" class="form-control" aria-describedby="emailHelp">
                <span class="text-danger">@error('productdesc'){{ $message }}@enderror</span>
            </div>

            <select class="form-select mb-2" name="product_status" aria-label="Default select example">
                <option selected>{{$data['status']}}</option>
                <option value="Available">Available</option>
                <option value="Unavailable">Unavailable</option>
              </select>
              <span class="text-danger">@error('product_category'){{ $message }}@enderror</span>

            <button type="submit" class="btn" style="color:white;background-color:#031633;">Edit Product</button>
        </form>
        @endif
    </div>
    <div class="col-4"></div>
</div>
