@extends("admin.admin")

@section('main-content')
	
	 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	 
	<style type="text/css">
		.card-icon {
	      font-size: 1.5rem;
	    }
	</style>
	<div class="">
		<h3 class="mb-4 mt-5">📊 Video Analytics</h3>

	    <!-- Stats Cards -->
	    <div class="row g-4 mb-5">
	      <div class="col-md-6 col-lg-3">
	        <div class="card shadow-sm text-center p-3">
	          <div class="card-body">
	            <i class="fas fa-eye card-icon text-primary"></i>
	            <h5 class="mt-3">Total Views</h5>
	            <h4>25,430</h4>
	          </div>
	        </div>
	      </div>
	      <div class="col-md-6 col-lg-3">
	        <div class="card shadow-sm text-center p-3">
	          <div class="card-body">
	            <i class="fas fa-clock card-icon text-success"></i>
	            <h5 class="mt-3">Watch Time</h5>
	            <h4>980 hrs</h4>
	          </div>
	        </div>
	      </div>
	      <div class="col-md-6 col-lg-3">
	        <div class="card shadow-sm text-center p-3">
	          <div class="card-body">
	            <i class="fas fa-users card-icon text-danger"></i>
	            <h5 class="mt-3">Subscribers</h5>
	            <h4>1,245</h4>
	          </div>
	        </div>
	      </div>
	      <div class="col-md-6 col-lg-3">
	        <div class="card shadow-sm text-center p-3">
	          <div class="card-body">
	            <i class="fas fa-globe card-icon text-warning"></i>
	            <h5 class="mt-3">Top Country</h5>
	            <h4>Zambia</h4>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- Chart -->
	    <div class="card shadow-sm p-4">
	      <h5 class="mb-3"><i class="fas fa-chart-line me-2 text-info"></i>Views This Week</h5>
	      <canvas id="viewsChart" height="120"></canvas>
	    </div>

	</div>


  <!-- Chart Script -->
  <script>
    const ctx = document.getElementById('viewsChart').getContext('2d');
    const viewsChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
          label: 'Views',
          data: [450, 380, 500, 620, 700, 480, 390],
          backgroundColor: '#007bff'
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>

@endsection