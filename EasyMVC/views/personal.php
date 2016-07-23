</div>

<div class="container">
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend><?php echo $data['mLastname']; ?> profile</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">FirstName</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data['mFirstname'] ?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Last Name </label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data['mLastname']; ?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data['mEmail'] ?>" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Password</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data['aPassword'] ?>" class="form-control input-md">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Phone</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="<?php echo $data['mPhone'] ?>" class="form-control input-md">
    
  </div>
</div>


</fieldset>
</form>

</div>