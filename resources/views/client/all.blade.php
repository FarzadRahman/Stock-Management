@extends('main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4>Manage Clients</h4>
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
                                    <h4 class="modal-title">Add Client</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Client Name</label>
                                                <input type="text" class="form-control col-md-10" placeholder="Client Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Area</label>
                                                <input type="text" class="form-control col-md-10" placeholder="Area">
                                            </div>




                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control"></textarea>
                                                {{--<input type="text" class="form-control col-md-10" placeholder="Address">--}}
                                            </div>
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control col-md-10" placeholder="Color">
                                            </div>

                                            <button class="btn btn-success">Insert</button>



                                        </div>



                                    </div>
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



                    <br>


                    <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>

                            <th>Client</th>
                            <th>Location</th>
                            <th>Register Date</th>

                            <th width="8%">Status</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>

                            <td>demo client</td>
                            <td>Dhaka</td>
                            <td>2018/04/10</td>
                            <td>Pending
                            </td>
                        </tr>
                        <tr>

                            <td>demo client</td>
                            <td>Rangpur</td>

                            <td>2018/06/12</td>
                            <td>Active
                            </td>
                        </tr>
                        <tr>

                            <td>demo client</td>
                            <td>Barishal</td>

                            <td>2018/05/12</td>
                            <td>Active
                            </td>
                        </tr>
                        <tr>

                            <td>demo client</td>
                            <td>Khulna</td>
                            <td>2018/02/15</td>
                            <td>Pending
                            </td>
                        </tr>
                        <tr>

                            <td>demo client </td>
                            <td>Khulna</td>
                            <td>2018/04/10</td>
                            <td>Pending
                            </td>
                        </tr>
                        <tr>

                            <td>demo client</td>
                            <td>Dhaka</td>

                            <td>2018/06/12</td>
                            <td>Active
                            </td>
                        </tr>
                        <tr>

                            <td>demo client </td>
                            <td>Barishal</td>

                            <td>2018/05/12</td>
                            <td>Active
                            </td>
                        </tr>
                        <tr>

                            <td>demo client</td>
                            <td>Dhaka</td>

                            <td>2018/02/15</td>
                            <td>Active
                            </td>
                        </tr>
                        <tr>

                            <td>demo client</td>
                            <td>Barishal</td>
                            <td>2011/04/25</td>
                            <td>Active
                            </td>
                        </tr>
                        <tr>

                            <td>Demo Client</td>
                            <td>Dhaka</td>

                            <td>2018/04/25</td>
                            <td>Active
                            </td>
                        </tr>
                        <tr>

                            <td>demo client</td>
                            <td>Dhaka</td>

                            <td>2011/04/25</td>
                            <td>Active
                            </td>
                        </tr>





                        <tr>

                            <td>demo client</td>
                            <td>Khulna</td>
                            <td>2011/04/25</td>
                            <td>Active
                            </td>
                        </tr>
                        <tr>

                            <td>demo client</td>
                            <td>Barishal</td>
                            <td>2018/04/10</td>
                            <td>Active
                            </td>
                        </tr>
                        <tr>

                            <td>demo client</td>
                            <td>Dhaka</td>

                            <td>2018/06/12</td>
                            <td>Active
                            </td>
                        </tr>
                        <tr>

                            <td>demo client</td>
                            <td>Dhaka</td>

                            <td>2018/05/12</td>
                            <td>Active
                            </td>
                        </tr>
                        <tr>

                            <td>demo client</td>
                            <td>Khulna</td>
                            <td>2018/02/15</td>
                            <td>Active
                            </td>
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