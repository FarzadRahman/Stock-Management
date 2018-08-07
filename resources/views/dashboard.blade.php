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
                <tr>
                    <td>Client 1</td>
                    <td>10000</td>
                    <td>8000</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>Client 2</td>
                    <td>10000</td>
                    <td>8000</td>
                    <td>2000</td>
                </tr>

                <tr>
                    <td>Client 3</td>
                    <td>10000</td>
                    <td>8000</td>
                    <td>2000</td>
                </tr>

                <tr>
                    <td>Client 4</td>
                    <td>10000</td>
                    <td>8000</td>
                    <td>2000</td>
                </tr>

            </tbody>
            <tfoot>
                <th colspan="1"></th>
            <th>Total : <b>40000</b></th>
            <th>Received : <b>36000</b></th>
            <th>Due : <b>8000</b></th>
            </tfoot>


        </table>


    </div>
</div>



@endsection