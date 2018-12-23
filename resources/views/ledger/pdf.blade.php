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
            font-size: 14px;

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
        footer{
            position: absolute;
            bottom: 0px;
        }
        #upperline {
            text-decoration: overline underline;
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
    <div style= "background: #fff; padding: 10px; ">

        <table border="0" style="width:100%; margin-top: 20px; text-align: center; border: none;">

            <tr>

                <td style="text-align: center; border: none;">  <h3><span style="border: 1px solid #787878; padding: 3px 40px;  background-color: #ddd;font-weight: bold">RETAIL LEDGER</span> </h3> </td>

            </tr>

        </table>


        <table style="width:100%; margin-top: 0; border: none;">

            <tr>
                <td style="width: 85%; border: none;">
                    <h4 style="color: #0476BD; ">TLC INTERNATIONAL PVT LTD</h4>
                    <p style="margin-top: -17px;">149/A, Baitush Sharaf Masjid Complex (Gr. Floor) <br>
                        Tejgaon, Dhaka.<br>
                        Hotline: 01678174065 <br>
                        E : support@miladycosmetics.com
                    </p>
                </td>

                <td style="border: none;width: 30%;"> <img style="float: right;height: 60px; width: 100px;" src="{{url('public/logo/milady.png')}}" alt=""> </td>
            </tr>

            <tr>
                <td style="width:60%; border: none;">
                    <h3 style="color: #0476BD">{{$client->clientName}}</h3>
                    <p style="margin-top: -17px;">{{$client->areaName}}<br>
                        {{$client->address}} <br>
                    </p>
                </td>
                <td style="border: none; margin-top: -100px;">
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
                <td style="text-align: center;" colspan=""><b>Date</b></td>
                <td style="text-align: center;" colspan=""><b>MEMO NO.</b></td>
                <td style="text-align: center;" colspan=""><b>OUT GOODS VALUE</b></td>
                <td style="text-align: center;" colspan=""><b>PAID</b></td>
                <td style="text-align: center;" colspan=""><b>BALANCE</b></td>
                <td style="text-align: center;" colspan=""><b>DR/CR</b></td>
            </tr>
            {{--@php($grandTotal=0)--}}

            {{--@foreach($carts as $product)--}}

                {{--<tr>--}}
                    {{--<td style="text-align: center;">{{$product->productName}}</td>--}}
                    {{--<td style="text-align: center;">{{$product->code}}</td>--}}
                    {{--<td style="text-align: center;">{{$product->quantity}}</td>--}}
                    {{--<td style="text-align: center;">{{$product->rate}}</td>--}}
                    {{--<td style="text-align: center;">{{$product->discount}}</td>--}}
                    {{--<td style="text-align: center;">--}}
                        {{--@php($grandTotal+=$product->quantity*$product->price*(100-$product->discount)/100)--}}
                        {{--{{$product->quantity*$product->price*(100-$product->discount)/100}}--}}

                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}



            {{--<tr>--}}
                {{--<td colspan="4" style="text-align: right;"><b>Total =</b> </td>--}}
                {{--<td style="text-align: center;">{{$grandTotal}} /-</td>--}}

            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td colspan="4" style="text-align: right;"><b>Paid =</b> </td>--}}
                {{--<td style="text-align: center;">0</td>--}}

            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td colspan="4" style="text-align: right;"><b>Due =</b> </td>--}}
                {{--<td style="text-align: center;">{{$grandTotal}} /-</td>--}}

            {{--</tr>--}}


        </table>



    </div>
</div>


<footer>
    <table style="width:100%;margin: 20px; border: none;">
        <tr>
            <td style="width: 72%; border: none;">&nbsp;&nbsp;<p id="upperline">SELLER'S SIGNATURE</p></td>
            <td style="width: 28%; border: none;"><p id="upperline">BUYER SIGNATURE & SEAL</p></td>
        </tr>
    </table>

    <h5 align="center">This is system generated invoice at {{date('Y-m-d')}}</h5>
</footer>
</body>
</html>