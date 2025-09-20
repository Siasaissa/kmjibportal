<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Cover Note - {{ $covernote->cover_note_reference }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            padding: 20px;
            line-height: 1.4;
        }
        
        .document-content {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            position: relative;
        }
        
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #000;
            position: relative;
        }
        
        .logo {
            width: 80px;
            height: 60px;
            background: #e9ecef;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: #666;
        }
        
        .title {
            flex-grow: 1;
            text-align: center;
            margin: 0 20px;
        }
        
        .title h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
        
        .qr-section {
            position: absolute;
            top: -10px;
            right: 0;
            text-align: center;
        }
        
        .qr-placeholder {
            width: 60px;
            height: 60px;
            border: 1px solid #ccc;
            background: #f8f9fa;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8px;
        }
        
        .reference-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
            padding: 15px;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
        }
        
        .ref-item {
            display: flex;
            justify-content: space-between;
        }
        
        .ref-label {
            font-weight: bold;
            color: #333;
        }
        
        .insurance-text {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            margin: 20px 0;
            font-size: 11px;
            line-height: 1.5;
            text-align: justify;
        }
        
        .details-section {
            margin: 25px 0;
        }
        
        .section-header {
            background: #343a40;
            color: white;
            padding: 8px 12px;
            font-weight: bold;
            font-size: 12px;
            margin-bottom: 15px;
        }
        
        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 30px;
            margin-bottom: 20px;
        }
        
        .detail-item {
            display: flex;
            padding: 5px 0;
            border-bottom: 1px dotted #ccc;
        }
        
        .detail-label {
            font-weight: bold;
            min-width: 120px;
            color: #333;
        }
        
        .detail-value {
            flex: 1;
            color: #555;
        }
        
        .vehicle-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 10px;
        }
        
        .vehicle-table th,
        .vehicle-table td {
            border: 1px solid #333;
            padding: 6px 4px;
            text-align: center;
        }
        
        .vehicle-table th {
            background: #f8f9fa;
            font-weight: bold;
        }
        
        .premium-section {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
            margin: 20px 0;
            padding: 15px;
            background: #e8f5e8;
            border: 2px solid #28a745;
        }
        
        .premium-item {
            text-align: center;
        }
        
        .premium-label {
            font-size: 10px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .premium-amount {
            font-size: 14px;
            font-weight: bold;
            color: #000;
        }
        
        .signature-section {
            margin-top: 40px;
            text-align: right;
        }
        
        .signature-placeholder {
            width: 150px;
            height: 50px;
            border: 1px solid #ccc;
            background: #f8f9fa;
            margin: 10px 0;
            margin-left: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: #666;
        }
        
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 2px solid #000;
            text-align: center;
            font-size: 10px;
            color: #333;
            line-height: 1.4;
        }
        
        .validity-notice {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 10px;
            margin: 15px 0;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
        }
        
        @media print {
            body {
                padding: 0;
            }
            .document-content {
                max-width: none;
            }
        }
    </style>
</head>
<body>
    <div class="document-content">
        <div class="header">
            <div class="logo">
                <img src="{{ asset('assets/dash/logo.png') }}" alt="Company Logo" style="width: 100%; height: 100%; object-fit: contain;" onerror="this.style.display='none'; this.parentNode.innerHTML='LOGO';">
            </div>
            <div class="title">
                <h1>MOTOR COVER NOTE</h1>
            </div>
            <div class="qr-section">
                <div class="qr-placeholder">QR CODE</div>
                <div style="font-size: 8px;">Scan QR code to Validate</div>
            </div>
        </div>
        
        <div class="reference-section">
            <div class="ref-item">
                <span class="ref-label">RISK NOTE NO:</span>
                <span>{{ $covernote->cover_note_reference }}</span>
            </div>
            <div class="ref-item">
                <span class="ref-label">STICKER NO:</span>
                <span>{{ $covernote->sale_point_code }}</span>
            </div>
            <div class="ref-item">
                <span class="ref-label">Policy Type:</span>
                <span>{{ $covernote->product_code }}</span>
            </div>
            <div class="ref-item">
                <span class="ref-label">Currency:</span>
                <span>{{ $covernote->currency_code }} (Rate: {{ $covernote->exchange_rate }})</span>
            </div>
        </div>
        
        <div class="insurance-text">
            The policyholder described in the Certificate below having proposed for insurance in respect of the Motor Vehicle described in the Certificate and having paid the sum of <strong>{{ number_format($covernote->total_premium_including_tax, 2) }} {{ $covernote->currency_code }} (Incl. VAT)</strong> as premium.
            <br><br>
            The risk is hereby held covered in terms of the company's usual form of <strong>{{ $covernote->product_code }}</strong> applicable thereto for the period between the dates specified in the Certificate unless the cover be terminated by the Company by notice in writing in which case the insurance will thereupon ceases and a proportionate part of the annual premium otherwise payable for such insurance will be charged for the time the Company has been on risk. The Policyholder warrants that the Motor Vehicle is only used for the specified purpose.
        </div>
        
        <div class="details-section">
            <div class="section-header">POLICYHOLDER INFORMATION</div>
            <div class="details-grid">
                <div class="detail-item">
                    <span class="detail-label">Name:</span>
                    <span class="detail-value">{{ $covernote->policy_holder_name }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Type:</span>
                    <span class="detail-value">{{ ucfirst($covernote->policy_holder_type) }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Address:</span>
                    <span class="detail-value">{{ $covernote->postal_address }}, {{ $covernote->street }}, {{ $covernote->district }}, {{ $covernote->region }}, {{ $covernote->country_code }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Phone:</span>
                    <span class="detail-value">{{ $covernote->policy_holder_phone_number }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">ID Number:</span>
                    <span class="detail-value">{{ $covernote->policy_holder_id_number }} ({{ $covernote->policy_holder_id_type }})</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">DOB:</span>
                    <span class="detail-value">{{ $covernote->policy_holder_birth_date }}</span>
                </div>
            </div>
        </div>
        
        <div class="details-section">
            <div class="section-header">COVER PERIOD</div>
            <div class="details-grid">
                <div class="detail-item">
                    <span class="detail-label">From:</span>
                    <span class="detail-value">{{ $covernote->cover_note_start_date }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">To:</span>
                    <span class="detail-value">{{ $covernote->cover_note_end_date }}</span>
                </div>
            </div>
        </div>
        
        <div class="validity-notice">
            VALIDITY OF THIS RISK NOTE IS SUBJECT TO RECEIPT OF Premium BY PRIOR INSURER TO INCEPTION OF RISK & SUBJECT TO REALIZATION OF CHEQUE, WHEREVER APPLICABLE.
        </div>
        
        <div class="details-section">
            <div class="section-header">SUBJECT MATTER INSURED</div>
            <div class="details-grid">
                <div class="detail-item">
                    <span class="detail-label">Description:</span>
                    <span class="detail-value">{{ $covernote->subject_matter_description }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Reference:</span>
                    <span class="detail-value">{{ $covernote->subject_matter_reference }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Sum Insured:</span>
                    <span class="detail-value">{{ number_format($covernote->sum_insured, 2) }} {{ $covernote->currency_code }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Equivalent:</span>
                    <span class="detail-value">{{ number_format($covernote->sum_insured_equivalent, 2) }}</span>
                </div>
            </div>
        </div>
        
        <div class="details-section">
            <div class="section-header">CERTIFICATE OF INSURANCE</div>
            <p style="font-size: 11px; margin-bottom: 15px;">We hereby certify that a Policy of Insurance covering the liabilities required to be covered by the Motor Vehicles Insurance Act, 1961 (CAP 169 R.E. 2002)(Section-7) and the Motor Vehicles (Third Party Risks) Decree 1953 (Zanzibar) - Section 6 has been issued as follows:</p>
            
            <table class="vehicle-table">
                <thead>
                    <tr>
                        <th>Vehicle Registration No.</th>
                        <th>Engine No.</th>
                        <th>Chassis No.</th>
                        <th>Make/Model</th>
                        <th>Type/Color</th>
                        <th>Seating Capacity</th>
                        <th>CC</th>
                        <th>Year</th>
                        <th>Sum Insured</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $covernote->vehicle_registration_number ?? 'N/A' }}</td>
                        <td>{{ $covernote->engine_number ?? 'N/A' }}</td>
                        <td>{{ $covernote->chassis_number ?? 'N/A' }}</td>
                        <td>{{ $covernote->make_model ?? 'N/A' }}</td>
                        <td>{{ $covernote->vehicle_type ?? 'N/A' }}/{{ $covernote->vehicle_color ?? 'N/A' }}</td>
                        <td>{{ $covernote->seating_capacity ?? 'N/A' }}</td>
                        <td>{{ $covernote->engine_cc ?? 'N/A' }}</td>
                        <td>{{ $covernote->manufacture_year ?? 'N/A' }}</td>
                        <td>{{ number_format($covernote->sum_insured, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="premium-section">
            <div class="premium-item">
                <div class="premium-label">Net Premium</div>
                <div class="premium-amount">{{ number_format($covernote->total_premium_excluding_tax, 2) }}</div>
            </div>
            <div class="premium-item">
                <div class="premium-label">Tax Amount ({{ $covernote->tax_rate }}%)</div>
                <div class="premium-amount">{{ number_format($covernote->tax_amount, 2) }}</div>
            </div>
            <div class="premium-item">
                <div class="premium-label">Premium (Incl.Tax) {{ $covernote->currency_code }}</div>
                <div class="premium-amount">{{ number_format($covernote->total_premium_including_tax, 2) }}</div>
            </div>
        </div>
        
        <div class="signature-section">
            <div style="font-weight: bold; margin-bottom: 10px;">AUTHORIZED SIGNATORY</div>
            <img src="{{ asset('images/signature.png') }}" alt="Signature" style="height: 50px; margin: 10px 0;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            <div class="signature-placeholder" style="display: none;">Signature</div>
            <div style="font-size: 11px; margin-top: 5px;">
                <strong>{{ $covernote->officer_name }}</strong><br>
                {{ $covernote->officer_title }}<br>
                Date of Issue: {{ $covernote->cover_note_start_date }}
            </div>
        </div>
        
        <div style="font-size: 11px; font-weight: bold; margin-top: 20px;">
            IMPORTANT: In the event of any change of vehicle or ownership, this certificate must be returned to the company within 7 days from the date of change.
        </div>
        
        <div class="footer">
            <strong>KMJ Insurance Brokers Ltd</strong><br>
            No 51, Plot 1595 Jamhuri St, P.O. Box 20139, Dar es Salaam, Tanzania<br>
            Tel: +255 22 2120432 | +255 712 467873 | Email: admin@kmjinsurance.co.tz
        </div>
    </div>
</body>
</html>