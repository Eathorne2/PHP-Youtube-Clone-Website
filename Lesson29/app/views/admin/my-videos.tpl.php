@extends("admin.admin")

@section('main-content')
	
	<style type="text/css">
		.video-card img {
	      width: 100%;
	      height: 160px;
	      object-fit: cover;
	    }
	    .video-info {
	      font-size: 0.9rem;
	      color: #666;
	    }
	</style>
  <!-- Main Content -->
  <div class="">
    <h3 class="mt-5 mb-4">🎥 My Videos</h3>

    <div class="row g-4">

      <!-- Video Card -->
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm video-card">
          <img src="https://placehold.co/320x180?text=Thumbnail" class="card-img-top" alt="Thumbnail" />
          <div class="card-body">
            <h5 class="card-title">My Travel Vlog</h5>
            <p class="video-info">1.2k views • Jan 12, 2025</p>
            <div class="d-flex justify-content-between mt-3">
              <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editVideoModal"><i class="fas fa-edit me-1"></i>Edit</a>
              <a href="#" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteVideoModal" data-video-title="My Travel Vlog"><i class="fas fa-trash me-1"></i>Delete</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Duplicate this block for more videos -->
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm video-card">
          <img src="https://placehold.co/320x180?text=Thumbnail" class="card-img-top" alt="Thumbnail" />
          <div class="card-body">
            <h5 class="card-title">How to Cook Jollof Rice</h5>
            <p class="video-info">843 views • Feb 3, 2025</p>
            <div class="d-flex justify-content-between mt-3">
              <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editVideoModal"><i class="fas fa-edit me-1"></i>Edit</a>
              <a href="#" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteVideoModal" data-video-title="My Travel Vlog"><i class="fas fa-trash me-1"></i>Delete</a>
            </div>
          </div>
        </div>
      </div>

      <!-- More sample cards can go here -->

    </div>
  </div>


<!-- Edit Video Modal -->
<div class="modal fade" id="editVideoModal" tabindex="-1" aria-labelledby="editVideoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="editVideoLabel"><i class="fas fa-edit me-2 text-primary"></i>Edit Video</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="editVideoForm">
          <input type="hidden" id="editVideoId">

          <!-- Title -->
          <div class="mb-3">
            <label for="editTitle" class="form-label">Video Title</label>
            <input type="text" class="form-control" id="editTitle" required>
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label for="editDescription" class="form-label">Description</label>
            <textarea class="form-control" id="editDescription" rows="4" required></textarea>
          </div>

          <!-- Tags -->
          <div class="mb-3">
            <label for="editTags" class="form-label">Tags (comma-separated)</label>
            <input type="text" class="form-control" id="editTags">
          </div>

          <!-- Visibility -->
          <div class="mb-3">
            <label for="editVisibility" class="form-label">Visibility</label>
            <select class="form-select" id="editVisibility">
              <option value="public">Public</option>
              <option value="private">Private</option>
              <option value="unlisted">Unlisted</option>
            </select>
          </div>

          <!-- Category -->
          <div class="mb-3">
            <label for="editCategory" class="form-label">Category</label>
            <select class="form-select" id="editCategory">
              <option value="entertainment">Entertainment</option>
              <option value="education">Education</option>
              <option value="music">Music</option>
              <option value="gaming">Gaming</option>
              <option value="vlogs">Vlogs</option>
              <option value="sports">Sports</option>
            </select>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Cancel
        </button>
        <button type="submit" class="btn btn-primary" form="editVideoForm">
          <i class="fas fa-save me-1"></i>Save Changes
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteVideoModal" tabindex="-1" aria-labelledby="deleteVideoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="deleteVideoLabel">
          <i class="fas fa-trash-alt me-2"></i>Delete Video
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-2">Are you sure you want to delete this video?</p>
        <p><strong id="videoTitleToDelete">Video Title</strong></p>
        <input type="hidden" id="deleteVideoId">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Cancel
        </button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
          <i class="fas fa-trash me-1"></i>Delete
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('[data-bs-target="#editVideoModal"]').forEach(button => {
    button.addEventListener('click', function () {
      // Populate modal fields here (mock data for now)
      document.getElementById('editTitle').value = 'My Travel Vlog';
      document.getElementById('editDescription').value = 'This is a description of my travel vlog.';
      document.getElementById('editTags').value = 'travel,africa,adventure';
      document.getElementById('editVisibility').value = 'public';
      document.getElementById('editCategory').value = 'vlogs';
    });
  });
</script>

<script>
  const deleteButtons = document.querySelectorAll('[data-bs-target="#deleteVideoModal"]');

  deleteButtons.forEach(button => {
    button.addEventListener('click', () => {
      const title = button.getAttribute('data-video-title');
      document.getElementById('videoTitleToDelete').textContent = title;
      // Set ID for backend handling if needed
      // document.getElementById('deleteVideoId').value = button.getAttribute('data-video-id');
    });
  });

  // Handle Delete Confirmation
  document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
    const id = document.getElementById('deleteVideoId').value;
    console.log("Delete video with ID:", id); // Replace with AJAX later
    // Close modal manually if needed
    const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteVideoModal'));
    deleteModal.hide();
    alert("Video deleted (simulated)");
  });
</script>

@endsection