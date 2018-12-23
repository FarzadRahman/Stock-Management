
    <form method="post" action="{{route('payment.insertPayment',['id'=>$invoice->invoice_mainId])}}">
        {{csrf_field()}}
        <div class="row ">
            <div class="col-md-12">
                <h5 align="center">{{$invoice->clientName}}</h5>
            </div>
            <div class="col-md-12"><hr></div>
            <div class="col-md-3" style="text-align: center">Total :{{$invoice->total}} </div>
            <div class="col-md-3" style="text-align: center">Paid :{{$invoice->cashReceived}} </div>
            <div class="col-md-3" style="text-align: center">Due :{{$invoice->total - $invoice->cashReceived}} </div>
            <div class="col-md-12"><hr></div>

        <div class="form-group col-md-4">
            <label>Amount</label>
            <input type="number" class="form-control" name="amount" placeholder="TK" required>
        </div>
            <div class="form-group col-md-8">
                <label>Remark</label>
                <textarea class="form-control" name="other" placeholder="remark"></textarea>
            </div>
            <div class="form-group col-md-12 ">
                <button class="btn btn-sm btn-success pull-right">Insert</button>
            </div>

            <div class="col-md-12" style="border: solid 1px black; height: 300px; overflow-y: scroll;">
                <table class="table table-striped">
                    <thead>
                        <th style="text-align: center;width: 20%">Paid</th>
                        <th style="text-align: center;width: 60%">Remark</th>
                        <th style="text-align: center;width: 20%">Date</th>
                    </thead>
                    <tbody>
                    @foreach($payment as $pay)
                        <tr>
                            <td>{{$pay->payment}}</td>
                            <td align="center">{{$pay->other}}</td>
                            <td>{{$pay->created_at}}</td>
                        </tr>

                    @endforeach

                    </tbody>


                </table>

            </div>





        </div>


    </form>




