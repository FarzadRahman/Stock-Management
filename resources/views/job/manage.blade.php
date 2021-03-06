@extends('main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="card-header-tabs">
                        <h4>Manage Clients</h4>
                    </div>

                    <!--                        <div align="right">-->
                    <!--                            <a demo clientef="cvform.php"> <button class="btn btn-info">Add New</button></a>-->
                    <!--                        </div>-->
                    <br>


                    <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>

                            <th>Job Title</th>
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