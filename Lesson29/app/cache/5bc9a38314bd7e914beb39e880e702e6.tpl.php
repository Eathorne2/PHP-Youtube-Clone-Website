<?php $this->extends = "admin.admin";?>

<?php ob_start(); $this->currentSection = "main-content";?>
	
	<div class="d-flex justify-content-between align-items-center mb-3">
	    <h5>Your Channels</h5>
	    <a href="#" class="btn btn-danger btn-sm">
	      <i class="fas fa-plus"></i> Add Channel
	    </a>
	  </div>

	  <div id="channelList" class="list-group">

	    <!-- Example Channel -->
	    <div class="list-group-item channel-item d-flex align-items-center justify-content-between" onclick="selectChannel(1)">
	      <div class="d-flex align-items-center">
	        <img src="https://placehold.co/50x50" class="channel-avatar me-3" alt="Channel Avatar">
	        <div>
	          <div class="channel-name">Gaming Channel</div>
	          <small class="text-muted">100 videos</small>
	        </div>
	      </div>
	      <i class="fas fa-check-circle text-danger d-none" id="check-1"></i>
	    </div>

	    <div class="list-group-item channel-item d-flex align-items-center justify-content-between" onclick="selectChannel(2)">
	      <div class="d-flex align-items-center">
	        <img src="https://placehold.co/50x50" class="channel-avatar me-3" alt="Channel Avatar">
	        <div>
	          <div class="channel-name">Cooking with Sarah</div>
	          <small class="text-muted">45 videos</small>
	        </div>
	      </div>
	      <i class="fas fa-check-circle text-danger d-none" id="check-2"></i>
	    </div>

	    <div class="list-group-item channel-item d-flex align-items-center justify-content-between" onclick="selectChannel(3)">
	      <div class="d-flex align-items-center">
	        <img src="https://placehold.co/50x50" class="channel-avatar me-3" alt="Channel Avatar">
	        <div>
	          <div class="channel-name">Tech Reviews</div>
	          <small class="text-muted">22 videos</small>
	        </div>
	      </div>
	      <i class="fas fa-check-circle text-danger d-none" id="check-3"></i>
	    </div>

	</div>

	<!-- Custom Script -->
	<script>
	  let selectedChannel = 1; // Default selected channel

	  function selectChannel(channelId) {
	    // Hide all check marks
	    document.querySelectorAll('[id^="check-"]').forEach(el => el.classList.add('d-none'));
	    
	    // Show selected check mark
	    document.getElementById('check-' + channelId).classList.remove('d-none');

	    // You can add AJAX here later to update user's active channel on server
	    selectedChannel = channelId;
	    console.log("Selected Channel ID:", selectedChannel);
	  }

	  // Initialize selected channel
	  window.onload = function() {
	    selectChannel(selectedChannel);
	  }
	</script>

<?php $this->sections["$this->currentSection"] = ob_get_clean();