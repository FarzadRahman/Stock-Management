@extends('main')
@section('header')

    <!-- DataTables -->

    <link href="{{url('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">


@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="form-group col-md-6">
                <label>Select Client</label>
                <select class="form-control">
                    <option>Client 1</option>
                    <option>Client 2</option>
                    <option>Client 3</option>
                    <option>Client 4</option>
                </select>
            </div>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                <th>Product</th>
                <th>Sku</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
                </thead>
                <tbody>
                @php($grandTotal=0)
                {{--@foreach($jobs as $job)--}}
                @php($total=0)
                <tr>
                {{--<input type="hidden" name="jobId[]" value="{{$job->jobId}}">--}}
                <td>Product 1</td>
                <td>123654</td>
                <td   onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false;" onfocusout="changeFolderName(this)">10</td>
                <td   onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false;" onfocusout="changeFolderName(this)">10</td>
                    <td>10000</td>
                </tr>

                <tr>
                    {{--<input type="hidden" name="jobId[]" value="{{$job->jobId}}">--}}
                    <td>Product 2</td>
                    <td>123654</td>
                    <td   onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false;" onfocusout="changeFolderName(this)">10</td>
                    <td   onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false;" onfocusout="changeFolderName(this)">10</td>
                    <td>10000</td>
                </tr>

                <tr>
                    {{--<input type="hidden" name="jobId[]" value="{{$job->jobId}}">--}}
                    <td>Product 3</td>
                    <td>123654</td>
                    <td   onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false;" onfocusout="changeFolderName(this)">10</td>
                    <td   onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false;" onfocusout="changeFolderName(this)">10</td>
                    <td>10000</td>
                </tr>
                @php($grandTotal+=$total)
                {{--@endforeach--}}

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td><b>Total</b></td>
                    <td><input type="number" id="total" class="form-control" value="30000" readonly></td>
                </tr>

                <tr>
                    <td colspan="3"></td>
                    <td><b>Paid</b></td>
                    <td><input type="number" onkeyup="checkDue()" id="paid" class="form-control"></td>
                </tr>

                <tr>
                    <td colspan="3"></td>
                    <td><b>Currency</b></td>
                    <td>
                        <select class="form-control" id="currency">
                            <option>$</option>
                            <option>€</option>
                            <option>£</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><b>Payment Date</b></td>
                    <td><input type="text" id="paymentDate" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><b>Due</b></td>
                    <td><input type="number" id="due" class="form-control" readonly></td>
                </tr>



                <tr>
                    <td colspan="4"></td>
                    {{--<td><button class="btn btn-success" onclick="submit()">Generate PDF</button></td>--}}
                    <td><a href="{{route('invoice.generate')}}" class="btn btn-success"> Generate PDF</a></td>
                </tr>






                </tfoot>


            </table>




        </div>


    </div>





@endsection
@section('foot-js')

    <script src="{{url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    {{--<script src="{{url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>--}}
    {{--<!-- Buttons examples -->--}}
    {{--<script src="{{url('public/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>--}}
    {{--<script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>--}}
    <script src="{{url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>



    <script>
        function listenForDoubleClick(element) {
            element.contentEditable = true;
            setTimeout(function() {
                if (document.activeElement !== element) {
                    element.contentEditable = false;
                }
            }, 300);
        }
        function changeFolderName(x) {
            var id=$(x).data('panel-id');
            var folderName=$(x).html();
            {{--$.ajax({--}}
            {{--type: 'POST',--}}
            {{--url: "{!! route('invoice.edit') !!}",--}}
            {{--cache: false,--}}
            {{--data: {_token: "{{csrf_token()}}",id: id,folderName:folderName},--}}
            {{--success: function (data) {--}}
            {{--//                console.log(data);--}}
            {{--submitForm();--}}
            {{--}--}}
            {{--});--}}
        }
        function changeQuantity(x) {
            var id=$(x).data('panel-id');
            var quantity=$(x).html();
            {{--$.ajax({--}}
            {{--type: 'POST',--}}
            {{--url: "{!! route('invoice.edit') !!}",--}}
            {{--cache: false,--}}
            {{--data: {_token: "{{csrf_token()}}",id: id,quantity:quantity},--}}
            {{--success: function (data) {--}}
            {{--console.log(data);--}}
            {{--submitForm();--}}
            {{--}--}}
            {{--});--}}
        }
        function changeRate(x) {
            var id=$(x).data('panel-id');
            var rate=$(x).html();
            {{--$.ajax({--}}
            {{--type: 'POST',--}}
            {{--url: "{!! route('invoice.edit') !!}",--}}
            {{--cache: false,--}}
            {{--data: {_token: "{{csrf_token()}}",id: id,rate:rate},--}}
            {{--success: function (data) {--}}
            {{--submitForm();--}}
            {{--}--}}
            {{--});--}}
        }
        $(function() {
            $('#paymentDate').datepicker({
                format:'yyyy-mm-dd'
            });
            checkDue();
        });
        function checkDue() {
            var total=$('#total').val();
            var paid=$('#paid').val();
            $('#due').val(total-paid);
        }
        function submit() {
            var jobId = $('input[name="jobId[]"]').map(function () {
                return this.value; // $(this).val()
            }).get();
            uniqueArray = jobId.filter(function(item, pos, self) {
                return self.indexOf(item) == pos;
            });
            jobId=uniqueArray;
            var bill="{{$grandTotal}}";
            var paymentDate=$('#paymentDate').val();
            var paid=$('#paid').val();
            var currency=$('#currency').val();
            var bankId=$('input[name=optradio]:checked').val();
            var invoiceNumber=$('#invoiceNumber').val();
            if(paymentDate==""){
                alert('please insert payment date');
                return false;
            }
            if(paid==""){
                alert('please insert payment');
                return false;
            }
            if(!$("input:radio[name='optradio']").is(":checked")) {
                alert('please select bank');
                return false;
            }
            if(invoiceNumber==""){
                alert('invoice number in empty');
                return false;
            }
            {{--$.ajax({--}}
            {{--type: 'POST',--}}
            {{--url: "{!! route('invoice.generate') !!}",--}}
            {{--cache: false,--}}
            {{--data: {_token: "{{csrf_token()}}",jobId: jobId,paid:paid,paymentDate:paymentDate,currency:currency,bankId:bankId,invoiceNumber:invoiceNumber,bill:bill},--}}
            {{--success: function (data) {--}}
            {{--//                console.log(data);--}}
            {{--var link = document.createElement("a");--}}
            {{--link.download = data+".pdf";--}}
            {{--var uri = '{{url("public/invoice")}}'+'/'+data+'.pdf';--}}
            {{--link.href = uri;--}}
            {{--document.body.appendChild(link);--}}
            {{--link.click();--}}
            {{--document.body.removeChild(link);--}}
            {{--delete link;--}}
            {{--}--}}
            {{--});--}}
        }
    </script>



@endsection