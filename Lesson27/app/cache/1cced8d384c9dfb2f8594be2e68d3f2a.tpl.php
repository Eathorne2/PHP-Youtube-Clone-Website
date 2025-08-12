<?php $this->extends = "admin.admin";?>

<?php ob_start(); $this->currentSection = "main-content";?>
	Settings
<?php $this->sections["$this->currentSection"] = ob_get_clean();