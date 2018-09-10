@extends('main')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus"></i>
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog" style="max-width: 80%;">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Product</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="post" action="{{route('product.insert')}}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="productName" class="form-control col-md-10" placeholder="Product Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control col-md-10" name="code" placeholder="Code">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control col-md-10" name="sku" placeholder="SKU">
                                            </div>



                                        </div>

                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <input type="number" class="form-control col-md-10" name="price" placeholder="Unit Price">
                                              </div>
                                              <div class="form-group">
                                                  <label>Image</label>
                                                  <input type="file" class="form-control col-md-10" name="image" placeholder="Image">
                                              </div>

                                              <button class="btn btn-success">Insert</button>



                                          </div>




                                      </div>
                                    </form>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- Edit Modal -->
                    <div class="modal" id="editModal">
                        <div class="modal-dialog" style="max-width: 80%;">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Product</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body" id="editModalBody">

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>



                    <!-- Edit Modal -->
                    <div class="modal" id="stockModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Insert Stock</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body" id="stockModalBody">



                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>


                <div class="card-body">

                    <div class="card-header-tabs">
                        <h4>Manage Products</h4>
                    </div>

                    <!--                        <div align="right">-->
                    <!--                            <a demo productef="cvform.php"> <button class="btn btn-info">Add New</button></a>-->
                    <!--                        </div>-->
                    <br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <table id="productTable" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>
                            <th width="20%">Image</th>
                            <th width="20%">Product Name</th>
                            <th width="10%">Available/quantity</th>
                            <th width="10%">Sku</th>
                            <th width="10%">Price/unit</th>
                            <th width="10%">Status</th>
                            <th width="20%">Action</th>
                        </tr>
                        </thead>
                        <tbody>



                        </tbody>

                    </table>



                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->






@endsection
@section('foot-js')

    <script src="{{url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{url('public/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="{{url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script>

        $(document).ready(function() {


            dataTable=  $('#productTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(0)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                Filter: true,
                stateSave: true,
                type:"POST",
                "ajax":{
                    "url": "{!! route('product.getProductData') !!}",
                    "type": "POST",
                    data:function (d){
                        d._token="{{csrf_token()}}";
                        // d.date=$('#date1').val();
                        // d.clientId=$('#clientId').val();
                        // d.statusId=$('#statusId').val();
                    },
                },
                columns: [
                    { "data": function(data){
                        if(data.image !=null) {
                            return '<img src="{{url("")}}/public/images/products/thumb/' + data.image + '" height="80" width="80">'
                        }
                        else{ return "";}
                                ;},
                        "orderable": false, "searchable":false, "name":"selected_rows" },
                    { data: 'productName', name: 'productName' },
                    { data: 'stock', name: 'stock' },
                    { data: 'sku', name: 'sku' },
                    { data: 'price', name: 'price' },
                    { data: 'statusName', name: 'statusName' },
                    { "data": function(data){
                            return '<button class="btn btn-info btn-sm" data-panel-id="'+data.productId+'" onclick="edit(this)">edit</buton> '+
                                        ' <button class="btn btn-success btn-sm" data-panel-id="'+data.productId+'" onclick="insertStock(this)">insert stock</buton>'

                            ;},
                        "orderable": false, "searchable":false, "name":"selected_rows" },



                ]
            } );
        } );

        function edit(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "{!! route('product.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'productId': id},
                success: function (data) {

                    $('#editModalBody').html(data);
                    $('#editModal').modal();

                }
            });



        }

        function insertStock(x) {
            var id=$(x).data('panel-id');


            $.ajax({
                type: 'POST',
                url: "{!! route('product.stock') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'productId': id},
                success: function (data) {
                    // console.log(data);
                    $('#stockModalBody').html(data);
                    $('#stockModal').modal();

                }
            });




        }
    </script>

@endsection