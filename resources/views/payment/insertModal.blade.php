
    <form method="post" action="{{route('payment.insertPayment',['id'=>$invoice->invoice_mainId])}}">
        {{csrf_field()}}
        <div class="row ">
            <div class="col-md-12">
                <h5 align="center">{{$invoice->clientName}}</h5>
            </div>
        <div class="form-group col-md-6">
            <label>Amount</label>
            <input type="number" class="form-control" name="amount" placeholder="TK" required>
        </div>

            <div class="form-group col-md-12">
                <button class="btn btn-sm btn-success">Insert</button>
            </div>

        </div>


    </form>




