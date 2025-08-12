<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Insurance Renewals</title>
  
@include('Cat_heading.heading')
</head>
<body>

<div class="container py-5">
  <div class="mb-4 d-flex justify-content-between align-items-center">
    <h3 class="page-title"> Insurance Renewals</h3>
    <button class="btn btn-outline-primary btn-sm">
      <i class="bi bi-plus-circle me-1"></i> New Policy
    </button>
  </div>

  <!-- Filters -->
  <div class="card p-4 mb-4">
    <form id="filterForm" class="row gy-3 gx-4 align-items-end">
      <div class="col-md-3">
        <label class="form-label">Client Name</label>
        <input type="text" class="form-control" id="filterClient" placeholder="e.g. Ahmed Siasa">
      </div>
      <div class="col-md-3">
        <label class="form-label">Policy Number</label>
        <input type="text" class="form-control" id="filterPolicy" placeholder="e.g. POL123456">
      </div>
      <div class="col-md-3">
        <label class="form-label">Insurance Type</label>
        <select class="form-select" id="filterType">
          <option value="">All Types</option>
          <option value="Motor">Motor</option>
          <option value="Health">Health</option>
          <option value="Fire">Fire</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Expiry Date</label>
        <input type="date" class="form-control" id="filterExpiry">
      </div>
      <div class="col-12 d-flex justify-content-end gap-2">
        <button type="button" class="btn btn-primary" onclick="applyFilter()"><i class="bi bi-search me-1"></i>Search</button>
        <button type="reset" class="btn btn-outline-secondary" onclick="resetFilter()"><i class="bi bi-x-circle me-1"></i>Clear</button>
      </div>
    </form>
  </div>

  <!-- Table -->
  <div class="card p-3">
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th>Client</th>
            <th>Policy #</th>
            <th>Type</th>
            <th>Insurer</th>
            <th>Expiry</th>
            <th>Premium</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody id="renewalBody">
          <tr>
            <td>Ahmed Siasa</td>
            <td>POL123456</td>
            <td>Motor</td>
            <td>Heritage Insurance</td>
            <td>2025-08-10</td>
            <td>$500</td>
            <td><span class="badge bg-warning text-dark">Due</span></td>
            <td class="text-end">
              <button class="btn btn-sm btn-success me-1" onclick="openRenewModal('Ahmed Siasa')"><i class="bi bi-arrow-repeat me-1"></i>Renew</button>
              <button class="btn btn-sm btn-info text-white me-1" onclick="openViewModal('Ahmed Siasa')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-sm btn-outline-primary" onclick="alert('Reminder sent to Ahmed Siasa')"><i class="bi bi-bell"></i></button>
            </td>
          </tr>
          <tr>
            <td>Aisha Bello</td>
            <td>POL987654</td>
            <td>Health</td>
            <td>Jubilee Insurance</td>
            <td>2025-07-20</td>
            <td>$750</td>
            <td><span class="badge bg-danger">Overdue</span></td>
            <td class="text-end">
              <button class="btn btn-sm btn-success me-1" onclick="openRenewModal('Aisha Bello')"><i class="bi bi-arrow-repeat me-1"></i>Renew</button>
              <button class="btn btn-sm btn-info text-white me-1" onclick="openViewModal('Aisha Bello')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-sm btn-outline-primary" onclick="alert('Reminder sent to Aisha Bello')"><i class="bi bi-bell"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">Policy Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Client Name:</strong> <span id="viewClient"></span></p>
        <p><strong>Policy Number:</strong> POL123456</p>
        <p><strong>Insurance Type:</strong> Motor</p>
        <p><strong>Premium:</strong> $500</p>
        <p><strong>Expiry Date:</strong> 2025-08-10</p>
      </div>
    </div>
  </div>
</div>

<!-- Renew Modal -->
<div class="modal fade" id="renewModal" tabindex="-1" aria-labelledby="renewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title" id="renewModalLabel">Renew Policy</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Client</label>
            <input type="text" class="form-control" id="renewClient" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">New Expiry Date</label>
            <input type="date" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Premium</label>
            <input type="text" class="form-control" placeholder="$0.00">
          </div>
          <button type="submit" class="btn btn-success w-100">Submit Renewal</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function applyFilter() {
    const client = document.getElementById('filterClient').value.toLowerCase();
    const policy = document.getElementById('filterPolicy').value.toLowerCase();
    const type = document.getElementById('filterType').value.toLowerCase();
    const expiry = document.getElementById('filterExpiry').value;

    const rows = document.querySelectorAll("#renewalBody tr");

    rows.forEach(row => {
      const [tdClient, tdPolicy, tdType, , tdExpiry] = row.children;
      const match =
        (client === '' || tdClient.textContent.toLowerCase().includes(client)) &&
        (policy === '' || tdPolicy.textContent.toLowerCase().includes(policy)) &&
        (type === '' || tdType.textContent.toLowerCase() === type) &&
        (expiry === '' || tdExpiry.textContent === expiry);

      row.style.display = match ? '' : 'none';
    });
  }

  function resetFilter() {
    document.getElementById("filterForm").reset();
    document.querySelectorAll("#renewalBody tr").forEach(row => row.style.display = '');
  }

  function openViewModal(client) {
    document.getElementById('viewClient').textContent = client;
    const modal = new bootstrap.Modal(document.getElementById('viewModal'));
    modal.show();
  }

  function openRenewModal(client) {
    document.getElementById('renewClient').value = client;
    const modal = new bootstrap.Modal(document.getElementById('renewModal'));
    modal.show();
  }
</script>

</body>
</html>
