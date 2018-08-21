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
                                    <form method="post" action="{{route('product.insert')}}">
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
                </div>
                <div class="card-body">

                    <div class="card-header-tabs">
                        <h4>Manage Products</h4>
                    </div>

                    <!--                        <div align="right">-->
                    <!--                            <a demo productef="cvform.php"> <button class="btn btn-info">Add New</button></a>-->
                    <!--                        </div>-->
                    <br>


                    <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Available/quantity</th>
                            <th>Sku</th>
                            <th>Price/unit</th>
                            <th width="8%">Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td><img src="{{url('public/images/logo-sm.png')}}"></td>
                            <td>demo product</td>
                            <td>100</td>
                            <td>20180410</td>
                            <td>500</td>
                            <td>Inactive</td>
                            <td><button class="btn btn-info btn-sm "><i class="fa fa-edit"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="{{url('public/images/logo-sm.png')}}"></td>
                            <td>demo product</td>
                            <td>500</td>
                            <td>20180612</td>
                            <td>400</td>
                            <td>Active</td>
                            <td><button class="btn btn-info btn-sm "><i class="fa fa-edit"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="{{url('public/images/logo-sm.png')}}"></td>
                            <td>demo product</td>
                            <td>300</td>
                            <td>20180512</td>
                            <td>450</td>
                            <td>Active</td>
                            <td><button class="btn btn-info btn-sm "><i class="fa fa-edit"></i></button></td>
                        </tr>
                        <tr>
                            <td><img src="{{url('public/images/logo-sm.png')}}"></td>
                            <td>demo product</td>
                            <td>1000</td>
                            <td>20180215</td>
                            <td>600</td>
                            <td>Inactive</td>
                            <td><button class="btn btn-info btn-sm "><i class="fa fa-edit"></i></button></td>
                        </tr>

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
            $('#manageapplication').DataTable(

                {
                    "columnDefs": [
                        {
                            "targets": [0,1,3], //first column / numbering column
                            "orderable": false, //set not orderable

                        },

                    ]
                }
            );
        } );
    </script>

@endsection