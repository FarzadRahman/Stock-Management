@extends('main')
@section('header')

    <!-- DataTables -->

    <link href="{{url('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">


@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Select Client</label>
                    <select class="form-control">
                        <option value="">Select Client</option>
                        @foreach($clients as $client)
                            <option value="{{$client->clientId}}">{{$client->clientName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12"></div>

                <div class="form-group col-md-6">
                    <label>Select Product</label>
                    <select class="form-control" id="productForCart">
                        <option value="">Select Product</option>
                        @foreach($products as $product)
                            <option value="{{$product->productId}}">{{$product->productName}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group col-md-6">
                    <button class="btn btn-info" onclick="addProduct()">Add Product</button>
                </div>

            </div>



        </div>

        <div class="card-body">

        <div id="cartTable">

        </div>

        </div>


    </div>





@endsection
@section('foot-js')

    <script src="{{url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<script>
    $(function () {
        refreshCart();
    });
function addProduct() {
    var productId=$('#productForCart').val();
    if(productId !=''){
        $.ajax({
            type: 'POST',
            url: "{!! route('card.add') !!}",
            cache: false,
            data: {_token: "{{csrf_token()}}",'productId': productId},
            success: function (data) {
                console.log(data);
                refreshCart();
            }
        });
    }


}

function refreshCart() {
    $.ajax({
        type: 'POST',
        url: "{!! route('card.refresh') !!}",
        cache: false,
        data: {_token: "{{csrf_token()}}"},
        success: function (data) {
            $("#cartTable").html(data);

        }
    });
}



</script>



@endsection