@extends('main')
@section('content')

    <!-- The Modal -->
    <div class="modal" id="clientEditModal">
        <div class="modal-dialog" style="max-width: 80%;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Client</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="clientEditModalBody">

                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>






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
                                    <form method="post" action="{{route('client.insert')}}">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Client Name</label>
                                                    <input type="text" class="form-control col-md-10" name="clientName" placeholder="Client Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Area</label>
                                                    <select class="form-control col-md-10" name="areaId">
                                                        <option value="">Select Area</option>
                                                        @foreach($areas as $area)
                                                            <option value="{{$area->areaId}}">{{$area->areaName}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <label>Address</label>
                                                    <textarea class="form-control" name="address" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control col-md-10" name="statusId">
                                                        @foreach($status as $value)
                                                            <option value="{{$value->statusId}}">{{$value->statusName}}</option>
                                                        @endforeach
                                                    </select>
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



                    <br>


                    <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>

                            <th>Client</th>
                            <th>Area</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{$client->clientName}}</td>
                                <td>{{$client->areaName}}</td>
                                <td>{{$client->address}}</td>
                                <td>{{$client->statusName}}</td>
                                <td><button class="btn btn-info" data-panel-id="{{$client->clientId}}" onclick="editClient(this)">Edit</button></td>
                            </tr>
                        @endforeach



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

        function editClient(x) {
            var clientId=$(x).data('panel-id');

            $.ajax({
            type: 'POST',
            url: "{!! route('client.edit') !!}",
            cache: false,
            data: {_token: "{{csrf_token()}}",'clientId': clientId},
            success: function (data) {
                $('#clientEditModalBody').html(data);
                $('#clientEditModal').modal();
            // console.log(data);
            }
            });
        }

    </script>

@endsection