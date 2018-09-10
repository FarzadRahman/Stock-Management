<form method="post" action="{{route('insertQuantity')}}">
    {{csrf_field()}}
<div class="row">
    <div class="form-group col-md-4">
        <label>{{$product->productName}}</label>
    </div>
    <div class="form-group col-md-6">
        <label>Quantity</label>
        <input type="hidden" value="{{$product->productId}}" name="productId">
        <input type="number" class="form-control" name="quantity" placeholder="insert quantity" required>
    </div>
    <div class="form-group col-md-12">
    <button class="btn btn-success">Insert</button>
    </div>
</div>
</form>