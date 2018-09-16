@extends('main')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Invoice</h4>
        <a href="{{route('bill.create')}}" class="btn btn-info pull-right" >Generate Bill</a>
    </div>
    <div class="card-body">

        <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
            <thead>
            <tr>

                <th>Invoice Number</th>
                <th>Client Name</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Date</th>
                <th width="8%">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($invoice as $inv)
                <tr >
                    <td><a href="{{route('invoice.get',['id'=>$inv->invoice_mainId])}}">{{$inv->invoiceNumber}}</a></td>
                    <td>{{$inv->clientName}}</td>
                    <td>{{$inv->total}}</td>
                    <td>{{$inv->cashReceived}}</td>
                    <td>{{$inv->created_at}}</td>
                    <td>{{$inv->statusName}}</td>


                </tr>

            @endforeach

            <tr style="background: #FF5733">
                <td><a href="{{url('public/invoice/123456_2.pdf')}}">123456898</a></td>
                <td>demo client</td>
                <td>12000</td>
                <td>0</td>
                <td>2018-04-10</td>
                <td>Due
                </td>
            </tr>


            </tbody>

        </table>






    </div>



</div>



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