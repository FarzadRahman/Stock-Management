<form method="post" action="{{route('product.insert')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="productName" class="form-control col-md-10" value="{{$product->productName}}" placeholder="Product Name">
            </div>
            <div class="form-group">
                <label>Code</label>
                <input type="text" class="form-control col-md-10" name="code" placeholder="Code" value="{{$product->code}}">
            </div>
            <div class="form-group">
                <label>Sku</label>
                <input type="text" class="form-control col-md-10" name="sku" placeholder="SKU" value="{{$product->sku}}">
            </div>



        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control col-md-10" name="price" placeholder="Unit Price" value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control col-md-10" name="image" placeholder="Image">
            </div>

            <button class="btn btn-success">Insert</button>



        </div>




    </div>
</form>