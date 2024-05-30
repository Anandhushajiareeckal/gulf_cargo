<?php
$padding = null;
 $shipment_count = count($shipments );
 $padding = true;
 $qr_id = 0;
 foreach($shipments  as $key => $shipment) {
    // $padding = 'pt-3';
    //   $key+1;
    //   if ($key == 0) {
    //     $padding = 'p-3';
    //   }
    ?>


<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <title>Invoice</title>
</head>

    <style>

    @media print {
        .printable-invoice {
            page-break-before: always;
        }
      @page {
        margin: 0;
      }
      /* .printxxxx {
        page-break-after: always;
      } */


      td{
        padding:0px !important;
      }
        h4{
            padding:0px !important;
            margin:0px !important;
        }
        #print_button button{
            display:none;
        }
        .address {
            font-size: 14px !important;
        }

    }
    .main_div{
            font-size: 10px !important;
        }

        .pod{
            height: 155px;
        }
        .container {
            width: 100%;


        }
        .main_div{
            border: solid;
        }
        .ml-4{
            margin-left: 30px;
        }
        .ml-3{
            margin-left: 15px;
        }
        .inv_no{
            background: black;
            color: #fff;
            width: 100px;
            width: 155px;
            padding: 5px;
        }
        .table_head th{
            border-bottom: solid;
            border-top: solid;
            border-right: solid;
            text-align: center;
        }
        .info_table tbody{
            text-align: center;
            border-bottom:#fff;
        }
        input[type="checkbox"] {
            transform: scale(1); /* Change the scale value to adjust the size */
        }
        input[type="checkbox"] {
            border-width: 3px; /* Change the border-width value to adjust the width */
        }
        .pacling_list td{
            border-right: solid;
            border-bottom: solid;
        }

        .pacling_list th{
            border-right: solid;
            border-top: solid;
            background: #d9d9d9;
        }
        .pacling_list .sno{
            background: #d9d9d9;
        }

        .adress_table td{
            padding: 1px;
        }
        .item_table td, th{
            padding: 1px;
        }

        .footer b, p {
            margin:1px;
            text-align: justify;
        }


        @media screen and (max-width: 600px) {
            .shipment-info {
            text-align: left;
            }
        }

        #printButton {
            position: fixed;
            top: 30px;
            left: 30px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #c52014;
            color: #fff;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            z-index: 1000;
            width: 95px
        }

        #printButton:hover {
            background-color: #009eb3;
        }


    </style>

<body>
    @foreach ($shipment->packages as $i=>$item )


    <div class=" printable-invoice {{ $padding == true ? 'm-3 ' : '' }} mt-2">
        <div class="main_div">
            <div class="row">
                <div class="col-5 mt-4 ml-4">
                    <div  style="float:left;">
                        <img src="{{asset($agency->logo) }}" alt="Bestexpress" style="height:60px;" class="img-responsive logo" >
                    </div>
                        <h6>DIVISION OF {{$agency->name}},
                            {{$agency->address}},
                            {{$agency->district}},
                            PIN:- {{$agency->pincode}}
                       </h6>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-center" >
                    <h1 class="inv_no">INV NO </h1>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-center" >
                    {{-- <svg id="barcode"></svg> --}}
                    <div id="qrcode{{$qr_id}}" style="text-align: center; padding-top: 10px; padding-bottom: 10px;"></div>

                    {{-- <h1 class="inv_no">{{ $shipment->booking_number }} </h1> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table info_table">
                        <thead  class="table_head">
                            <tr>
                                <th>DATE</th>
                                <th>REF NO. </th>
                                <th>PKG</th>
                                <th>WGHT</th>
                                <th>ORIGIN</th>
                                <th>DESTINATION</th>
                                <th>AWB NO:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</td>
                                <td>{{ $item->box->box_name}} </td>
                                <td>{{ $shipment->number_of_pcs }}</td>
                                <td>{{ round($shipment->normal_weight, 2) }}</td>
                                <td>UAE</td>
                                <td>COK</td>
                                <td>{{ $awb_no ? $awb_no : 'Nill' }}<td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead class="table_head">
                            <tr>
                                <th class="col-4 text-center"style="padding-left:100px;" > FROM ADDRESS</th>
                                <th class="col-4 text-center" style="padding-left:200px;">TO ADDRESS</th>
                                <th class="col-4 text-center" style="padding-left:200px;">SERVICE</th>
                            </tr>
                        </thead>

                    </table>

                </div>
                <div class="row adress_table" style="margin-left: 3px;">
                    <div class="col-2" style="margin-top: -16px; border-right: solid; border-bottom: solid; border-width: 3px;">
                        <table class="table">
                            <tbody>
                                    <tr><td>ADDRESS</td></tr>
                                    <tr><td>ZIP/ POST CODE</td></tr>
                                    <tr><td>STATE/ PROVINCE</td></tr>
                                    <tr><td>COUNTRY</td></tr>
                                    <tr><td>TEL:</td></tr>
                                    <tr><td>MOBILE:</td></tr>
                                    <tr><td> E-MAIL:</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-3 mt-2 pt-3 " style="border-bottom:solid; border-width: 3px;margin-top: -16px; font-size: 11px;">
                        <b class="align-items-center justify-content-center shipment-info">
                            {{ $item->box->sender ? $item->box->sender->name  : ''}} ,
                            {{ $item->box->sender ? $item->box->sender->address->address : '' }},
                            <br> MOB:
                            +{{ $item->box->sender ? $item->box->sender->country_code_phone : ''}} {{ $item->box->sender ? $item->box->sender->phone : ''}}
                            <br>
                        </b>
                    </div>
                    <div class="col-2" style="border:solid; border-top:none; border-width: 3px; margin-top: -16px;">
                        <table class="table">
                            <tbody>
                                    <tr><td>ADDRESS</td></tr>
                                    <tr><td>ZIP/ POST CODE</td></tr>
                                    <tr><td>STATE/ PROVINCE</td></tr>
                                    <tr><td>COUNTRY</td></tr>
                                    <tr><td>TEL:</td></tr>
                                    <tr><td>MOBILE:</td></tr>
                                    <tr><td> E-MAIL:</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-3 mt-2 pt-3" style="border-bottom:solid; border-width: 3px; margin-top: -16px; font-size: 11px;">
                        <b class="align-items-center justify-content-center shipment-info">

                            {{ $item->box->receiver ? $item->box->receiver->name  : ''}} ,
                            {{ $item->box->receiver ? $item->box->receiver->address->address : '' }},
                            <br> MOB:
                            +{{ $item->box->receiver ? $item->box->receiver->country_code_phone : ''}} {{ $item->box->receiver ? $item->box->receiver->phone : ''}}
                            <br>
                        </b>
                    </div>
                    <div class="col-2" style="border:solid; border-top:none; border-width: 3px; margin-top: -16px;">
                        <table class="table" >
                            <tbody  class="tb_checkbox">
                                <tr><td>DOCUMENTS <input type="checkbox" class="ml-3"></td></tr>
                                <tr><td>INSURANCE <input type="checkbox" class="ml-3"></td></tr>
                                <tr><td>EXPRESS<input type="checkbox" class="ml-3"></td></tr>
                                <tr><td>PARCEL<input type="checkbox" class="ml-3"></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="mt-1"><b>PACKING LIST</b></h5>
            </div>
            <div class="row item_table">
                <div class="col-6">
                    <table class="table text-center pacling_list">
                        <thead >
                            <tr>
                                <th>SI NO.</th>
                                <th>TEM DESCRIPTION</th>
                                <th>QTY</th>
                                <th>PRICE($)</th>
                                <th>TOTAL VALUE</th>
                            </tr>
                        </thead>
                       <tbody>


                            <tr>
                                <td class="sno">{{$i + 1}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->unit_price}}</td>
                                <td>{{$item->subtotal}}</td>

                            </tr>





                       </tbody>
                    </table>
                </div>
                <div class="col-6"  style="margin-left: -24px;">
                    <table class="table text-center pacling_list" style="border-left: solid">
                        <thead >
                            <tr>
                                <th>SI NO.</th>
                                <th>TEM DESCRIPTION</th>
                                <th>QTY</th>
                                <th>PRICE($)</th>
                                <th>TOTAL VALUE</th>
                            </tr>
                        </thead>
                       <tbody>





                            <tr>
                                <td colspan="4" class="text-center"><b>TOTAL CIF VALUE IN USD </b></td>
                                <td ><b>${{$item->subtotal}}</b></td>
                            </tr>
                       </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center" style="height: 30px; " >
                    <b >Total Values are Customs purpose only, not for commercial purpose REASON : GIFT</b>
                    <hr style="height: 3px;background-color: black; 0;opacity: inherit;">
                </div>

            </div>
            <div class="row mt-5 footer">
                <div class="col-8">
                    <div class="col-10 ml-4" style="margin-top: -25px; ">
                        <p><b>CONSIGNOR DECLARATION AND AUTHORISATION</b></p>
                        I <b>{{$shipment->sender->name}} , {{ $shipment->sender->address->address }}, MOB: +{{ $shipment->sender->country_code_phone}} {{ $shipment->sender->phone }} , ID {{ $shipment->sender->identification_number }}</b>
                        <p>
                            hereby declare that the Courier gift parcel being sent by me through GULF CARGO INTERNATIONAL / DIVISION OF
                            {{$agency->name}} does not contain any Dangerous / Hazardous goods as per IATA
                            regulations and does not carry cash/ currency
                        </p>
                        <p>
                            I do here by declare that the goods sending by me include only Bonafide commercial samples prototypes /
                            documents and bonafide gift articles for personal use which are not subject to any prohibition or restriction on
                            their import to India.
                        </p>
                        <p>
                            I do here by declare that the particulars of contain are in regulation with the International courier laws of the
                            land at the consignee point also.
                        </p>
                        <p>
                            I do here by declare that the food items contained in the consignment are within the period of validity
                            prescribed under low.
                        </p>
                        <p>
                            I do here by appointed and authorize M/s {{$agency->name}} Muscut Trading as my authorized courier agent to do the
                            courier baggage clearance at India on behalf of me.
                        </p>
                        <b>SIGNATURE:</b>
                    </div>
                </div>
                <div class="col-1 mb-4 d-flex align-items-center justify-content-center" style="background: gray; color:#fff;">
                    <h1>POD</h1>
                </div>
                <div class="col-3 mb-4 " >
                    <table class="table">
                        <tr>
                            <td><p>
                                I’the undersigned, on behalf of the above sender/shipper
                                acknowledge the receipt of the goods in good condition.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>RECEIVER’S NAME</b>
                            </td>
                        </tr>
                        <tr>
                            <td>DATE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TIME:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AM / PM:</td>
                        </tr>
                        <tr>
                            <td>
                                <b>SIGNATURE</b>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>
    </div>

    <script>
          var bookingNumber = "<?php echo $shipment->booking_number; ?>";

        // Generate the QR code
        // console.log(<?php echo 'qrcode'. $qr_id; ?>);
        var qrcode = new QRCode(document.getElementById("qrcode<?php echo $qr_id; ?>"), {
            text: bookingNumber,
            width: 135, // Width of the QR code
            height: 100, // Height of the QR code
            colorDark : "#000000", // Dark color
            colorLight : "#ffffff", // Light color
            correctLevel : QRCode.CorrectLevel.H // Error correction level
        });
    </script>
    @php
        $padding = false;
        $qr_id++;
    @endphp
    @endforeach

    @if( $shipment_count == $key+1)
        <button id="printButton" onclick="printPDF()">Print</button>

    @endif
    <script>


        function printPDF() {
            // Hide the print button while printing
            document.getElementById('printButton').style.display = 'none';

            // Print the content
            window.print();

            // Show the print button again after printing is done
            document.getElementById('printButton').style.display = 'block';
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<?php } ?>


