<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Risknote</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <link href="board_files/risknote.css" rel="stylesheet">
</head>
<body>
  <div class="d-flex container py-5" style="min-height: 100vh; display: flex; flex-direction: column;">
    <!-- Ultra Premium Risk Header -->
    <div class="risk-header text-white p-4 mb-5">
      <div class="position-relative z-1">
        <div class="d-flex justify-content-between align-items-start flex-wrap">
          <div class="mb-4 mb-md-0">
            <div class="d-flex align-items-center mb-3">
              <h1 class="h2 mb-0">
                <i class="bi bi-shield-shaded section-icon me-3"></i> 
                Risk Assessment
              </h1>
              <span class="status-badge bg-warning text-primary-dark ms-3 text-white">UNDER REVIEW</span>
            </div>
            <div class="d-flex flex-wrap gap-4">
              <div>
                <small class="text-white-80 d-block">Reference</small>
                <div class="fw-semibold fs-5">RN-2023-00428</div>
              </div>
              <div>
                <small class="text-white-80 d-block">Client</small>
                <div class="fw-semibold fs-5">SURETECH Systems Co. Ltd</div>
              </div>
              <div>
                <small class="text-white-80 d-block">Policy Type</small>
                <div class="fw-semibold fs-5">Marine Cargo</div>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column align-items-end">
            <div class="text-end mb-3">
              <small class="text-white-80 d-block">Created</small>
              <div class="fw-semibold">10-Nov-2023</div>
            </div>
            <div class="d-flex gap-2">

              <button class="btn btn-sm btn-outline-light rounded-pill px-3">
                <i class="bi bi-printer me-1"></i> Print
              </button>
              <button class="btn btn-sm btn-outline-light rounded-pill px-3">
                <i class="bi bi-share me-1"></i> Share
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Enhanced Navigation Tabs -->
    <ul class="nav nav-pills mb-5">
      <li class="nav-item">
        <a class="nav-link active" href="#risk-details" data-bs-toggle="pill">
          <i class="bi bi-clipboard2-pulse"></i> Risk Details
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#underwriting" data-bs-toggle="pill">
          <i class="bi bi-clipboard2-check"></i> Underwriting
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#documents" data-bs-toggle="pill">
          <i class="bi bi-file-earmark-text"></i> Documents
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#history" data-bs-toggle="pill">
          <i class="bi bi-clock-history"></i> History
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#analysis" data-bs-toggle="pill">
          <i class="bi bi-graph-up"></i> Analytics
        </a>
      </li>
    </ul>

    <div class="tab-content">
      <!-- Risk Details Tab -->
      <div class="tab-pane fade show active" id="risk-details">
        <div class="row">
          <!-- Left Column -->
          <div class="col-lg-8">
            <!-- Risk Overview Card -->
            <div class="card mb-4 fade-in" style="animation-delay: 0.1s">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="section-title mb-0 d-flex align-items-center">
                  <i class="bi bi-info-circle section-icon"></i> 
                  <span>Risk Overview</span>
                </h5>
                <span class="badge bg-primary">Active Review</span>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="risk-info-card p-3 mb-3 bg-light rounded">
                      <small class="text-muted d-block">Risk Category</small>
                      <div class="fw-semibold">Marine - Ocean Cargo</div>
                    </div>
                    <div class="risk-info-card p-3 mb-3 bg-light rounded">
                      <small class="text-muted d-block">Coverage Type</small>
                      <div class="fw-semibold">All Risks</div>
                    </div>
                    <div class="risk-info-card p-3 mb-3 bg-light rounded">
                      <small class="text-muted d-block">Geographic Scope</small>
                      <div class="fw-semibold">Dar es Salaam to Mombasa</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="risk-info-card p-3 mb-3 bg-light rounded">
                      <small class="text-muted d-block">Sum Insured</small>
                      <div class="fw-semibold">Tzs 5,000,000</div>
                    </div>
                    <div class="risk-info-card p-3 mb-3 bg-light rounded">
                      <small class="text-muted d-block">Risk Rating</small>
                      <div>
                        <span class="risk-indicator risk-medium"></span>
                        <span class="fw-semibold">Medium Risk</span>
                      </div>
                    </div>
                    <div class="risk-info-card p-3 mb-3 bg-light rounded">
                      <small class="text-muted d-block">Proposed Premium</small>
                      <div class="fw-semibold">Tzs 60,000 (1.2%)</div>
                    </div>
                  </div>
                </div>
                
                <!-- Enhanced Risk Description -->
                <div class="risk-description mt-4">
                  <label class="form-label small text-muted">Risk Description</label>
                  <div class="border rounded p-3 bg-light">
                    <p>Coverage required for shipment of electronic goods (smartphones and tablets) from Dar es Salaam to Mombasa via ocean vessel. Goods will be packed in waterproof containers with shock-absorbent materials.</p>
                    <ul class="mb-0">
                      <li>Total 200 cartons with max value Tsh25,000 per carton</li>
                      <li>Transit time approximately 5-7 days</li>
                      <li>Vessel: MV Horizon (IMO 9876543)</li>
                      <li>Expected departure: 15-Dec-2023</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <!-- Coverage Details Card -->
            <div class="card mb-4 fade-in" style="animation-delay: 0.2s">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="section-title mb-0 d-flex align-items-center">
                  <i class="bi bi-shield-check section-icon"></i> 
                  <span>Coverage Details</span>
                </h5>
                <button class="btn btn-sm btn-outline-primary">
                  <i class="bi bi-plus"></i> Add Coverage
                </button>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead class="table-light">
                      <tr>
                        <th>Coverage</th>
                        <th>Limit</th>
                        <th>Deductible</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="fw-semibold">Marine Cargo (All Risks)</div>
                          <small class="text-muted">Primary coverage</small>
                        </td>
                        <td>Tzs 5M</td>
                        <td>1% of loss</td>
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>
                          <button class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="fw-semibold">War Risks</div>
                          <small class="text-muted">Optional coverage</small>
                        </td>
                        <td>Tzs 2M</td>
                        <td>2% of loss</td>
                        <td><span class="badge bg-danger">Declined</span></td>
                        <td>
                          <button class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="fw-semibold">Strikes & Civil Commotion</div>
                          <small class="text-muted">Included</small>
                        </td>
                        <td>Tzs 1M</td>
                        <td>1.5% of loss</td>
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>
                          <button class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Right Column -->
          <div class="col-lg-4">
            <!-- Client Summary Card -->
            <div class="card mb-4 fade-in" style="animation-delay: 0.3s">
              <div class="card-header">
                <h5 class="section-title mb-0 d-flex align-items-center">
                  <i class="bi bi-building section-icon"></i> 
                  <span>Client Summary</span>
                </h5>
              </div>
              <div class="card-body">
                <div class="d-flex align-items-center mb-4">
              <div class="bg-primary text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                <i class="bi bi-building fs-5"></i>
              </div>
              <div>
                <h6 class="mb-0">SURETECH Systems Co. Ltd</h6>
                <small class="text-muted">Corporate Client Since 2018</small>
              </div>
            </div>

                
                <div class="client-details">
                  <div class="d-flex align-items-center mb-3">
                    <div class="bg-light rounded-circle  me-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                      <i class="bi bi-person text-primary"></i>
                    </div>
                    <div>
                      <small class="text-muted d-block">Primary Contact</small>
                      <div class="fw-semibold">Mr. Jamal Mwinyi</div>
                      <small class="text-muted">Procurement Manager</small>
                    </div>
                  </div>
                  
                  <div class="d-flex align-items-center mb-3">
                    <div class="bg-light rounded-circle  me-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                      <i class="bi bi-telephone text-primary"></i>
                    </div>
                    <div>
                      <small class="text-muted d-block">Contact</small>
                      <div class="fw-semibold">+255 784 123 456</div>
                      <div class="fw-semibold">j.mwinyi@SURETECH Systems.co.tz</div>
                    </div>
                  </div>
                  
                  <div class="d-flex align-items-center">
                    <div class="bg-light rounded-circle  me-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                      <i class="bi bi-briefcase text-primary"></i>
                    </div>
                    <div>
                      <small class="text-muted d-block">Business</small>
                      <div class="fw-semibold">Maritime Transport</div>
                      <div class="fw-semibold">Annual Revenue: Tsh25M</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Risk Matrix Card -->
            <div class="card mb-4 fade-in" style="animation-delay: 0.4s">
              <div class="card-header">
                <h5 class="section-title mb-0 d-flex align-items-center">
                  <i class="bi bi-speedometer2 section-icon"></i> 
                  <span>Risk Matrix</span>
                </h5>
              </div>
              <div class="card-body">
                <div class="risk-matrix">
                  <div class="risk-cell bg-success text-white">1</div>
                  <div class="risk-cell bg-success text-white">2</div>
                  <div class="risk-cell bg-warning text-dark">3</div>
                  <div class="risk-cell bg-danger text-white">4</div>
                  <div class="risk-cell bg-danger text-white">5</div>
                  <div class="risk-cell bg-success text-white">2</div>
                  <div class="risk-cell bg-warning text-dark">3</div>
                  <div class="risk-cell bg-warning text-dark selected">4</div>
                  <div class="risk-cell bg-danger text-white">5</div>
                  <div class="risk-cell bg-danger text-white">6</div>
                  <div class="risk-cell bg-warning text-dark">3</div>
                  <div class="risk-cell bg-warning text-dark">4</div>
                  <div class="risk-cell bg-danger text-white">5</div>
                  <div class="risk-cell bg-danger text-white">6</div>
                  <div class="risk-cell bg-danger text-white">7</div>
                </div>
                
                <div class="risk-metrics">
                  <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                      <span class="small text-muted">Loss Ratio (3Y)</span>
                      <span class="small fw-semibold">42%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                      <div class="progress-bar bg-success" style="width: 42%"></div>
                    </div>
                  </div>
                  
                  <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                      <span class="small text-muted">Claim Frequency</span>
                      <span class="small fw-semibold">Medium</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                      <div class="progress-bar bg-warning" style="width: 65%"></div>
                    </div>
                  </div>
                  
                  <div class="mb-0">
                    <div class="d-flex justify-content-between mb-1">
                      <span class="small text-muted">Compliance Score</span>
                      <span class="small fw-semibold">88/100</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                      <div class="progress-bar bg-info" style="width: 88%"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Underwriting Tab -->
<div class="tab-pane fade" id="underwriting">
  <div class="row">
    <!-- Left Column - Underwriting Assessment -->
    <div class="col-lg-8">
      <!-- Underwriting Decision Card -->
      <div class="card mb-4 fade-in" style="animation-delay: 0.1s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-clipboard2-check section-icon"></i> 
            <span>Underwriting Decision</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="row mb-4">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="form-label">Risk Classification</label>
                <select class="form-select">
                  <option>Standard Risk</option>
                  <option selected>Medium Risk</option>
                  <option>High Risk</option>
                  <option>Declined Risk</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="form-label">Underwriting Status</label>
                <select class="form-select">
                  <option>Pending Review</option>
                  <option selected>Under Review</option>
                  <option>Approved</option>
                  <option>Declined</option>
                  <option>Referred</option>
                </select>
              </div>
            </div>
          </div>
          
          <div class="form-group mb-3">
            <label class="form-label">Underwriter Notes</label>
            <textarea class="form-control" rows="4" placeholder="Enter underwriting notes and rationale...">Initial review indicates standard marine cargo risk with typical exposure for this route. Recommend approval with standard terms.</textarea>
          </div>
          
          <div class="form-group mb-3">
            <label class="form-label">Premium Calculation</label>
            <div class="input-group">
              <span class="input-group-text">TZS</span>
              <input type="text" class="form-control" value="60,000">
              <span class="input-group-text">@ 1.2%</span>
            </div>
          </div>
          
          <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="termsCheck" checked>
            <label class="form-check-label" for="termsCheck">Apply standard terms and conditions</label>
          </div>
          
          <div class="d-flex justify-content-end gap-2 mt-4">
            <button class="btn btn-outline-danger">
              <i class="bi bi-x-circle me-2"></i> Decline Risk
            </button>
            <button class="btn btn-outline-success">
              <i class="bi bi-check-circle me-2"></i> Approve Risk
            </button>
          </div>
        </div>
      </div>
      
      <!-- Risk Factors Assessment -->
      <div class="card mb-4 fade-in" style="animation-delay: 0.2s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-clipboard2-pulse section-icon"></i> 
            <span>Risk Factors Assessment</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Factor</th>
                  <th>Rating</th>
                  <th>Notes</th>
                  <th>Weight</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Vessel Age & Condition</td>
                  <td>
                    <select class="form-select form-select-sm">
                      <option>1 (Excellent)</option>
                      <option selected>2 (Good)</option>
                      <option>3 (Average)</option>
                      <option>4 (Poor)</option>
                      <option>5 (Very Poor)</option>
                    </select>
                  </td>
                  <td><input type="text" class="form-control form-control-sm" value="MV Horizon (2018 build)"></td>
                  <td>20%</td>
                </tr>
                <tr>
                  <td>Route Safety</td>
                  <td>
                    <select class="form-select form-select-sm">
                      <option>1 (Very Safe)</option>
                      <option selected>2 (Safe)</option>
                      <option>3 (Moderate)</option>
                      <option>4 (Risky)</option>
                      <option>5 (Very Risky)</option>
                    </select>
                  </td>
                  <td><input type="text" class="form-control form-control-sm" value="Standard East Africa route"></td>
                  <td>25%</td>
                </tr>
                <tr>
                  <td>Cargo Type</td>
                  <td>
                    <select class="form-select form-select-sm">
                      <option selected>1 (Low Risk)</option>
                      <option>2 (Medium Risk)</option>
                      <option>3 (High Risk)</option>
                    </select>
                  </td>
                  <td><input type="text" class="form-control form-control-sm" value="Electronics - properly packed"></td>
                  <td>15%</td>
                </tr>
                <tr>
                  <td>Client Claims History</td>
                  <td>
                    <select class="form-select form-select-sm">
                      <option>1 (Excellent)</option>
                      <option selected>2 (Good)</option>
                      <option>3 (Average)</option>
                      <option>4 (Poor)</option>
                    </select>
                  </td>
                  <td><input type="text" class="form-control form-control-sm" value="2 claims in 3 years"></td>
                  <td>20%</td>
                </tr>
                <tr>
                  <td>Seasonal Factors</td>
                  <td>
                    <select class="form-select form-select-sm">
                      <option selected>1 (Low Risk)</option>
                      <option>2 (Moderate Risk)</option>
                      <option>3 (High Risk)</option>
                    </select>
                  </td>
                  <td><input type="text" class="form-control form-control-sm" value="Normal weather expected"></td>
                  <td>10%</td>
                </tr>
                <tr>
                  <td>Security Measures</td>
                  <td>
                    <select class="form-select form-select-sm">
                      <option>1 (Excellent)</option>
                      <option selected>2 (Good)</option>
                      <option>3 (Adequate)</option>
                      <option>4 (Poor)</option>
                    </select>
                  </td>
                  <td><input type="text" class="form-control form-control-sm" value="Standard container security"></td>
                  <td>10%</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="text-end mt-3">
            <button class="btn btn-sm btn-primary">
              <i class="bi bi-calculator me-1"></i> Calculate Risk Score
            </button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Right Column - Supporting Information -->
    <div class="col-lg-4">
      <!-- Underwriting Guidelines -->
      <div class="card mb-4 fade-in" style="animation-delay: 0.3s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-journal-bookmark section-icon"></i> 
            <span>Underwriting Guidelines</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            <strong>Marine Cargo Guidelines:</strong> Standard rate for electronics is 1.0-1.5% for this route.
          </div>
          
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span>Base Rate</span>
              <span class="badge bg-primary">1.0%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span>Route Adjustment</span>
              <span class="badge bg-primary">+0.1%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span>Client History Adjustment</span>
              <span class="badge bg-primary">+0.1%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span>Seasonal Adjustment</span>
              <span class="badge bg-success">+0.0%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
              <strong>Total Rate</strong>
              <strong class="badge bg-primary">1.2%</strong>
            </li>
          </ul>
          
          <div class="mt-3">
            <small class="text-muted d-block">Last Updated: 15-Oct-2023</small>
            <button class="btn btn-sm btn-outline-primary mt-2">
              <i class="bi bi-book me-1"></i> View Full Guidelines
            </button>
          </div>
        </div>
      </div>
      
      <!-- Referral & Approvals -->
      <div class="card mb-4 fade-in" style="animation-delay: 0.4s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-people section-icon"></i> 
            <span>Referral & Approvals</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Refer To</label>
            <select class="form-select">
              <option selected>No referral required</option>
              <option>Senior Underwriter</option>
              <option>Underwriting Manager</option>
              <option>Technical Committee</option>
            </select>
          </div>
          
          <div class="approval-history">
            <h6 class="mb-3">Approval Path</h6>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="fw-semibold">Initial Review</div>
                  <small class="text-muted">By: John M. (Underwriter)</small>
                </div>
                <span class="badge bg-secondary">Pending</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="fw-semibold">Senior Underwriter</div>
                  <small class="text-muted">Required if > TZS 10M</small>
                </div>
                <span class="badge bg-light text-muted">Not Required</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="fw-semibold">Final Approval</div>
                  <small class="text-muted">By: Underwriting Manager</small>
                </div>
                <span class="badge bg-secondary">Pending</span>
              </li>
            </ul>
          </div>
          
          <div class="d-grid mt-3">
            <button class="btn btn-outline-primary">
              <i class="bi bi-send me-1"></i> Request Approval
            </button>
          </div>
        </div>
      </div>
      
      <!-- Similar Risks -->
      <div class="card fade-in" style="animation-delay: 0.5s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-file-earmark-text section-icon"></i> 
            <span>Similar Risks</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">RN-2023-00392</h6>
                <small class="text-muted">Approved</small>
              </div>
              <p class="mb-1 small">Electronics - Dar to Mombasa</p>
              <small class="text-muted">Premium: TZS 48,000 @ 1.2%</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">RN-2023-00401</h6>
                <small class="text-muted">Approved</small>
              </div>
              <p class="mb-1 small">Household Goods - Dar to Mombasa</p>
              <small class="text-muted">Premium: TZS 32,500 @ 1.3%</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">RN-2023-00415</h6>
                <small class="text-danger">Declined</small>
              </div>
              <p class="mb-1 small">Pharmaceuticals - Dar to Mombasa</p>
              <small class="text-muted">Proposed: TZS 75,000 @ 1.5%</small>
            </a>
          </div>
          <button class="btn btn-sm btn-outline-primary w-100 mt-3">
            <i class="bi bi-search me-1"></i> Find More Similar Risks
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Documents Tab -->
<div class="tab-pane fade" id="documents">
  <div class="row">
    <!-- Main Documents Column -->
    <div class="col-lg-8">
      <!-- Document Management Card -->
      <div class="card mb-4 fade-in" style="animation-delay: 0.1s">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-folder2-open section-icon"></i> 
            <span>Risk Documents</span>
          </h5>
          <button class="btn btn-sm btn-primary">
            <i class="bi bi-upload me-1"></i> Upload Document
          </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Document</th>
                  <th>Type</th>
                  <th>Uploaded</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <i class="bi bi-file-earmark-pdf text-danger fs-4 me-3"></i>
                      <div>
                        <div class="fw-semibold">Marine_Cargo_Application.pdf</div>
                        <small class="text-muted">2.4 MB</small>
                      </div>
                    </div>
                  </td>
                  <td>Application</td>
                  <td>10-Nov-2023</td>
                  <td><span class="badge bg-success">Approved</span></td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary me-1">
                      <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-secondary">
                      <i class="bi bi-download"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <i class="bi bi-file-earmark-word text-primary fs-4 me-3"></i>
                      <div>
                        <div class="fw-semibold">Packing_List.docx</div>
                        <small class="text-muted">1.1 MB</small>
                      </div>
                    </div>
                  </td>
                  <td>Supporting Doc</td>
                  <td>12-Nov-2023</td>
                  <td><span class="badge bg-success">Approved</span></td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary me-1">
                      <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-secondary">
                      <i class="bi bi-download"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <i class="bi bi-file-earmark-excel text-success fs-4 me-3"></i>
                      <div>
                        <div class="fw-semibold">Cargo_Value_Calculation.xlsx</div>
                        <small class="text-muted">850 KB</small>
                      </div>
                    </div>
                  </td>
                  <td>Calculation</td>
                  <td>12-Nov-2023</td>
                  <td><span class="badge bg-success">Approved</span></td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary me-1">
                      <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-secondary">
                      <i class="bi bi-download"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <i class="bi bi-file-earmark-image text-warning fs-4 me-3"></i>
                      <div>
                        <div class="fw-semibold">Container_Photos.zip</div>
                        <small class="text-muted">4.7 MB</small>
                      </div>
                    </div>
                  </td>
                  <td>Photos</td>
                  <td>13-Nov-2023</td>
                  <td><span class="badge bg-warning">Pending Review</span></td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary me-1">
                      <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-secondary">
                      <i class="bi bi-download"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="mt-4">
            <h6 class="mb-3">Upload New Document</h6>
            <div class="border rounded p-4 text-center bg-light">
              <i class="bi bi-cloud-arrow-up fs-1 text-muted mb-3"></i>
              <p class="text-muted">Drag and drop files here or click to browse</p>
              <button class="btn btn-outline-primary">
                <i class="bi bi-folder2-open me-1"></i> Select Files
              </button>
              <div class="mt-2">
                <small class="text-muted">PDF, DOCX, XLSX, JPG, PNG up to 10MB</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Right Column -->
    <div class="col-lg-4">
      <!-- Document Requirements -->
      <div class="card mb-4 fade-in" style="animation-delay: 0.2s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-list-check section-icon"></i> 
            <span>Document Checklist</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            <strong>Required for Marine Cargo:</strong> 3 of 4 documents received
          </div>
          
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" checked id="check1">
                  <label class="form-check-label" for="check1">Completed Application Form</label>
                </div>
                <small class="text-muted ms-4">Received: 10-Nov-2023</small>
              </div>
              <i class="bi bi-check-circle-fill text-success"></i>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" checked id="check2">
                  <label class="form-check-label" for="check2">Packing List</label>
                </div>
                <small class="text-muted ms-4">Received: 12-Nov-2023</small>
              </div>
              <i class="bi bi-check-circle-fill text-success"></i>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" checked id="check3">
                  <label class="form-check-label" for="check3">Value Declaration</label>
                </div>
                <small class="text-muted ms-4">Received: 12-Nov-2023</small>
              </div>
              <i class="bi bi-check-circle-fill text-success"></i>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="check4">
                  <label class="form-check-label" for="check4">Container Photos</label>
                </div>
                <small class="text-muted ms-4">Pending</small>
              </div>
              <i class="bi bi-exclamation-circle-fill text-warning"></i>
            </li>
          </ul>
          
          <div class="mt-3">
            <button class="btn btn-sm btn-outline-primary">
              <i class="bi bi-envelope me-1"></i> Request Missing Documents
            </button>
          </div>
        </div>
      </div>
      
      <!-- Document Signatures -->
      <div class="card fade-in" style="animation-delay: 0.3s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-pen section-icon"></i> 
            <span>Signatures & Approvals</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="signature-item mb-4">
            <div class="d-flex justify-content-between mb-2">
              <span class="fw-semibold">Client Signature</span>
              <span class="badge bg-success">Complete</span>
            </div>
            <div class="d-flex align-items-center">
              <div class="signature-preview bg-light rounded me-3" style="width: 80px; height: 40px;"></div>
              <div>
                <small class="text-muted">Signed: 10-Nov-2023</small>
                <div>Jamal Mwinyi</div>
              </div>
            </div>
          </div>
          
          <div class="signature-item mb-4">
            <div class="d-flex justify-content-between mb-2">
              <span class="fw-semibold">Underwriter Approval</span>
              <span class="badge bg-secondary">Pending</span>
            </div>
            <div class="d-flex align-items-center">
              <div class="signature-preview bg-light rounded me-3" style="width: 80px; height: 40px;"></div>
              <div>
                <small class="text-muted">Awaiting signature</small>
                <div>Underwriting Team</div>
              </div>
            </div>
          </div>
          
          <div class="signature-item">
            <div class="d-flex justify-content-between mb-2">
              <span class="fw-semibold">Policy Issuance</span>
              <span class="badge bg-secondary">Pending</span>
            </div>
            <div class="d-flex align-items-center">
              <div class="signature-preview bg-light rounded me-3" style="width: 80px; height: 40px;"></div>
              <div>
                <small class="text-muted">Will be signed after approval</small>
                <div>Policy Administration</div>
              </div>
            </div>
          </div>
          
          <button class="btn btn-sm btn-primary w-100 mt-4">
            <i class="bi bi-pen-fill me-1"></i> Add My Signature
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- History Tab -->
<div class="tab-pane fade" id="history">
  <div class="container-fluid">
    <div class="row">
      <!-- Main History Column -->
      <div class="col-lg-8">
        <!-- Timeline Card -->
        <div class="card mb-4 fade-in" style="animation-delay: 0.1s">
          <div class="card-header">
            <h5 class="section-title mb-0 d-flex align-items-center">
              <i class="bi bi-clock-history section-icon"></i> 
              <span>Risk Timeline</span>
            </h5>
          </div>
          <div class="card-body">
            <div class="timeline">
              <div class="timeline-item">
                <div class="timeline-badge ">
                  <i class="bi bi-file-earmark-plus"></i>
                </div>
                <div class="timeline-content">
                  <div class="d-flex justify-content-between">
                    <h6>Risk Assessment Created</h6>
                    <small class="text-muted">10-Nov-2023 09:15</small>
                  </div>
                  <p>Initial risk assessment created by agent Sarah Johnson</p>
                  <small class="text-muted">System generated</small>
                </div>
              </div>
              
              <div class="timeline-item">
                <div class="timeline-badge">
                  <i class="bi bi-file-earmark-check"></i>
                </div>
                <div class="timeline-content">
                  <div class="d-flex justify-content-between">
                    <h6>Application Submitted</h6>
                    <small class="text-muted">10-Nov-2023 11:42</small>
                  </div>
                  <p>Client completed and signed application form</p>
                  <div class="d-flex align-items-center mt-2">
                    <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                    <small>Marine_Cargo_Application.pdf</small>
                  </div>
                </div>
              </div>
              
              <div class="timeline-item">
                <div class="timeline-badge">
                  <i class="bi bi-chat-left-text"></i>
                </div>
                <div class="timeline-content">
                  <div class="d-flex justify-content-between">
                    <h6>Underwriter Note Added</h6>
                    <small class="text-muted">11-Nov-2023 14:30</small>
                  </div>
                  <div class="border rounded p-3 ">
                    <p>"Initial review shows standard risk profile. Waiting for packing list and value declaration documents to complete assessment."</p>
                    <small class="text-muted">- John M., Underwriter</small>
                  </div>
                </div>
              </div>
              
              <div class="timeline-item">
                <div class="timeline-badge ">
                  <i class="bi bi-file-earmark-arrow-up"></i>
                </div>
                <div class="timeline-content">
                  <div class="d-flex justify-content-between">
                    <h6>Supporting Documents Uploaded</h6>
                    <small class="text-muted">12-Nov-2023 10:15</small>
                  </div>
                  <p>Client uploaded required supporting documents:</p>
                  <ul class="mb-0">
                    <li>Packing_List.docx</li>
                    <li>Cargo_Value_Calculation.xlsx</li>
                  </ul>
                </div>
              </div>
              
              <div class="timeline-item">
                <div class="timeline-badge">
                  <i class="bi bi-arrow-repeat"></i>
                </div>
                <div class="timeline-content">
                  <div class="d-flex justify-content-between">
                    <h6>Status Changed</h6>
                    <small class="text-muted">12-Nov-2023 16:22</small>
                  </div>
                  <p>Risk status changed from <span class="badge bg-secondary">New</span> to <span class="badge bg-warning">Under Review</span></p>
                  <small class="text-muted">System update</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Comments & Notes -->
        <div class="card fade-in" style="animation-delay: 0.2s">
          <div class="card-header">
            <h5 class="section-title mb-0 d-flex align-items-center">
              <i class="bi bi-chat-left-text section-icon"></i> 
              <span>Comments & Notes</span>
            </h5>
          </div>
          <div class="card-body">
            <div class="comment-list mb-4">
              <div class="comment-item mb-4">
                <div class="d-flex">
                  <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                      style="width: 70px; height: 48px; font-size: 18px; font-weight: 600;">
                    JM
                  </div>

                  <div>
                    <div class="d-flex justify-content-between">
                      <h6 class="mb-1">John Mwangi</h6>
                      <small class="text-muted">11-Nov-2023 14:30</small>
                    </div>
                    <div class="comment-text p-3 bg-light rounded">
                      <p class="mb-2">Initial review shows standard risk profile. Waiting for packing list and value declaration documents to complete assessment.</p>
                      <div class="d-flex align-items-center mt-2">
                        <span class="badge bg-primary me-2">Underwriting</span>
                        <span class="badge bg-info text-dark">Note</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="comment-item mb-4">
                <div class="d-flex">
                  <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; font-size: 18px; font-weight: 600;">SJ</div>
                  <div>
                    <div class="d-flex justify-content-between">
                      <h6>Sarah Johnson</h6>
                      <small class="text-muted">12-Nov-2023 10:45</small>
                    </div>
                    <div class="comment-text p-3 bg-light rounded">
                      <p>Documents uploaded as requested. Client confirmed departure date is firm for 15-Dec.</p>
                      <div class="d-flex align-items-center mt-2">
                        <span class="badge bg-secondary">Agent</span>
                        <span class="badge bg-success">Update</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="comment-item">
                <div class="d-flex">
                  <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; font-size: 18px; font-weight: 600;">PM</div>
                  <div>
                    <div class="d-flex justify-content-between">
                      <h6>Peter Mwangi</h6>
                      <small class="text-muted">13-Nov-2023 09:15</small>
                    </div>
                    <div class="comment-text p-3 bg-light rounded">
                      <p>Please confirm if container photos will be provided. This is required for full assessment.</p>
                      <div class="d-flex align-items-center mt-2">
                        <span class="badge bg-primary">Underwriting</span>
                        <span class="badge bg-warning">Query</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="add-comment">
              <h6 class="mb-3">Add New Comment</h6>
              <textarea class="form-control mb-3" rows="3" placeholder="Type your comment here..."></textarea>
              <div class="d-flex justify-content-between">
                <div>
                  <select class="form-select form-select-sm" style="width: 150px;">
                    <option>General Comment</option>
                    <option>Underwriting Note</option>
                    <option>Client Update</option>
                    <option>Query</option>
                  </select>
                </div>
                <button class="btn btn-primary">
                  <i class="bi bi-send me-1"></i> Post Comment
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Right Column -->
      <div class="col-lg-4">
        <!-- Status History -->
        <div class="card mb-4 fade-in" style="animation-delay: 0.3s">
          <div class="card-header">
            <h5 class="section-title mb-0 d-flex align-items-center">
              <i class="bi bi-arrow-repeat section-icon"></i> 
              <span>Status History</span>
            </h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="fw-semibold">Under Review</div>
                  <small class="text-muted">12-Nov-2023 16:22</small>
                </div>
                <span class="badge bg-warning">Current</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="fw-semibold">Documentation Pending</div>
                  <small class="text-muted">11-Nov-2023 14:30</small>
                </div>
                <i class="bi bi-check-circle-fill text-success"></i>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="fw-semibold">Application Submitted</div>
                  <small class="text-muted">10-Nov-2023 11:42</small>
                </div>
                <i class="bi bi-check-circle-fill text-success"></i>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="fw-semibold">Draft Created</div>
                  <small class="text-muted">10-Nov-2023 09:15</small>
                </div>
                <i class="bi bi-check-circle-fill text-success"></i>
              </li>
            </ul>
            
            <div class="mt-4">
              <h6 class="mb-3">Next Steps</h6>
              <div class="alert alert-info">
                <i class="bi bi-info-circle me-2"></i>
                Awaiting container photos to complete assessment
              </div>
              <button class="btn btn-sm btn-outline-primary w-100">
                <i class="bi bi-skip-forward me-1"></i> Advance Status
              </button>
            </div>
          </div>
        </div>
        
        <!-- User Activity -->
        <div class="card fade-in" style="animation-delay: 0.4s">
          <div class="card-header">
            <h5 class="section-title mb-0 d-flex align-items-center">
              <i class="bi bi-people section-icon"></i> 
              <span>User Activity</span>
            </h5>
          </div>
          <div class="card-body">
            <div class="user-activity-item mb-4">
              <div class="d-flex align-items-center mb-2">
                <div class="avatar bg-primary text-white rounded-circle me-3">JM</div>
                <div>
                  <div class="fw-semibold">John Mwangi</div>
                  <small class="text-muted">Underwriter</small>
                </div>
              </div>
              <div class="ps-5 ms-2">
                <small class="text-muted">Last active: 13-Nov-2023 09:15</small>
                <div class="mt-1">
                  <span class="badge bg-primary">Assigned</span>
                  <span class="badge bg-info">Reviewing</span>
                </div>
              </div>
            </div>
            
            <div class="user-activity-item mb-4">
              <div class="d-flex align-items-center mb-2">
                <div class="avatar bg-success text-white rounded-circle me-3">SJ</div>
                <div>
                  <div class="fw-semibold">Sarah Johnson</div>
                  <small class="text-muted">Agent</small>
                </div>
              </div>
              <div class="ps-5 ms-2">
                <small class="text-muted">Last active: 12-Nov-2023 10:45</small>
                <div class="mt-1">
                  <span class="badge bg-secondary">Submitted</span>
                </div>
              </div>
            </div>
            
            <div class="user-activity-item">
              <div class="d-flex align-items-center mb-2">
                <div class="avatar bg-light text-dark rounded-circle me-3">KM</div>
                <div>
                  <div class="fw-semibold">SURETECH Systems Mwinyi</div>
                  <small class="text-muted">Client</small>
                </div>
              </div>
              <div class="ps-5 ms-2">
                <small class="text-muted">Last active: 12-Nov-2023 10:15</small>
                <div class="mt-1">
                  <span class="badge bg-success">Documents Uploaded</span>
                </div>
              </div>
            </div>
            
            <button class="btn btn-sm btn-outline-primary w-100 mt-4">
              <i class="bi bi-person-plus me-1"></i> Assign User
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- Analytics Tab -->
<div class="tab-pane fade" id="analysis">
  <div class="row">
    <!-- Main Analytics Column -->
    <div class="col-lg-8">
      <!-- Risk Score Card -->
      <div class="card mb-4 fade-in" style="animation-delay: 0.1s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-speedometer2 section-icon"></i> 
            <span>Risk Score Analysis</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="risk-score-display text-center mb-4">
                <div class="score-circle mx-auto mb-3" data-score="68">
                  <svg class="progress-ring" width="120" height="120">
                    <circle class="progress-ring-circle" stroke-width="8" fill="transparent" r="52" cx="60" cy="60"/>
                  </svg>
                  <div class="score-value">68</div>
                </div>
                <h5>Current Risk Score</h5>
                <span class="badge bg-warning">Medium Risk</span>
                <p class="text-muted mt-2">Score range: 0-100 (Lower is better)</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="risk-factors">
                <h6 class="mb-3">Score Components</h6>
                <div class="factor-item mb-3">
                  <div class="d-flex justify-content-between mb-1">
                    <span>Route Safety</span>
                    <span>25/30</span>
                  </div>
                  <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 83%"></div>
                  </div>
                </div>
                <div class="factor-item mb-3">
                  <div class="d-flex justify-content-between mb-1">
                    <span>Cargo Type</span>
                    <span>12/15</span>
                  </div>
                  <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 80%"></div>
                  </div>
                </div>
                <div class="factor-item mb-3">
                  <div class="d-flex justify-content-between mb-1">
                    <span>Vessel Condition</span>
                    <span>15/25</span>
                  </div>
                  <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-warning" style="width: 60%"></div>
                  </div>
                </div>
                <div class="factor-item mb-3">
                  <div class="d-flex justify-content-between mb-1">
                    <span>Client History</span>
                    <span>10/20</span>
                  </div>
                  <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-warning" style="width: 50%"></div>
                  </div>
                </div>
                <div class="factor-item">
                  <div class="d-flex justify-content-between mb-1">
                    <span>Seasonal Factors</span>
                    <span>6/10</span>
                  </div>
                  <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 60%"></div>
                  </div>
                </div>
                
                <div class="alert alert-info mt-4">
                  <i class="bi bi-lightbulb me-2"></i>
                  <strong>Improvement Opportunity:</strong> Requesting vessel maintenance records could improve vessel condition score by up to 8 points.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Premium Comparison -->
      <div class="card mb-4 fade-in" style="animation-delay: 0.2s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-graph-up section-icon"></i> 
            <span>Premium Benchmarking</span>
          </h5>
          <div class="btn-group btn-group-sm ms-3">
            <button class="btn btn-outline-secondary active">1Y</button>
            <button class="btn btn-outline-secondary">3Y</button>
            <button class="btn btn-outline-secondary">5Y</button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-container" style="height: 300px;">
            <!-- Chart would be rendered here with JavaScript -->
            <div class="d-flex align-items-center justify-content-center bg-light rounded" style="height: 100%;">
              <div class="text-center text-muted">
                <i class="bi bi-bar-chart-line fs-1"></i>
                <p>Premium comparison chart</p>
                <small>Showing similar marine cargo risks for this route</small>
              </div>
            </div>
          </div>
          
          <div class="mt-4">
            <div class="row">
              <div class="col-md-4">
                <div class="stat-card p-3 bg-light rounded mb-3">
                  <small class="text-muted d-block">Proposed Premium</small>
                  <div class="fw-bold fs-4">TZS 60,000</div>
                  <small class="text-success">1.2% rate</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="stat-card p-3 bg-light rounded mb-3">
                  <small class="text-muted d-block">Market Average</small>
                  <div class="fw-bold fs-4">TZS 55,000</div>
                  <small class="text-warning">1.1% rate</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="stat-card p-3 bg-light rounded mb-3">
                  <small class="text-muted d-block">Company Average</small>
                  <div class="fw-bold fs-4">TZS 58,000</div>
                  <small class="text-info">1.16% rate</small>
                </div>
              </div>
            </div>
            
            <div class="alert alert-warning mt-3">
              <i class="bi bi-exclamation-triangle me-2"></i>
              Proposed premium is <strong>9.1% higher</strong> than market average for similar risks
            </div>
          </div>
        </div>
      </div>
      
      <!-- Claims Predictions -->
      <div class="card fade-in" style="animation-delay: 0.3s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-clipboard2-pulse section-icon"></i> 
            <span>Claims Predictions</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="prediction-card text-center p-3 mb-4">
                <h6 class="mb-3">Probability of Claim</h6>
                <div class="prediction-dial mx-auto mb-3" style="width: 120px; height: 120px;">
                  <!-- Dial visualization would go here -->
                  <div class="bg-light rounded-circle d-flex align-items-center justify-content-center h-100">
                    <div class="text-center">
                      <div class="fs-2 fw-bold">28%</div>
                      <small class="text-muted">Likelihood</small>
                    </div>
                  </div>
                </div>
                <div class="text-start">
                  <p class="small">Based on historical data for similar shipments:</p>
                  <ul class="small">
                    <li>23% average claim probability</li>
                    <li>32% for electronics</li>
                    <li>19% for this route</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="prediction-card text-center p-3 mb-4">
                <h6 class="mb-3">Expected Claim Severity</h6>
                <div class="prediction-dial mx-auto mb-3" style="width: 120px; height: 120px;">
                  <!-- Dial visualization would go here -->
                  <div class="bg-light rounded-circle d-flex align-items-center justify-content-center h-100">
                    <div class="text-center">
                      <div class="fs-2 fw-bold">TZS 42K</div>
                      <small class="text-muted">Per claim</small>
                    </div>
                  </div>
                </div>
                <div class="text-start">
                  <p class="small">Based on historical severity:</p>
                  <ul class="small">
                    <li>Average claim: TZS 38,500</li>
                    <li>Electronics average: TZS 45,200</li>
                    <li>Route average: TZS 32,100</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          
          <div class="risk-mitigation">
            <h6 class="mb-3">Risk Mitigation Suggestions</h6>
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <i class="bi bi-check-circle text-success me-2"></i>
                    <span>Require waterproof packaging certification</span>
                  </div>
                  <small class="text-muted">Reduces claim probability by ~15%</small>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <i class="bi bi-check-circle text-success me-2"></i>
                    <span>Add 24hr tracking requirement</span>
                  </div>
                  <small class="text-muted">Reduces severity by ~20%</small>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <i class="bi bi-check-circle text-success me-2"></i>
                    <span>Increase deductible to 1.5%</span>
                  </div>
                  <small class="text-muted">Improves loss ratio by ~8%</small>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Right Column -->
    <div class="col-lg-4">
      <!-- Loss Ratio Prediction -->
      <div class="card mb-4 fade-in" style="animation-delay: 0.4s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-clipboard2-data section-icon"></i> 
            <span>Loss Ratio Prediction</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="prediction-gauge mb-4 text-center">
            <div class="gauge-container mx-auto mb-3" style="width: 80%; max-width: 200px;">
              <!-- Gauge chart would be rendered here -->
              <div class="bg-light rounded" style="height: 120px; display: flex; align-items: center; justify-content: center;">
                <div class="text-muted">Loss Ratio Gauge</div>
              </div>
            </div>
            <h4>Predicted: 42-48%</h4>
            <small class="text-muted">Based on similar risks</small>
            <div class="progress mt-3" style="height: 10px;">
              <div class="progress-bar bg-success" style="width: 30%"></div>
              <div class="progress-bar bg-warning" style="width: 20%"></div>
              <div class="progress-bar bg-danger" style="width: 50%"></div>
            </div>
            <div class="d-flex justify-content-between small mt-1">
              <span>Good</span>
              <span>Target</span>
              <span>Poor</span>
            </div>
          </div>
          
          <div class="prediction-factors">
            <h6 class="mb-3">Key Factors</h6>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Client History</span>
                <span class="badge bg-success">Positive</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Route Safety</span>
                <span class="badge bg-success">Positive</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Cargo Type</span>
                <span class="badge bg-success">Positive</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Seasonal Factors</span>
                <span class="badge bg-warning">Neutral</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Vessel Age</span>
                <span class="badge bg-warning">Neutral</span>
              </li>
            </ul>
            
            <div class="alert alert-success mt-3">
              <i class="bi bi-check-circle me-2"></i>
              <strong>Within target range:</strong> Predicted LR is below company target of 55%
            </div>
          </div>
        </div>
      </div>
      
      <!-- Portfolio Impact -->
      <div class="card mb-4 fade-in" style="animation-delay: 0.5s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-pie-chart section-icon"></i> 
            <span>Portfolio Impact</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="portfolio-metrics mb-4">
            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted">Marine Cargo Concentration</span>
              <span class="fw-semibold">14.2%</span>
            </div>
            <div class="progress" style="height: 8px;">
              <div class="progress-bar bg-info" style="width: 14.2%"></div>
            </div>
            
            <div class="d-flex justify-content-between mt-3 mb-2">
              <span class="text-muted">Client Concentration</span>
              <span class="fw-semibold">3.8%</span>
            </div>
            <div class="progress" style="height: 8px;">
              <div class="progress-bar bg-primary" style="width: 3.8%"></div>
            </div>
            
            <div class="d-flex justify-content-between mt-3 mb-2">
              <span class="text-muted">Route Concentration</span>
              <span class="fw-semibold">9.1%</span>
            </div>
            <div class="progress" style="height: 8px;">
              <div class="progress-bar bg-warning" style="width: 9.1%"></div>
            </div>
          </div>
          
          <div class="portfolio-alert">
            <h6 class="mb-3">Portfolio Warnings</h6>
            <div class="alert alert-warning small">
              <i class="bi bi-exclamation-triangle me-2"></i>
              This would increase Dar-Mombasa route concentration above 10% threshold
            </div>
            <div class="alert alert-info small">
              <i class="bi bi-info-circle me-2"></i>
              Client has 2 other active marine policies (TZS 3.2M total exposure)
            </div>
          </div>
        </div>
      </div>
      
      <!-- Similar Risk Comparison -->
      <div class="card fade-in" style="animation-delay: 0.6s">
        <div class="card-header">
          <h5 class="section-title mb-0 d-flex align-items-center">
            <i class="bi bi-file-earmark-ruled section-icon"></i> 
            <span>Similar Risk Performance</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="similar-risk-item mb-3">
            <div class="d-flex justify-content-between mb-1">
              <span class="fw-semibold">Electronics - Dar to Mombasa</span>
              <span class="badge bg-success">45% LR</span>
            </div>
            <small class="text-muted d-block">RN-2023-00392 (Approved)</small>
            <div class="progress mt-1" style="height: 4px;">
              <div class="progress-bar bg-success" style="width: 45%"></div>
            </div>
          </div>
          
          <div class="similar-risk-item mb-3">
            <div class="d-flex justify-content-between mb-1">
              <span class="fw-semibold">Electronics - Dar to Zanzibar</span>
              <span class="badge bg-success">38% LR</span>
            </div>
            <small class="text-muted d-block">RN-2023-00218 (Approved)</small>
            <div class="progress mt-1" style="height: 4px;">
              <div class="progress-bar bg-success" style="width: 38%"></div>
            </div>
          </div>
          
          <div class="similar-risk-item mb-3">
            <div class="d-flex justify-content-between mb-1">
              <span class="fw-semibold">Electronics - Mombasa to Dar</span>
              <span class="badge bg-warning">62% LR</span>
            </div>
            <small class="text-muted d-block">RN-2023-00154 (Approved)</small>
            <div class="progress mt-1" style="height: 4px;">
              <div class="progress-bar bg-warning" style="width: 62%"></div>
            </div>
          </div>
          
          <div class="similar-risk-item">
            <div class="d-flex justify-content-between mb-1">
              <span class="fw-semibold">Pharmaceuticals - Dar to Mombasa</span>
              <span class="badge bg-danger">78% LR</span>
            </div>
            <small class="text-muted d-block">RN-2023-00315 (Declined)</small>
            <div class="progress mt-1" style="height: 4px;">
              <div class="progress-bar bg-danger" style="width: 78%"></div>
            </div>
          </div>
          
          <div class="mt-3">
            <table class="table table-sm small">
              <thead>
                <tr>
                  <th>Metric</th>
                  <th>Average</th>
                  <th>This Risk</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Loss Ratio</td>
                  <td>52%</td>
                  <td class="fw-bold text-success">45-48%</td>
                </tr>
                <tr>
                  <td>Claim Frequency</td>
                  <td>24%</td>
                  <td class="fw-bold text-success">22-26%</td>
                </tr>
                <tr>
                  <td>Claim Severity</td>
                  <td>TZS 42K</td>
                  <td class="fw-bold">TZS 40-45K</td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <button class="btn btn-sm btn-outline-primary w-100 mt-2">
            <i class="bi bi-graph-up me-1"></i> View Full Analysis
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
      <!-- Other tabs would go here with similar enhancements -->
      
    </div>
    
    <!-- Premium Floating Action Button -->
   <button id="openQuickActions" class="floating-action-btn pulse" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick Actions">
    <i class="bi bi-lightning"></i>
    </button>

    
    <!-- Enhanced Footer Actions -->
    <div class="d-flex justify-content-between mt-5 pt-3 border-top">
      <a href="{{url ('/dash/index')}}">
      <button class="btn btn-outline-secondary rounded-pill px-4 py-2">
        <i class="bi bi-arrow-left me-2"></i> Back to Dashboard
      </button>
      </a>
      <div class="d-flex gap-3">
        <button class="btn btn-outline-primary rounded-pill px-4 py-2">
          <i class="bi bi-save me-2"></i> Save Draft
        </button>
        <button class="btn btn-primary rounded-pill px-4 py-2">
          <i class="bi bi-send-check me-2"></i> Submit for Approval
        </button>
      </div>
    </div>
  </div>

  <!-- Modal Template -->
<div class="modal fade" id="quickActionsModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="bi bi-lightning-charge-fill me-2"></i> Quick Actions</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
          <li class="list-group-item"><i class="bi bi-file-earmark-plus me-2 text-primary"></i> New Risk Assessment</li>
          <li class="list-group-item"><i class="bi bi-search me-2 text-primary"></i> Client Lookup</li>
          <li class="list-group-item"><i class="bi bi-chat-dots me-2 text-primary"></i> Underwriter Chat</li>
        </ul>
      </div>
    </div>
  </div>
</div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    
  document.addEventListener('DOMContentLoaded', function () {
    const quickBtn = document.getElementById('openQuickActions');
    const quickModal = new bootstrap.Modal(document.getElementById('quickActionsModal'));

    quickBtn?.addEventListener('click', function () {
      quickModal.show();
    });
  });

  </script>
<!--button action-->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Create modal backdrop element (hidden by default)
    const modalBackdrop = document.createElement('div');
    modalBackdrop.className = 'modal-backdrop';
    modalBackdrop.style.cssText = `
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    `;
    document.body.appendChild(modalBackdrop);

    // Create modal content template
    const modalContent = document.createElement('div');
    modalContent.className = 'modal-content';
    modalContent.style.cssText = `
        background: white;
        padding: 20px;
        border-radius: 5px;
        max-width: 500px;
        width: 80%;
        position: relative;
    `;
    
    // Close button for modal
    const closeButton = document.createElement('button');
    closeButton.className = 'modal-close';
    closeButton.textContent = '×';
    closeButton.style.cssText = `
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
    `;
    
    // Modal title
    const modalTitle = document.createElement('h2');
    modalTitle.className = 'modal-title';
    modalTitle.style.marginBottom = '15px';
    
    // Modal body
    const modalBody = document.createElement('div');
    modalBody.className = 'modal-body';
    
    // Assemble modal
    modalContent.appendChild(closeButton);
    modalContent.appendChild(modalTitle);
    modalContent.appendChild(modalBody);
    modalBackdrop.appendChild(modalContent);

    // Function to show modal
    function showModal(title, content) {
        modalTitle.textContent = title;
        modalBody.innerHTML = content;
        modalBackdrop.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    // Function to hide modal
    function hideModal() {
        modalBackdrop.style.display = 'none';
        document.body.style.overflow = '';
    }

    // Close modal when clicking close button or backdrop
    closeButton.addEventListener('click', hideModal);
    modalBackdrop.addEventListener('click', function(e) {
        if (e.target === modalBackdrop) hideModal();
    });

    // Make all buttons open modals
  

    // Make all anchor tags that aren't links open modals
    document.querySelectorAll('a:not([href^="http"]):not([href^="#"]):not([href^="/"])').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            showModal('Link Clicked', `You activated the "${link.textContent.trim()}" link`);
        });
    });
});
  
</script>
<!--end of button action-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>