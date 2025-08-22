<?php $this->extends = "frontend.frontend";?>

<?php ob_start(); $this->currentSection = "content";?>
	<h1>This is the home page</h1>
<?php $this->sections["$this->currentSection"] = ob_get_clean();