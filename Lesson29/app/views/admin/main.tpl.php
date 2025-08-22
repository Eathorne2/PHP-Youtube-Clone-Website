@extends("admin.admin")

@section('main-content')

      <h4 class="ms-3 mt-5">Channel Dashboard</h4>

      <div class="d-flex flex-wrap">
        <div class="col-md-5 card shadow rounded-4">
          <div class="card-body text-center">
            <h5 class="my-2">Channel Analytics</h5>

            <hr>

            <div class="row mt-4">
              <div class="col-md-6 mb-1">
                <div class="p-2 bg-light rounded shadow-sm">
                  <h5 style="font-size:16px"><i class="fas fa-video text-danger me-2"></i>Uploaded Videos</h5>
                  <p class="display-6">12</p>
                </div>
              </div>
              <div class="col-md-6 mb-1">
                <div class="p-2 bg-light rounded shadow-sm">
                  <h5 style="font-size:16px"><i class="fas fa-users text-danger me-2"></i>Subscribers</h5>
                  <p class="display-6">248</p>
                </div>
              </div>
            </div>

            <a href="#" class="btn btn-danger mt-3">
              <i class="fas fa-upload me-2"></i> Upload New Video
            </a>
          </div>
        </div>

        <div class="col-md-5 card shadow rounded-4">
          <div class="card-body text-center">
            <h5 class="my-2">Summary</h5>
              <div class="text-muted">Last 28 Days</div>
            <hr>
            <div>
              <div class="row mt-4">
                <div class="col-md-6 mb-1">
                  <div class="p-2 bg-light rounded shadow-sm">
                    <h5 style="font-size:16px"><i class="fas fa-eye text-danger me-2"></i>Views</h5>
                    <p class="display-6">1.2K</p>
                  </div>
                </div>
                <div class="col-md-6 mb-1">
                  <div class="p-2 bg-light rounded shadow-sm">
                    <h5 style="font-size:16px"><i class="fas fa-film text-danger me-2"></i>Watch Time</h5>
                    <p class="display-6">567</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
@endsection
