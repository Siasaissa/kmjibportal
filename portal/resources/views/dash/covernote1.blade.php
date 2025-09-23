<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covernote</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 60px;
        }

        .a4-page {
            /* Exact A4 dimensions: 210mm × 297mm */
            width: 210mm;
            height: 297mm;
            background: white;
            margin: 0 auto;
            padding: mm; /* Standard document margins */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            
            /* Content area will be 170mm × 257mm after padding */
            border: 1px solid #ddd; /* Just to visualize the page boundary */
        }

        .content-area {
            width: 100%;
            height: 98%;
            border: 2px solid #000; /* Solid black border */
            position: relative;
        }

        /* Print styles */
        @media print {
            body {
                padding: 0;
                background: white;
            }
            
            .a4-page {
                width: 210mm;
                height: 297mm;
                margin: 0;
                box-shadow: none;
                border: none;
            }
            
            .content-area {
                border: 2px solid #000; /* Keep solid border in print */
            }
        }

        /* Show dimensions for reference */
        .dimension-info {
            position: absolute;
            top: 5px;
            left: 5px;
            font-size: 10px;
            color: #999;
        }
        .line1 {
            position: absolute;
            top: 30mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
        .line2 {
            position: absolute;
            top: 40mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
        .line3 {
            position: absolute; /*already*/
            top: 58mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
        .line4 {
            position: absolute; /*already insurance type*/
            top: 67mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
        .line5 {
            position: absolute; /*already account*/
            top: 75mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
        .line6 {
            position: absolute; /*already address and insurer name*/
            top: 100mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
        .line7 {
            position: absolute; /*already Origin & Destination */
            top: 109mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
        .line8 {
            position: absolute; /*already Route Type */
            top: 118mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
                .line9 {
            position: absolute; /*already Air/Rail/Road/Sea */
            top: 127mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
                .line10 {
            position: absolute; /*already Cover Period From */
            top: 139mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
                .line11 {
            position: absolute; /*already DETAILS OF COVERAGE */
            top: 145mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
                .line12 {
            position: absolute; /*already GIT CONTERNARIZED & NON-CONTERNARIZED WITHIN TANZANIA */
            top: 150mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
                .line13 {
            position: absolute; /*already Items Covered */
            top: 156mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
                .line14 {
            position: absolute; /*already Items Covered */
            top: 165mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
                .line15 {
            position: absolute; /*already Produce Raw Agricultural products */
            top: 203mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        }
                .line16 {
            position: absolute; /*already Total */
            top: 210mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        }
                .line17 {
            position: absolute; /*already VAT */
            top: 217mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
         .line18 {
        position: absolute; /*already Total Premium */
        top: 224mm;   /* vertical center of page; change if needed */
        left: 0mm;   /* start after left margin */
        width: calc(219.5mm - 41mm); /* subtract left+right margins */
        border-top: 0.5mm solid black;
        }
         .line19 {
        position: absolute; /*already Total Premium */
        top: 250mm;   /* vertical center of page; change if needed */
        left: 0mm;   /* start after left margin */
        width: calc(219.5mm - 41mm); /* subtract left+right margins */
        border-top: 0.5mm solid black;
        } 
        .box1 {
        position: absolute; /* Mmaelezo*/
        top: 226mm;
        width: 60px;        /* box size */
        height: 60px;
        border: 2px solid black; /* border only */
        background: transparent; /* no fill */
        display: inline-block;   /* so you can place multiple side by side */
        left: 4mm;
        }
         .box2 {
        position: absolute; /* Qr code*/
        top: 226mm;
        width: 60px;        /* box size */
        height: 60px;
        border: 2px solid black; /* border only */
        background: transparent; /* no fill */
        display: inline-block;   /* so you can place multiple side by side */
        left: 25mm;
        }
         .box3 {
        position: absolute; /* mullika*/
        top: 226mm;
        width: 60px;        /* box size */
        height: 60px;
        border: 2px solid black; /* border only */
        background: transparent; /* no fill */
        display: inline-block;   /* so you can place multiple side by side */
        left: 46mm;
        }
        .verti1{
        position: absolute;
        left: 38mm;         /* center on page; change to desired x */
        top: 40mm;           /* start below top margin */
        height: calc(119mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
         .verti2{
        position: absolute; /*Carrying Type*/
        left: 70mm;         /* center on page; change to desired x */
        top: 109mm;           /* start below top margin */
        height: calc(38mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
         .verti3{
        position: absolute; 
        left: 96mm;         /* center on page; change to desired x */
        top: 109mm;           /* start below top margin */
        height: calc(38mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
                 .verti4{
        position: absolute;
        left: 122mm;         /* center on page; change to desired x */
        top: 109mm;           /* start below top margin */
        height: calc(38mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
                 .verti5{
        position: absolute;
        left: 148mm;         /* center on page; change to desired x */
        top: 109mm;           /* start below top margin */
        height: calc(38mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
         .verti6{           /*tas synergy */
        position: absolute;
        left: 118mm;         /* center on page; change to desired x */
        top: 40mm;           /* start below top margin */
        height: calc(80mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
         .verti7{           /*tas synergy */
        position: absolute;
        left: 142mm;         /* center on page; change to desired x */
        top: 40mm;           /* start below top margin */
        height: calc(67mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
        .lineb1{
            position: absolute;
            top: 49mm;   /* vertical center of page; change if needed */
            left: 118mm;   /* start after left margin */
            width: calc(101.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        }
        .lineb2{
            position: absolute;
            top: 87mm;   /* vertical center of page; change if needed */
            left: 118mm;   /* start after left margin */
            width: calc(101.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        }
            .lineb3{
            position: absolute;
            top: 89mm;   /* vertical center of page; change if needed */
            left: 118mm;   /* start after left margin */
            width: calc(101.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        }
         .verti8{           /*tas synergy */
        position: absolute;
        left: 85mm;         /* center on page; change to desired x */
        top: 139mm;           /* start below top margin */
        height: calc(36mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
         .verti8{           /*tas synergy */
        position: absolute;
        left: 85mm;         /* center on page; change to desired x */
        top: 156mm;           /* start below top margin */
        height: calc(67mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
         .verti9{           /*tas synergy */
        position: absolute;
        left: 128mm;         /* center on page; change to desired x */
        top: 156mm;           /* start below top margin */
        height: calc(75mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
        .lineb4{
        position: absolute;
        top: 233mm;   /* vertical center of page; change if needed */
        left: 65mm;   /* start after left margin */
        width: calc(70mm - 41mm); /* subtract left+right margins */
        border-top: 0.3mm solid black;
        }
        .line19 {
            position: absolute;
            top: 250mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
        .line20 {
            position: absolute;
            top: 245mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        }
         .verti10{           /*tas synergy */
        position: absolute;
        left: 80mm;         /* center on page; change to desired x */
        top: 139mm;           /* start below top margin */
        height: calc(32mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
         .verti11{           /*tas synergy */
        position: absolute;
        left: 200mm;         /* center on page; change to desired x */
        top: 139mm;           /* start below top margin */
        height: calc(220mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }

    </style>
</head>
<body>
    <div class="">
        <div class="content-area">
            <div class="dimension-info">
                <div>
                <img src="assets/dash/board_files/logo.png" alt="Photo" style="width:25%; height:25%; margin-top: -10.5%; object-fit:cover;">

                </div>

            </div>
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
            <div class="line4"></div>
            <div class="line5"></div>
            <div class="line6"></div>
            <div class="line7"></div>
            <div class="line8"></div>
            <div class="line9"></div>
            <div class="line10"></div>
            <div class="line11"></div>
            <div class="line12"></div>
            <div class="line13"></div>
            <div class="line14"></div>
            <div class="line15"></div>
            <div class="line16"></div>
            <div class="line17"></div>
            <div class="line18"></div>
            <div class="line19"></div>
            <div class="box1"><p style="text-align: center;">Scan Qr <br> code to <br> validate</p></div>
            <div class="box2"><img src="{{ $qrCodeBase64 }}" alt="QR CODE" style="width: 60px; height: 60px; object-fit: contain;"></div>
            <div class="box3"><p style="text-align: center; font-size: 8pt; margin-top: 10px;">Mullika <br> Alama <br> Kuhakikisha</p></div>
            <div class="verti1"></div>
            <div class="verti2"></div>
            <div class="verti3"></div>
            <div class="verti4"></div>
            <div class="verti5"></div>
            <div class="verti6"></div>
            <div class="verti7"></div>
            <div class="lineb1"></div>
            <div class="lineb2"></div>
            <div class="lineb3"></div>
            <div class="verti8"></div>
            <div class="verti9"></div>
            <div class="lineb4"></div>
            <div class="line19"></div>
            <div class="line20"></div>
            <div class="verti10"></div>
            <div class="verti11"></div>


            
            <!-- Content will go here -->
            <p style="text-align: center; margin-top: 125px; color: black;"><strong>INTERIM COVER NOTE</strong></p>
            <p style="text-align: left; margin-top: 25px; color: black; font-size: 8pt; margin-left: 1%;"><strong> Insured Name</strong></p>
            <p style="text-align: left; margin-top: -13px; color: black; font-size: 6pt; margin-left: 25%;"> {{ $covernote->customer->client_name }} </p>
            <p style="text-align: left; margin-top: -13px; color: black; font-size: 6pt; margin-left: 68%;"><strong> TIRA Cover Note No</strong></p>
            <p style="text-align: left; margin-top: -12px; color: black; font-size: 6pt; margin-left: 82%;">{{ $covernote->cover_note_reference }}</p>
            <p style="text-align: left; margin-top: 23px; color: black; font-size: 6pt; margin-left: 68%;"><strong> Risk Note No </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 82%;"><strong> {{ $covernote->cover_note_reference }} </strong></p>
            <p style="text-align: left; margin-top: 23px; color: black; font-size: 6pt; margin-left: 1%;"><strong> Insurance Type </strong></p>
            <p title="{{ $covernote->coverage->risk_name }}" style=" text-align: left; margin-top: -90%;  color: black; font-size: 6pt; margin-left: 25%; width: 160px;  white-space: nowrap;overflow: hidden;  text-overflow: ellipsis;"><strong>{{ $covernote->coverage->risk_name }}</strong></p>

            <p style="text-align: left; margin-top: -30px; color: black; font-size: 6pt; margin-left: 68%;"><strong> Policy No </strong></p>
            <p style="text-align: left; margin-top: -30px; color: black; font-size: 6pt; margin-left: 82%;"><strong> 1498237 </strong></p>
            <p style="text-align: left; margin-top: 10px; color: black; font-size: 6pt; margin-left: 1%;"><strong> Account </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 25%;"><strong> TAS SYNERGY</strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 68%;"><strong> Debit No </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 82%;"><strong> 10947 </strong></p>
            <p style="text-align: left; margin-top: 25px; color: black; font-size: 6pt; margin-left: 1%;"><strong> Address </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 25%;"><strong> {{ $covernote->street }} street {{ $covernote->region }}, {{ $covernote->district }}</strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 68%;"><strong> File # </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 82%;"><strong> #</strong></p>
            <p style="text-align: left; margin-top: 10px; color: black; font-size: 6pt; margin-left: 25%;"><strong> TIN: {{ $covernote->customer->tin }},</strong></p>
            <p style="text-align: left; margin-top: 25px; color: black; font-size: 6pt; margin-left: 1%;"><strong> Insurer Name </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 25%;"><strong> {{ $covernote->officer_name }}</strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 68%;"><strong> Intermediary</strong></p>
            <p style="text-align: left; margin-top: 0px; color: black; font-size: 6pt; margin-left: 68%;"><strong> KMJ Insurance Brokers Ltd</strong></p>
            <p style="text-align: left; margin-top: 16px; color: black; font-size: 6pt; margin-left: 1%;"><strong> Origin & Destination </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 25%;"><strong> Tanzania -to- Tanzania (No-Transhipment)</strong></p>
            <p style="text-align: left; margin-top: 25px; color: black; font-size: 6pt; margin-left: 1%;"><strong> Route Type </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 27%;"><strong> Carrying Type </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 43%;"><strong> Declaration Mode</strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 57%;"><strong> Valuation Type</strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 70%;"><strong> Bill of Lading</strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 86%;"><strong> Container No.</strong></p>
            <p style="text-align: left; margin-top: 25px; color: black; font-size: 6pt; margin-left: 1%;"><strong> Air/Rail/Road/Sea </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 27%;"><strong> Annual Cover </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 5pt; margin-left: 40%;"><strong> Warehouse to Warehouse</strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 57%;"><strong> Total Cost</strong></p>
            <p style="text-align: left; margin-top: 25px; color: black; font-size: 6pt; margin-left: 1%;"><strong> Cover Period From  </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 25%;"><strong> {{ $covernote->cover_note_start_date }} - To - {{ $covernote->cover_note_end_date }} </strong></p>
            <p style="text-align: left; margin-top: 24px; color: black; font-size: 6pt; margin-left: 1%;"><strong> DETAILS OF COVERAGE  </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 50%;"><strong> DESCRIPTION OF RISK </strong>
            <p style="text-align: left; margin-top: 15px; color: black; font-size: 6pt; margin-left: 1%;"><strong> GIT CONTERNARIZED & NON-CONTERNARIZED WITHIN TANZANIA  </strong></p>
            <p style="text-align: left; margin-top: 35px; color: black; font-size: 6pt; margin-left: 1%;"><strong> Items Covered  </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 55%;"><strong> Sum Insured (in TZS) </strong>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 78%;"><strong> Premium (in TZS) </strong></p>
            <p style="text-align: left; margin-top: 35px; color: black; font-size: 6pt; margin-left: 1%;"><strong> Produce Raw Agricultural products  </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 55%;"><strong> {{ $covernote->sum_insured }}  </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 78%;"><strong> {{ $covernote->premium_after_discount }}</strong></p>
            <p style="text-align: left; margin-top: 25px; color: black; font-size: 6pt; margin-left: 1%;"> On mixed items, categorized as general merchandise, <br> include but are not limited to tobacco, maize flour, soda, and the kindred </p>
            <p style="text-align: left; margin-top: 25px; color: black; font-size: 6pt; margin-left: 1%;">To include expenses incurred for reloading the goods to another <br> vehicle after the accident, where applicable- 5MILLION PER EVENT </p>
            <p style="text-align: left; margin-top: 9px; color: black; font-size: 6pt; margin-left: 1%;">PER CARRYING LIMIT TSHS 100MILLION</p>
            <p style="text-align: left; margin-top: 10px; color: black; font-size: 6pt; margin-left: 1%;">Total</p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 55%;"><strong> {{ $covernote->sum_insured }}   </strong></p>
            <p style="text-align: left; margin-top: -9px; color: black; font-size: 6pt; margin-left: 78%;"><strong> {{ $covernote->premium_after_discount }} </strong></p>
            <p style="text-align: left; margin-top: 20px; color: black; font-size: 6pt; margin-left: 1%;">VAT</p>
            <p style="text-align: left; margin-top: -40px; color: black; font-size: 6pt; margin-left: 78%;"><strong> {{ $covernote->tax_amount }} </strong></p>
            <p style="text-align: left; margin-top: 15px; color: black; font-size: 6pt; margin-left: 1%;">Total Premium</p>
            <p style="text-align: left; margin-top: -8px; color: black; font-size: 6pt; margin-left: 78%;"><strong> {{ $covernote->premium_after_discount-$covernote->tax_amount }} </strong></p>
            <p style="text-align: left; margin-top: 10px; color: black; font-size: 6pt; margin-left: 37%;"><strong> Date of Issue :  </strong></p>
            <p style="text-align: left; margin-top: -8px; color: black; font-size: 6pt; margin-left: 78%;"><strong> ISSUED BY, KMJ INSURANCE </strong></p>
            <p style="text-align: left; margin-top: 3px; color: black; font-size: 6pt; margin-left: 37%;"><strong> 25-Jul-2025  </strong></p>
            <p style="text-align: left; margin-top: 27px; color: black; font-size: 6pt; margin-left: 78%;"><strong> Authorized Signatory </strong></p>
            <p style="text-align: left; margin-top: 15px; color: black; font-size: 8pt; margin-left: 4%;"> <strong> ADDITIONAL TERMS/ENDORSEMENT DETAILS:</strong> Excess : 5% of claim amount minimum Tshs 500,000</p>
            
        </div>
        <p style="text-align: left;  color: black; font-size: 5pt; margin-left: 1%;">  <i> Powered from Smart Policy Insurance System</i></p>
        <p style="text-align: left;  margin-top: -10%; color: black; font-size: 5pt; margin-left: 30%;">  <i> UIN # KMJI14469 </i></p>
        <p style="text-align: left;  margin-top: -10%; color: black; font-size: 5pt; margin-left: 50%;">  <i> Receipt No: 142191 </i></p>
        <p style="text-align: left;  margin-top: -10%; color: black; font-size: 5pt; margin-left: 65%;">  <i> KMJ Insurance-25-Jul-2025 04:40:41 PM</i></p>
        <p style="text-align: right;  margin-top: -10%; color: black; font-size: 5pt; margin-left: 65%;">  <i> Page 1 of 2</i></p>
        <div class="content-area">
            <img src="assets/dash/board_files/logo.png" alt="Photo" style="width:25%; height:25%; margin-left: 70%; margin-top: -6%;  object-fit:cover;">
            <p style="text-align: center;   color: black; font-size: 10pt; margin-top: -12%">  KMJ Insurance Brokers Ltd, No 51, Plot 1595 Jamhuri St, P O Box 20139, Dar es Salaam, <br> Tanzania, City: DarEsSalaam Tel: +255 22 2120432 + 255 712 467873 Email: admin@kmjinsurance.co.tz</p>
        </div>
        <p style="text-align: left;  color: black; font-size: 5pt; margin-left: 1%;">  <i> Powered from Smart Policy Insurance System</i></p>
        <p style="text-align: left;  margin-top: -10%; color: black; font-size: 5pt; margin-left: 30%;">  <i> UIN # KMJI14469 </i></p>
        <p style="text-align: left;  margin-top: -10%; color: black; font-size: 5pt; margin-left: 50%;">  <i> Receipt No: 142191 </i></p>
        <p style="text-align: left;  margin-top: -10%; color: black; font-size: 5pt; margin-left: 65%;">  <i> KMJ Insurance-25-Jul-2025 04:40:41 PM</i></p>
        <p style="text-align: right;  margin-top: -10%; color: black; font-size: 5pt; margin-left: 65%;">  <i> Page 2 of 2</i></p>
    </div>
</body>
</html>