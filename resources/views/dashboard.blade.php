@extends('main')
@section('content')
<div class="card">
    <div class="card-header">Revenue This Month</div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
            <th>Client Name</th>
            <th>Sale</th>
            <th>Cash Received</th>
            <th>Due</th>

            </thead>
            <tbody>
            @php
            $totalSale=0;
            $totalReceived=0;
            @endphp
            @foreach($sales as $sale)
                <tr>
                    <td>{{$sale->clientName}}</td>
                    <td>{{$sale->sale}}</td>
                    <td>{{$sale->cashReceived}}</td>
                    @php($totalSale+=$sale->sale)
                    @php($totalReceived+=$sale->cashReceived)
                    <td>{{$sale->sale - $sale->cashReceived}}</td>

                </tr>

            @endforeach


            </tbody>
            <tfoot>
                <th colspan="1"></th>
            <th>Total : <b>{{$totalSale}}</b></th>
            <th>Received : <b>{{$totalReceived}}</b></th>
            <th>Due : <b>{{$totalSale-$totalReceived}}</b></th>
            </tfoot>


        </table>


    </div>
</div>



@endsection