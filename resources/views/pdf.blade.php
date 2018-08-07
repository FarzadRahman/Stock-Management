<!DOCTYPE html>
<html lang="en">
<head>
    <title>Invoice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <style>
        body {
            background: #ddd none repeat scroll 0 0;
        }
        .logo img {
            width: 80px;
        }
        .versity_name span {
            color: red;
        }
        .application h3 {
            color: red;
            font-size: 25px;
            margin-bottom: 30px;
            text-align: center;
            text-transform: uppercase;
        }
        .versity_name h2 {
            font-size: 37px;
            margin-left: 18px;
        }
        .application p {
            margin: 0;
            padding: 0;
        }
        .photo > p {
            border: 1px solid;
            height: 122px;
            margin-top: 5px;
            text-align: center;
            width: 110px;
        }
        .personal {
            border: 1px solid #000;
            margin-top: 5px;
            background-color: #B0DBF0;
        }
        .first_name {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            border-color: -moz-use-text-color #000 #000;
            border-image: none;
            border-style: none solid solid;
            border-width: medium 1px 1px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        input {
            border: medium none;
            padding: 0;
        }
    </style>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
</head>

<style>
    @page { size: auto;  margin: 0mm; }
</style>

<body style="background: #fff ">
<div class="structure">
    <div style= "background: #fff; padding: 40px; " class="container">

        <table border="0" style="width:100%; margin-top: 20px; text-align: center; border: none;">

            <tr>

                <td style="text-align: center; border: none;">  <h3><span style="border: 1px solid #787878; padding: 3px 40px;  background-color: #ddd;font-weight: bold">INVOICE</span> </h3> </td>

            </tr>

        </table>


        <table style="width:100%; margin-top: 0; border: none;">

            <tr>
                <td style="width: 85%; border: none;">
                    <h4 style="color: #0476BD; ">Milady Cosmetics</h4>
                    <p style="margin-top: -17px;">Demo Address <br>
                        P : 01600000000, 01700000000 <br>
                        E : support@miladycosmetics.com
                    </p>
                </td>

                <td style="border: none;width: 30%;"> <img style="float: right;height: 60px; width: 100px;" src="{{url('public/logo/milady.png')}}" alt=""> </td>
            </tr>

            <tr>
                <td style="width:60%; border: none;">
                    <h3 style="color: #0476BD">Client Name</h3>
                    <p style="margin-top: -17px;">Client Name<br> Client Area<br>
                        E: Client@gmail.com<br>
                        P: 01923400000

                    </p>
                </td>
                <td style="border: none;width:40%; margin-top: -100px;">
                    <table style="margin-bottom: 70px;">

                        <tr >
                            <td>Invoice Number:</td>
                            <td ><b>12345678</b></td>
                        </tr>
                        <tr >
                            <td>Invoice Date: </td>
                            <td >{{date('Y-m-d')}}</td>
                        </tr>
                        <tr >
                            <td>Payment Date:</td>
                            <td >2018-08-20</td>

                        </tr>
                    </table>


                </td>
            </tr>

        </table>

        <table border="0" style="width:100%;">
            <tr style="background: #B0DBF0;">
                {{--<td style="text-align: center;" colspan=""><b>Date</b></td>--}}
                <td style="text-align: center;" colspan=""><b>Product Name</b></td>
                <td style="text-align: center;" colspan=""><b>Sku</b></td>
                <td style="text-align: center;" colspan=""><b>Quantity</b></td>
                <td style="text-align: center;" colspan=""><b>Rate</b></td>
                <td style="text-align: center;" colspan=""><b>Total</b></td>
            </tr>
            @php($total=0)
            {{--@foreach($jobs as $job)--}}

                <tr>

                    <td style="text-align: center;">Product 1</td>
                    <td style="text-align: center;">654123</td>
                    <td style="text-align: center;">20</td>
                    <td style="text-align: center;">400</td>
                    <td style="text-align: center;">8000</td>
                </tr>
            <tr>
                <td style="text-align: center;">Product 2</td>
                <td style="text-align: center;">654654</td>
                <td style="text-align: center;">10</td>
                <td style="text-align: center;">500</td>
                <td style="text-align: center;">5000</td>
            </tr>

            <tr>
                <td style="text-align: center;">Product 3</td>
                <td style="text-align: center;">654789</td>
                <td style="text-align: center;">10</td>
                <td style="text-align: center;">1000</td>
                <td style="text-align: center;">10000</td>
            </tr>
                {{--@php($total+=$job->quantity * $job->rate)--}}
            {{--@endforeach--}}

            <tr>
                <td colspan="4" style="text-align: right;"><b>Total =</b> </td>
                <td style="text-align: center;">23000 /-</td>

            </tr>
            <tr>
                <td colspan="4" style="text-align: right;"><b>Paid =</b> </td>
                <td style="text-align: center;">0</td>

            </tr>
            <tr>
                <td colspan="4" style="text-align: right;"><b>Due =</b> </td>
                <td style="text-align: center;">23000 /-</td>

            </tr>


        </table>

        {{--<table border="0" style="width:100%; margin-top: 20px; text-align: center; border: none; margin-bottom: 0px;">--}}
            {{--<tr>--}}
                {{--<td style="text-align: center; border: none;">  <h4><b>***For Bank Details Please Check Next Page***</b></h4> </td>--}}
            {{--</tr>--}}
        {{--</table>--}}
        {{--<p style="page-break-before: always"></p>--}}
        {{--<div style="text-align: center;">Bank Details (Tech Cloud Ltd.)<br>--}}
            {{------------------------------------------------  <br>--}}

            {{--<img src="{{url('public/bankImage/').'/'.$bank->image}}" style="width: 80%;">--}}
        {{--</div>--}}


    </div>
</div>
</body>
</html>