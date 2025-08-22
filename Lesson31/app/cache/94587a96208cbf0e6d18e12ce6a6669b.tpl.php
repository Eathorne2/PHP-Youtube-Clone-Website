<?php $this->extends = "admin.admin";?>

<?php ob_start(); $this->currentSection = "main-content";?>
	<div>
		  <h4 class="mb-2">
		    <div>Upload New Video</div>
		    <small class="text-muted" style="font-size:18px">Channel Name</small>
		  </h4>

		  <form id="uploadForm">

		    <!-- Tabs -->
		    <ul class="nav nav-tabs" id="uploadTabs" role="tablist">
		      <li class="nav-item" role="presentation">
		        <button class="nav-link active" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic" type="button" role="tab">Basic Info</button>
		      </li>
		      <li class="nav-item" role="presentation">
		        <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab">SEO</button>
		      </li>
		      <li class="nav-item" role="presentation">
		        <button class="nav-link" id="visibility-tab" data-bs-toggle="tab" data-bs-target="#visibility" type="button" role="tab">Visibility</button>
		      </li>
		    </ul>

		    <div class="tab-content border border-top-0 p-4">
		      
		      <!-- Basic Info Tab -->
		      <div class="tab-pane fade show active" id="basic" role="tabpanel">
		        <div class="mb-3">
		          <label class="form-label">Video Title</label>
		          <input type="text" class="form-control" placeholder="Enter title">
		        </div>
		        <div class="mb-3">
		          <label class="form-label">Description</label>
		          <textarea class="form-control" rows="4" placeholder="Write a description..."></textarea>
		        </div>
		      </div>

		      <!-- SEO Tab -->
		      <div class="tab-pane fade" id="seo" role="tabpanel">
		        <div class="mb-3">
		          <label class="form-label">Category</label>
		          <select class="form-select">
		            <option>Education</option>
		            <option>Entertainment</option>
		            <option>Technology</option>
		            <option>Music</option>
		            <option>Sports</option>
		          </select>
		        </div>

		        <div class="mb-3">
		          <label class="form-label">Tags</label>
		          <input type="text" class="form-control" placeholder="Add tags separated by commas">
		        </div>

		        <div class="mb-3">
		          <label class="form-label">Thumbnail</label>
		          <input type="file" class="form-control">
		        </div>
		      </div>

		      <!-- Visibility Tab -->
		      <div class="tab-pane fade" id="visibility" role="tabpanel">
		        <div class="mb-3">
		          <label class="form-label">Visibility</label>
		          <select class="form-select">
		            <option>Public</option>
		            <option>Unlisted</option>
		            <option>Private</option>
		          </select>
		        </div>

		      </div>

		    </div>

		    <!-- Sticky Upload Progress Section -->
		    <div class="progress-sticky">

		      <!-- Navigation Buttons -->
		      <div class="d-flex justify-content-between my-1">
		        <button type="button" class="btn btn-outline-secondary" id="prevBtn">Back</button>
		        <div style="flex:1" class="mx-2">
		          
		          <h6>Upload Progress</h6>
		          <div class="progress mb-2">
		            <div class="progress-bar bg-danger" role="progressbar" style="width: 0%;" id="uploadProgress">0%</div>
		          </div>
		        </div>
		        <button type="button" class="btn btn-outline-primary" id="nextBtn">Next</button>
		      </div>

		    </div>

		  </form>
	</div>

	
	<!-- Upload Modal -->
	<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">

	      <div class="modal-body">
	        <h5 class="text-center mb-4">Upload Your Video</h5>

	        <div class="dropzone" id="dropzone">
	          <i class="fas fa-upload fa-3x mb-3 text-muted"></i>
	          <p>Drag and drop your video here</p>
	          <p>or</p>
	          <button type="button" class="btn btn-danger" id="selectBtn">Select File</button>
	          <input type="file" id="fileInput" class="d-none">
	        </div>
	      </div>

	    </div>
	  </div>
	</div>

	<!-- Tab Navigation JS -->
	<script>
	  const tabs = ['basic', 'seo', 'visibility'];
	  let currentTab = 0;

	  document.getElementById('nextBtn').addEventListener('click', function() {
	    if (currentTab < tabs.length - 1) {
	      currentTab++;
	      document.getElementById(tabs[currentTab] + '-tab').click();
	    }
	  });

	  document.getElementById('prevBtn').addEventListener('click', function() {
	    if (currentTab > 0) {
	      currentTab--;
	      document.getElementById(tabs[currentTab] + '-tab').click();
	    }
	  });

	  const tabButtons = document.querySelectorAll('#uploadTabs button');
	  tabButtons.forEach((btn, index) => {
	    btn.addEventListener('shown.bs.tab', () => {
	      currentTab = index;
	    });
	  });


	  // Upload Modal Logic
	  const uploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));
	  window.addEventListener('load', () => {
	    uploadModal.show();
	  });

	  document.getElementById('selectBtn').addEventListener('click', () => {
	    document.getElementById('fileInput').click();
	  });

	  document.getElementById('fileInput').addEventListener('change', function() {
	    if (this.files.length > 0) {
	      uploadModal.hide();
	    }
	  });

	  // Optional: Handle Drag-and-Drop Upload
	  const dropzone = document.getElementById('dropzone');
	  dropzone.addEventListener('dragover', function(e) {
	    e.preventDefault();
	    dropzone.classList.add('bg-light');
	  });

	  dropzone.addEventListener('dragleave', function(e) {
	    e.preventDefault();
	    dropzone.classList.remove('bg-light');
	  });

	  dropzone.addEventListener('drop', function(e) {
	    e.preventDefault();
	    const files = e.dataTransfer.files;
	    if (files.length > 0) {
	      uploadModal.hide();
	    }
	  });
	</script>


<?php $this->sections["$this->currentSection"] = ob_get_clean();