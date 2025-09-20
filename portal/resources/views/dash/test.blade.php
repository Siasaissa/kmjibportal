<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Cover Note Generator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .header h1 {
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .search-section {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        
        .search-form {
            display: flex;
            gap: 15px;
            align-items: end;
            flex-wrap: wrap;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            min-width: 200px;
        }
        
        .form-group label {
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }
        
        .form-group input, .form-group select {
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        
        .form-group input:focus, .form-group select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #56ab2f, #a8e6cf);
            color: white;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(86, 171, 47, 0.4);
        }
        
        .btn-info {
            background: linear-gradient(135deg, #36d1dc, #5b86e5);
            color: white;
        }
        
        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(54, 209, 220, 0.4);
        }
        
        .results-section {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 15px 12px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
        }
        
        td {
            padding: 15px 12px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }
        
        tr:hover {
            background-color: #f8f9fa;
        }
        
        .actions {
            display: flex;
            gap: 8px;
        }
        
        .loading {
            text-align: center;
            padding: 40px;
            color: #666;
        }
        
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .no-results {
            text-align: center;
            padding: 40px;
            color: #666;
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-success {
            background: #d4edda;
            color: #155724;
        }
        
        .status-warning {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-danger {
            background: #f8d7da;
            color: #721c24;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 10px;
            }
            
            .search-form {
                flex-direction: column;
            }
            
            .form-group {
                min-width: 100%;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚗 Motor Cover Note Generator</h1>
            <p>Search and generate PDF cover notes for your quotations</p>
        </div>
        
        <div class="search-section">
            <h3 style="margin-bottom: 20px; color: #333;">Search Quotations</h3>
            <form id="searchForm" class="search-form">
                <div class="form-group">
                    <label for="coverNoteRef">Cover Note Reference</label>
                    <input type="text" id="coverNoteRef" name="cover_note_reference" placeholder="Enter cover note reference">
                </div>
                
                <div class="form-group">
                    <label for="policyHolderName">Policy Holder Name</label>
                    <input type="text" id="policyHolderName" name="policy_holder_name" placeholder="Enter policy holder name">
                </div>
                
                <div class="form-group">
                    <label for="idNumber">ID Number</label>
                    <input type="text" id="idNumber" name="policy_holder_id_number" placeholder="Enter ID number">
                </div>
                
                <div class="form-group">
                    <label for="dateFrom">Date From</label>
                    <input type="date" id="dateFrom" name="date_from">
                </div>
                
                <div class="form-group">
                    <label for="dateTo">Date To</label>
                    <input type="date" id="dateTo" name="date_to">
                </div>
                
                <div class="form-group">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn btn-primary">
                        🔍 Search
                    </button>
                </div>
            </form>
        </div>
        
        <div id="resultsSection" class="results-section" style="display: none;">
            <div id="loadingDiv" class="loading" style="display: none;">
                <div class="spinner"></div>
                <p>Searching quotations...</p>
            </div>
            
            <div id="resultsTable" class="table-container" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th>Cover Note Ref</th>
                            <th>Policy Holder</th>
                            <th>ID Number</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total Premium</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="resultsTableBody">
                        <!-- Results will be populated here -->
                    </tbody>
                </table>
            </div>
            
            <div id="noResults" class="no-results" style="display: none;">
                <p>No quotations found matching your criteria.</p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            searchQuotations();
        });
        
        function searchQuotations() {
            const formData = new FormData(document.getElementById('searchForm'));
            const searchParams = new URLSearchParams();
            
            for (let [key, value] of formData.entries()) {
                if (value.trim()) {
                    searchParams.append(key, value);
                }
            }
            
            // Show loading
            document.getElementById('resultsSection').style.display = 'block';
            document.getElementById('loadingDiv').style.display = 'block';
            document.getElementById('resultsTable').style.display = 'none';
            document.getElementById('noResults').style.display = 'none';
            
            // Make API call
            fetch('/api/quotations/search?' + searchParams.toString())
                .then(response => response.json())
                .then(data => {
                    displayResults(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('loadingDiv').style.display = 'none';
                    document.getElementById('noResults').style.display = 'block';
                    document.getElementById('noResults').innerHTML = '<p>Error occurred while searching. Please try again.</p>';
                });
        }
        
        function displayResults(data) {
            document.getElementById('loadingDiv').style.display = 'none';
            
            if (data.success && data.quotations && data.quotations.length > 0) {
                document.getElementById('resultsTable').style.display = 'block';
                const tbody = document.getElementById('resultsTableBody');
                tbody.innerHTML = '';
                
                data.quotations.forEach(quotation => {
                    const row = createQuotationRow(quotation);
                    tbody.appendChild(row);
                });
            } else {
                document.getElementById('noResults').style.display = 'block';
            }
        }
        
        function createQuotationRow(quotation) {
            const row = document.createElement('tr');
            
            // Determine status
            let statusClass = 'status-warning';
            let statusText = 'Pending';
            
            if (quotation.ack_status_code === 'TIRA001') {
                statusClass = 'status-success';
                statusText = 'Successful';
            } else if (quotation.ack_status_code && quotation.ack_status_code !== 'TIRA001') {
                statusClass = 'status-danger';
                statusText = 'Failed';
            }
            
            row.innerHTML = `
                <td>${quotation.cover_note_reference || 'N/A'}</td>
                <td>${quotation.policy_holder_name || 'N/A'}</td>
                <td>${quotation.policy_holder_id_number || 'N/A'}</td>
                <td>${formatDate(quotation.cover_note_start_date)}</td>
                <td>${formatDate(quotation.cover_note_end_date)}</td>
                <td>${formatCurrency(quotation.total_premium_including_tax, quotation.currency_code)}</td>
                <td><span class="status-badge ${statusClass}">${statusText}</span></td>
                <td>
                    <div class="actions">
                        <button onclick="viewPDF(${quotation.id})" class="btn btn-info" style="font-size: 12px; padding: 8px 12px;">
                            👁️ View PDF
                        </button>
                        <button onclick="downloadPDF(${quotation.id})" class="btn btn-success" style="font-size: 12px; padding: 8px 12px;">
                            📄 Download
                        </button>
                    </div>
                </td>
            `;
            
            return row;
        }
        
        function formatDate(dateString) {
            if (!dateString) return 'N/A';
            const date = new Date(dateString);
            return date.toLocaleDateString