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
            top: 63mm;   /* vertical center of page; change if needed */
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
            top: 77mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
        .line6 {
            position: absolute; /*already address and insurer name*/
            top: 90mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
        .line7 {
            position: absolute; /*already Origin & Destination */
            top: 98mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
        .line8 {
            position: absolute; /*already Route Type */
            top: 106mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
                .line9 {
            position: absolute; /*already Air/Rail/Road/Sea */
            top: 132mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
                .line10 {
            position: absolute; /*already Cover Period From */
            top: 143mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
                .line11 {
            position: absolute; /*already DETAILS OF COVERAGE */
            top: 154mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
                .line12 {
            position: absolute; /*already GIT CONTERNARIZED & NON-CONTERNARIZED WITHIN TANZANIA */
            top: 165mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
                .line13 {
            position: absolute; /*already Items Covered */
            top: 176mm;   /* vertical center of page; change if needed */
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
            top: 196mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        }
                .line16 {
            position: absolute; /*already Total */
            top: 215mm;   /* vertical center of page; change if needed */
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
        top: 178mm;
        width: 60px;        /* box size */
        height: 60px;
        border: 2px solid black; /* border only */
        background: transparent; /* no fill */
        display: inline-block;   /* so you can place multiple side by side */
        left: 4mm;
        }
         .box2 {
        position: absolute; /* Qr code*/
        top: 178mm;
        width: 60px;        /* box size */
        height: 60px;
        border: 2px solid black; /* border only */
        background: transparent; /* no fill */
        display: inline-block;   /* so you can place multiple side by side */
        left: 25mm;
        }
         .box3 {
        position: absolute; /* mullika*/
        top: 178mm;
        width: 60px;        /* box size */
        height: 60px;
        border: 2px solid black; /* border only */
        background: transparent; /* no fill */
        display: inline-block;   /* so you can place multiple side by side */
        left: 46mm;
        }
         .box4 {
        position: absolute; /* mullika*/
        top: 165px;
        width: 100px;        /* box size */
        height: 20px;
        border: 2px solid black; /* border only */
        background: transparent; /* no fill */
        display: inline-block;   /* so you can place multiple side by side */
        left: 25mm;
        }
        .box5 {
        position: absolute; /* mullika*/
        top: 165px;
        width: 100px;        /* box size */
        height: 20px;
        border: 2px solid black; /* border only */
        background: transparent; /* no fill */
        display: inline-block;   /* so you can place multiple side by side */
        left: 148mm;
        }
         .box6 {
        position: absolute; /* mullika*/
        top: 412px;
        width: 320px;        /* box size */
        height: 50px;
        border: 2px solid black; /* border only */
        background: transparent; /* no fill */
        display: inline-block;   /* so you can place multiple side by side */
        left: 2mm;
        }
        .box7 {
        position: absolute; /* mullika*/
        top: 412px;
        width: 320px;        /* box size */
        height: 50px;
        border: 2px solid black; /* border only */
        background: transparent; /* no fill */
        display: inline-block;   /* so you can place multiple side by side */
        left: 90mm;
        }
        .verti1{
        position: absolute;
        left: 38mm;         /* center on page; change to desired x */
        top: 67mm;           /* start below top margin */
        height: calc(59mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
        .verti1b{
        position: absolute;
        left: 100mm;         /* center on page; change to desired x */
        top: 67mm;           /* start below top margin */
        height: calc(51mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
        .verti1c{
        position: absolute;
        left: 140mm;         /* center on page; change to desired x */
        top: 67mm;           /* start below top margin */
        height: calc(43mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
         .verti2{
        position: absolute; /*Carrying Type*/
        left: 122mm;         /* center on page; change to desired x */
        top: 83mm;           /* start below top margin */
        height: calc(27mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
         .verti3{
        position: absolute; /*Carrying Type*/
        left: 160mm;         /* center on page; change to desired x */
        top: 83mm;           /* start below top margin */
        height: calc(27mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
                 .verti4{
        position: absolute;
        left: 122mm;         /* center on page; change to desired x */
        top: 93mm;           /* start below top margin */
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
        top: 63mm;           /* start below top margin */
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
            top: 5mm;   /* vertical center of page; change if needed */
            left: 118mm;   /* start after left margin */
            width: calc(130.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        }
        .lineb2{
            position: absolute;
            top: 72mm;   /* vertical center of page; change if needed */
            left: 100mm;   /* start after left margin */
            width: calc(119.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        }
            .lineb3{
            position: absolute;
            top: 83mm;   /* vertical center of page; change if needed */
            left: 100mm;   /* start after left margin */
            width: calc(119.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        }
         .verti8{           /*tas synergy */
        position: absolute;
        left: 58mm;         /* center on page; change to desired x */
        top: 132mm;           /* start below top margin */
        height: calc(65mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
         .verti9{           /*tas synergy */
        position: absolute;
        left: 90mm;         /* center on page; change to desired x */
        top: 132mm;           /* start below top margin */
        height: calc(65mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
        .verti9b{           /*tas synergy */
        position: absolute;
        left: 123mm;         /* center on page; change to desired x */
        top: 132mm;           /* start below top margin */
        height: calc(65mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
        .verti9c{           /*tas synergy */
        position: absolute;
        left: 150mm;         /* center on page; change to desired x */
        top: 132mm;           /* start below top margin */
        height: calc(65mm - 20mm); /* subtract top+bottom margins */
        width: 0;            /* line thickness controlled by border */
        border-left: 0.5mm solid black;
        }
        .lineb4{
        position: absolute;
        top: 188mm;   /* vertical center of page; change if needed */
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
        left: 27mm;         /* center on page; change to desired x */
        top: 132mm;           /* start below top margin */
        height: calc(65mm - 20mm); /* subtract top+bottom margins */
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
        .line21 {
            position: absolute;
            top: 7mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
        } 
           .line22 {
            position: absolute;
            top: 14mm;   /* vertical center of page; change if needed */
            left: 0mm;   /* start after left margin */
            width: calc(219.5mm - 41mm); /* subtract left+right margins */
            border-top: 0.5mm solid black;
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
            <!--<div class="line3"></div>-->
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
           <!-- <div class="line17"></div>-->
            <!--<div class="line18"></div>-->
            <!--<div class="line19"></div>-->
            <div class="box1"><p style="text-align: center;">Scan Qr <br> code to <br> validate</p></div>
            <div class="box2"><img src="{{ $qrCodeBase64 }}" alt="QR CODE" style="width: 60px; height: 60px; object-fit: contain;"></div>
            <div class="box3"><p style="text-align: center; font-size: 8pt; margin-top: 10px;">Mullika <br> Alama <br> Kuhakikisha</p></div>
            <div class="verti1"></div>
            <div class="verti1b"></div>
            <div class="verti1c"></div>
            <div class="verti2"></div>
            <div class="verti3"></div>
            <!--<div class="verti4"></div>-->
            <!--<div class="verti5"></div>-->
            <div class="box4">14474</div>
            <div class="box5" style="font-size: 7pt;"> <p style="margin: 3px;">25002-20945-36811</p> </div>
            <div class="box6"><p style="font-size: 10px; padding: 2px;">THE MOTOR VEHICLES INSURANCE ACT,1961(CAP 169 R.E. 2002)(SECTION-7)
AND THE MOTOR VEHICLES (THIRD PARTY RISKS) DECREE 1953 (ZANZIBAR) - <br><strong>SECTION 6</strong></p></div>
            <div class="box7"><p style="font-size: 10px; padding: 2px;"> VALIDITY OF THIS RISK NOTE IS SUBJECT TO RECEIPT OF Premium BY OF RISK & SUBJECT TO PRIOR
REALIZATION OF CHEQUE, <br><strong>WHEREVER APPLICABLE.</strong>  </p></div>
            <!--<div class="verti6"></div>-->
            <!--<div class="verti7"></div>-->
            <!--<div class="lineb1"></div>-->
            <div class="lineb2"></div>
            <div class="lineb3"></div>
            <div class="verti8"></div>
            <div class="verti9"></div>
            <div class="verti9b"></div>
            <div class="verti9c"></div>
            <div class="lineb4"></div>
            <div class="line20"></div>
           <div class="verti10"></div>
             <!--<div class="verti11"></div>


            
            <!-- Content will go here -->
            <p style="text-align: center; margin-top: 125px; color: black;"><strong>MOTOR COVERNOTE</strong></p>
            <p style="text-align: left; margin-top: 25px; color: black; font-size: 8pt; margin-left: 1%;"><strong> RISKNOTE NO:</strong></p>
            <p style="text-align: left;  color: black; font-size: 8pt; margin-top: -10px; margin-left: 67%;"><strong> STICKER NO:</strong></p>
            <p style="text-align: left; margin-top: 4px; color: black; font-size: 6pt; margin-left: 1%;"><strong> The policyholder described in the Certificate below having proposed for insurance in respect of the Motor Vehicle described in the Certificate and having
                paid the sum of 177,000.00 TZS (Incl. VAT), ONE HUNDRED SEVENTY-SEVEN THOUSAND TANZANIAN SHILLINGS as premium. 
                The risk is hereby held covered in terms of the company's usual form of Third Party Premium Buses-Daladala within City Policy applicable thereto
                for the period between the dates specified in the Certificate unless the cover be terminated by the Company by notice in writing in which case the
                insurance will thereupon ceases and a proportionate part of the annual premium otherwise payable for such insurance will be charged for the time the
                Company has been on risk. The Policyholder warrants that the Motor Vehicle is only used for the purpose of Passenger-Third Party Premium
                Buses. </strong></p>
            <p style="text-align: left; margin-top: 23px; color: black; font-size: 9pt; margin-left: 1%;"><strong> Insurance Name </strong></p>
            <p title="{{ $covernote->customer->client_name  }}" style=" text-align: left; margin-top: -90%;  color: black; font-size: 10pt; margin-left: 25%; width: 160px;  white-space: nowrap;overflow: hidden;  text-overflow: ellipsis;"><strong>{{ $covernote->customer->client_name }}</strong></p>

            <p style="text-align: left; margin-top: -5%; color: black; font-size: 9pt; margin-left: 60%; position: absolute;"><strong> TIRA Cover Note: </strong></p>
            <p style="text-align: left; margin-top: -5%; color: black; font-size: 7pt; margin-left: 80%; position: absolute;"><strong> 10425-20995-05111 </strong></p>
            <p style="text-align: left; margin-top: -2%; color: black; font-size: 9pt; margin-left: 60%; position: absolute;"><strong> Policy No: </strong></p>
            <p style="text-align: left; margin-top: -2%; color: black; font-size: 7pt; margin-left: 80%; position: absolute;"><strong> P00/015/3176/2025/07/101404 </strong></p>
            <p style="text-align: left; margin-top: 1%; color: black; font-size: 9pt; margin-left: 1%; position: absolute;"><strong> Account: </strong></p>
            <p style="text-align: left; margin-top: 5%; color: black; font-size: 9pt; margin-left: 1%; position: absolute;"><strong> Address: </strong></p>
            <p style="text-align: left; margin-top: 1%; color: black; font-size: 9pt; margin-left: 25%; position: absolute;"><strong> {{ $covernote->customer->client_name }} </strong></p>
            <p style="text-align: left; margin-top: 1%; color: black; font-size: 9pt; margin-left: 59%; position: absolute;"><strong> Customer Tax Invoice </strong></p>
            <p style="text-align: left; margin-top: 1%; color: black; font-size: 9pt; margin-left: 80%; position: absolute;">RICL264844 </p>
            <p style="text-align: left; margin-top: 4%; color: black; font-size: 7pt; margin-left: 25%; position: absolute;"><strong> P.O.BOX 999 DAR ES SALAAM </strong></p>
            <p style="text-align: left; margin-top: 6%; color: black; font-size: 7pt; margin-left: 25%; position: absolute;"><strong> TIN: {{ $covernote->customer->tin }}, </strong></p>
            <p style="text-align: left; margin-top: 5%; color: black; font-size: 9pt; margin-left: 59%; position: absolute;"><strong> Debit No:  </strong></p>
            <p style="text-align: left; margin-top: 5%; color: black; font-size: 9pt; margin-left: 70%; position: absolute;"> 10952</p>
            <p style="text-align: left; margin-top: 5%; color: black; font-size: 9pt; margin-left: 80%; position: absolute;"><strong>File No</strong></p>
            <p style="text-align: left; margin-top: 9%; color: black; font-size: 9pt; margin-left: 1%; position: absolute;"><strong> Insurer Name </strong></p>
            <p style="text-align: left; margin-top: 9%; color: black; font-size: 7pt; margin-left: 23%; position: absolute;"><strong> Reliance Insurance Company (Tanzania) Limited </strong></p>
            <p style="text-align: left; margin-top: 9%; color: black; font-size: 9pt; margin-left: 59%; position: absolute;"> Intermediary :KMJ Insurance Brokers Ltd</p>
            <p style="text-align: left; margin-top: 13%; color: black; font-size: 9pt; margin-left: 1%; position: absolute;"><strong> Cover Period From  </strong></p>
            <p style="text-align: left; margin-top: 13%; color: black; font-size: 7pt; margin-left: 23%; position: absolute;"><strong> {{ $covernote->cover_note_start_date }} - To - {{ $covernote->cover_note_end_date }} </strong></p>
            <p style="text-align: left; margin-top: 27%; color: black; font-size: 7pt; margin-left: 1%; position: absolute;"><strong> <u> CERTIFICATE OF INSURANCE :</u> </strong> We hereby certify that a Policy of Insurance covering the liabilities required to be covered by the above mentioned legislations has been </p>
            <p style="text-align: center; margin-top: 33%; color: black; font-size: 9pt; margin-left: 1%; position: absolute;"><strong> Vehicle <br> Registration No.</strong> </p>
            <p style="text-align: center; margin-top: 33%; color: black; font-size: 9pt; margin-left: 18%; position: absolute;"><strong> Make/Model</strong> </p>
            <p style="text-align: center; margin-top: 33%; color: black; font-size: 9pt; margin-left: 38%; position: absolute;"><strong> Type/Color </strong> </p>
            <p style="text-align: center; margin-top: 33%; color: black; font-size: 9pt; margin-left: 55%; position: absolute;"><strong> Engine No. </strong> </p>
            <p style="text-align: center; margin-top: 33%; color: black; font-size: 9pt; margin-left: 72%; position: absolute;"><strong> Chassis No. </strong> </p>
            <p style="text-align: center; margin-top: 33%; color: black; font-size: 9pt; margin-left: 87%; position: absolute;"><strong> Seating <br> Capacity </strong> </p>
            <p style="text-align: center; margin-top: 39%; color: black; font-size: 9pt; margin-left: 3%; position: absolute;"><strong> T143DJM</strong> </p>
            <p style="text-align: center; margin-top: 45%; color: black; font-size: 9pt; margin-left: 3%; position: absolute;"><strong> CC </strong> </p>
            <p style="text-align: center; margin-top: 51%; color: black; font-size: 9pt; margin-left: 3%; position: absolute;"><strong> 2980 </strong> </p>
            <p style="text-align: center; margin-top: 51%; color: black; font-size: 9pt; margin-left: 18%; position: absolute;"><strong> Toyota Hiace</strong> </p>
            <p style="text-align: center; margin-top: 45%; color: black; font-size: 9pt; margin-left: 18%; position: absolute;"><strong> Year of <br> Manufacture</strong> </p>
            <p style="text-align: center; margin-top: 39%; color: black; font-size: 9pt; margin-left: 18%; position: absolute;"><strong> 1998</strong> </p>
            <p style="text-align: center; margin-top: 39%; color: black; font-size: 9pt; margin-left: 36%; position: absolute;"><strong>  </strong>Third Party Only </p>
            <p style="text-align: center; margin-top: 45%; color: black; font-size: 9pt; margin-left: 36%; position: absolute;"><strong> Vehicle Sum <br> Insured (in TZS)</strong> </p>
            <p style="text-align: center; margin-top: 51%; color: black; font-size: 9pt; margin-left: 36%; position: absolute;"><strong> STATION <br> WAGON/White </strong> </p>
            <p style="text-align: center; margin-top: 51%; color: black; font-size: 9pt; margin-left: 55%; position: absolute;"><strong> 150,000.00</strong> </p>
            <p style="text-align: center; margin-top: 45%; color: black; font-size: 9pt; margin-left: 55%; position: absolute;"><strong> Net Premium</strong> </p>
            <p style="text-align: center; margin-top: 39%; color: black; font-size: 9pt; margin-left: 55%; position: absolute;"><strong>  </strong>1KZ0563772 </p>
            <p style="text-align: center; margin-top: 51%; color: black; font-size: 9pt; margin-left: 72%; position: absolute;"><strong> 27,000.00 </strong> </p>
            <p style="text-align: center; margin-top: 45%; color: black; font-size: 9pt; margin-left: 72%; position: absolute;"><strong> VAT Amount</strong> </p>
            <p style="text-align: center; margin-top: 39%; color: black; font-size: 9pt; margin-left: 70%; position: absolute;"><strong>  </strong>KZH1201006049</p>
            <p style="text-align: center; margin-top: 39%; color: black; font-size: 9pt; margin-left: 87%; position: absolute;"><strong>  </strong>10</p>
            <p style="text-align: center; margin-top: 45%; color: black; font-size: 7pt; margin-left: 87%; position: absolute;"><strong> Premium (Incl.VAT) (in TZS)</strong> </p>
            <p style="text-align: center; margin-top: 51%; color: black; font-size: 9pt; margin-left: 87%; position: absolute;"><strong> 177,000.00 </strong> </p>
            <p style="text-align: center; margin-top: 57%; color: black; font-size: 9pt; margin-left: 36%; position: absolute;"><strong> Date of Issue : </strong> </p>
            <p style="text-align: center; margin-top: 60%; color: black; font-size: 9pt; margin-left: 36%; position: absolute;"><strong> 28-Jul-2025 </strong> </p>
            <p style="text-align: center; margin-top: 57%; color: black; font-size: 7pt; margin-left: 72%; position: absolute;"><strong> ISSUED BY, KMJ INSURANCE THREE </strong> </p>
            <p style="text-align: center; margin-top: 63%; color: black; font-size: 7pt; margin-left: 72%; position: absolute;"><strong> AUTHORIZED SIGNATORY </strong> </p>
            <p style="text-align: left; margin-top: 68%; color: black; font-size: 7pt; margin-left: 3%; position: absolute;"><strong> <u> IMPORTANT:</u> </strong> In the event of any change of vehicle or ownership, this certificate must be returned to the company within 7 days from the date of change. </p>
            <img src="assets/dash/board_files/logo.png" alt="Photo" style="width:25%; height:25%; margin-top: 70%; position: absolute; margin-left: 72%;">
            <p style="text-align: center; margin-top: 95%; color: black; font-size: 7pt; margin-left: 8%; position: absolute;"><strong> KMJ Insurance Brokers Ltd, No 51, Plot 1595 Jamhuri St, P O Box 20139, Dar es Salaam, Tanzania, City: DarEsSalaam <br> Tel: +255 22 2120432 + 255 712 467873 Email: admin@kmjinsurance.co.tz </p>


    </div>
    <p style="text-align: left; color: black; font-size: 7pt; margin-left: 3%; position: absolute;">
    <i>
        Powered from Smart Policy Insurance System &nbsp;&nbsp;&nbsp; UIN # KMJI14474 &nbsp;&nbsp;&nbsp;
        Receipt No: 162730 &nbsp;&nbsp;&nbsp;
        KMJ Insurance three - 28-Jul-2025 11:56:02 AM &nbsp;&nbsp;&nbsp; Page 1 of 2
    </i>
</p>
<div class="content-area">
    <div class="line21"></div>
    <div class="line22"></div>

    <p style="text-align: center; margin-top: 2mm; color: black; font-size: 9pt; margin-left: 3%; position: absolute;"><strong> Risk Note No.</strong> </p>
    <p style="text-align: center; margin-top: 2mm; color: black; font-size: 9pt; margin-left: 20%; position: absolute;"><strong> Sticker No.</strong> </p>
    <p style="text-align: center; margin-top: 2mm; color: black; font-size: 9pt; margin-left: 40%; position: absolute;"><strong> Insured Name</strong> </p>
    <p style="text-align: center; margin-top: 2mm; color: black; font-size: 9pt; margin-left: 72%; position: absolute;"><strong> Issuing Intermediary Name </strong> </p>
        <p style="text-align: center; margin-top: 8mm; color: black; font-size: 9pt; margin-left: 3%; position: absolute;"><strong> 14474 .</strong> </p>
    <p style="text-align: center; margin-top: 8mm; color: black; font-size: 9pt; margin-left: 20%; position: absolute;"><strong> 25002-20945-36811</strong> </p>
    <p style="text-align: center; margin-top: 8mm; color: black; font-size: 9pt; margin-left: 40%; position: absolute;"><strong> {{ $covernote->customer->client_name  }}</strong> </p>
    <p style="text-align: center; margin-top: 8mm; color: black; font-size: 9pt; margin-left: 72%; position: absolute;"><strong> KMJ Insurance Brokers Ltd </strong> </p></p>

</div>
<p style="text-align: left; color: black; font-size: 7pt; margin-left: 3%; position: absolute;">
    <i>
        Powered from Smart Policy Insurance System &nbsp;&nbsp;&nbsp; UIN # KMJI14474 &nbsp;&nbsp;&nbsp; Receipt No: 162730
        KMJ Insurance three &nbsp;&nbsp;&nbsp; 28-Jul-2025 11:56:02 AM &nbsp;&nbsp;&nbsp; Page 2 of 2
    </i>
</p>


</body>
</html>