<table class="table table-bordered table-striped">
    <thead>
    <th>Product</th>
    <th>Sku</th>
    <th>Quantity</th>
    <th>Rate</th>
    <th>Discount</th>
    <th>Total</th>
    <th>Action</th>
    </thead>
    <tbody>
    @php($grandTotal=0)
    {{--@foreach($jobs as $job)--}}

    @foreach($cart as $product)
        @php($total=0)
        <tr>
            {{--<input type="hidden" name="jobId[]" value="{{$job->jobId}}">--}}
            <td>{{$product->productName}}</td>
            <td>{{$product->sku}}</td>
            <td   onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false;" data-panel-id="{{$product->cartId}}" onfocusout="changeQuantity(this)" >{{$product->quantity}}</td>
            <td>{{$product->price}}</td>
            <td   onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false;" data-panel-id="{{$product->cartId}}" onfocusout="changeDiscount(this)">{{$product->discount}}</td>
            @php($total+=$product->quantity*$product->price*(100-$product->discount)/100)
            <td>{{$total}}</td>
            <td><button class="btn btn-danger" data-panel-id="{{$product->cartId}}" onclick="deleteProduct(this)">Delete</button></td>
        </tr>
        @php($grandTotal+=$total)
    @endforeach





    </tbody>
    <tfoot>
    <tr>
        <td colspan="4"></td>
        <td><b>Total</b></td>
        <td><input type="number" id="total" class="form-control" value="{{$grandTotal}}" readonly></td>
    </tr>

    <tr>
        <td colspan="4"></td>
        <td><b>Paid</b></td>
        <td><input type="number" onkeyup="checkDue()" id="paid" class="form-control"></td>
    </tr>



    <tr>
        <td colspan="4"></td>
        <td><b>Due</b></td>
        <td><input type="number" id="due" class="form-control" value="{{$grandTotal}}" readonly></td>
    </tr>



    <tr>
        <td colspan="5"></td>
        <td><a href="{{route('invoice.generate')}}" class="btn btn-success"> Generate PDF</a></td>
    </tr>






    </tfoot>


</table>



<script>
    function listenForDoubleClick(element) {
        element.contentEditable = true;
        setTimeout(function() {
            if (document.activeElement !== element) {
                element.contentEditable = false;
            }
        }, 300);
    }

    function checkDue() {
        var paid=$('#paid').val();
        var total="{{$grandTotal}}";

        $('#due').val(total-paid);



    }

    function changeQuantity(x) {
        var id=$(x).data('panel-id');
        var quantity=$(x).html();
        $.ajax({
        type: 'POST',
        url: "{!! route('cart.changeQuantity') !!}",
        cache: false,
        data: {_token: "{{csrf_token()}}",id: id,quantity:quantity},
        success: function (data) {

            refreshCart();
        }
        });
    }

    function deleteProduct(x) {
        var id=$(x).data('panel-id');

        $.ajax({
            type: 'POST',
            url: "{!! route('cart.deleteProduct') !!}",
            cache: false,
            data: {_token: "{{csrf_token()}}",id: id},
            success: function (data) {

                refreshCart();
            }
        });

    }

    function changeDiscount(x) {
        var id=$(x).data('panel-id');
        var discount=$(x).html();
        $.ajax({
        type: 'POST',
        url: "{!! route('cart.changeDiscount') !!}",
        cache: false,
        data: {_token: "{{csrf_token()}}",id: id,discount:discount},
        success: function (data) {
        // console.log(data);
            refreshCart();

        }
        });
    }

</script>