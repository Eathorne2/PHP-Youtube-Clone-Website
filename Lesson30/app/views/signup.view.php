<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up - YouTube Clone</title>
  <!-- Bootstrap CSS -->
  <link href="<?=BASE_URL?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link href="<?=BASE_URL?>/assets/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f9f9f9;
    }
    .form-container {
      max-width: 600px;
      margin: 50px auto;
      padding: 30px;
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }
    .youtube-header {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 25px;
    }
    .youtube-header i {
      color: red;
      font-size: 32px;
      margin-right: 10px;
    }
    .youtube-header span {
      font-size: 26px;
      font-weight: bold;
      color: #333;
    }
  </style>
</head>
<body>

<div class="form-container">
  <div class="youtube-header">
    <i class="fas fa-play-circle"></i>
    <span>YouTube Clone</span>
  </div>
  <h4 class="text-center mb-4">Create Your Account</h4>

  <form  method="POST">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input value="<?=oldValue('first_name')?>" type="text" class="form-control" name="first_name" id="first_name" >
        <?=showError($errors,'first_name')?>
      </div>
      <div class="col-md-6 mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="<?=oldValue('last_name')?>" name="last_name" id="last_name" >
        <?=showError($errors,'last_name')?>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" value="<?=oldValue('email')?>" name="email" id="email" >
        <?=showError($errors,'email')?>
      </div>
      <div class="col-md-6 mb-3">
        <label for="country_id" class="form-label">Country</label>
        <select class="form-select" value="<?=oldValue('country_id')?>" name="country_id">
          <option value="">--Select--</option>
          
          <?php if(!empty($countries)):?>
            <?php foreach($countries as $country):?>
              <option <?=oldSelect('country_id',$country->id)?> value="<?=$country->id?>"><?=esc($country->country)?></option>
            <?php endforeach?>
          <?php endif?>

        </select>
        <?=showError($errors,'country_id')?>
      </div>
    </div>
    

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" name="gender">
          <option value="">--Select--</option>
          <option <?=oldSelect('gender','male')?> value="male">Male</option>
          <option <?=oldSelect('gender','female')?> value="female">Female</option>
          <option <?=oldSelect('gender','other')?> value="other">Other</option>
        </select>
        <?=showError($errors,'gender')?>
      </div>
      <div class="col-md-6 mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" value="<?=oldValue('dob')?>" name="dob" id="dob" >
      <?=showError($errors,'dob')?>
      </div>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" value="<?=oldValue('password')?>" name="password" id="password" >
      <?=showError($errors,'password')?>
    </div>

    <div class="mb-3">
      <label for="password_verify" class="form-label">Retype Password</label>
      <input type="password" class="form-control" value="<?=oldValue('password_verify')?>" name="password_verify" id="password_verify" >
    </div>

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="terms" value="1" <?=oldChecked('terms','1')?> name="terms" >
      <label class="form-check-label" for="terms">
        I agree to the <a href="<?=BASE_URL?>/terms">Terms</a> & <a href="<?=BASE_URL?>/privacy">Privacy Policy</a>
      </label>
      <?=showError($errors,'terms')?>
    </div>

    <button type="submit" class="btn btn-danger w-100">
      <i class="fas fa-user-plus me-2"></i> Sign Up
    </button>

    <p class="text-center mt-3">
      Already have an account? <a href="<?=BASE_URL?>/login">Log In</a>
    </p>
  </form>
</div>

<!-- Bootstrap JS -->
<script src="<?=BASE_URL?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
