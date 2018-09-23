@extends('main')
@section('content')

    <!-- The Modal -->
    <div class="modal" id="paymentModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Insert Payment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="paymentModalBody">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
                </div>

            </div>
        </div>
    </div>




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
                <tr @if($inv->total !=$inv->cashReceived) style="background: #FF5733"  @endif>
                    <td><a href="{{route('invoice.get',['id'=>$inv->invoice_mainId])}}">{{$inv->invoiceNumber}}</a></td>
                    <td>{{$inv->clientName}}</td>
                    <td>{{$inv->total}}</td>
                    <td><a href="#" data-panel-id="{{$inv->invoice_mainId}}" onclick="addPayment(this)">{{$inv->cashReceived}}</a></td>
                    <td>{{$inv->created_at}}</td>
                    <td>{{$inv->statusName}}</td>


                </tr>

            @endforeach



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
                   "ordering":false
                }
            );
        } );

        function addPayment(x) {
            var invId=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "{!! route('payment.insertModal') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",invId: invId},
                success: function (data) {
                    $('#paymentModal').modal();
                    $('#paymentModalBody').html(data);
//                    console.log(data);


                }
            });

        }
    </script>

@endsection