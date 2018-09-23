
    <form method="post" action="{{route('payment.insertPayment',['id'=>$invoice->invoice_mainId])}}">
        {{csrf_field()}}
        <div class="row ">
            <div class="col-md-12">
                <h5 align="center">{{$invoice->clientName}}</h5>
            </div>

        <div class="form-group col-md-8">
            <label>Amount</label>
            <input type="number" class="form-control" name="amount" placeholder="TK" required>
        </div>
            <div class="form-group col-md-4">
                <button class="btn btn-sm btn-success">Insert</button>
            </div>

            <div class="col-md-12" style="border: solid 1px black; height: 300px; overflow-y: scroll;">
                <table class="table">
                    @foreach($payment as $pay)
                        <tr>
                            <td>{{$pay->payment}}</td>
                            <td>{{$pay->other}}</td>
                            <td>{{$pay->created_at}}</td>
                        </tr>

                    @endforeach

                </table>

            </div>





        </div>


    </form>




