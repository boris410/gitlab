</div>



<form  action="" method="post" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Register New Account</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Email Address</label>  
  <div class="col-md-4">
   <input  type="text" id="txtUserEmail" name="txtUserEmail" value="" class="form-control input-md" pattern="[a-z0-9_%+-]+@[a-z0-9-]+\.[a-z]{2,3}$" placeholder="***@*****.com.tw" required> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Password</label>  
  <div class="col-md-4">
  <input type="text" name="txtPassword" value="" class="form-control input-md" pattern="[a-z0-9]{6,12}" placeholder="Password-6至12得英文小寫數字"   required>
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">First Name</label>
  <div class="col-md-4">
    <input  type="text" name="firstname" value="" class="form-control input-md" pattern="[a-z0-9]{1,10}" placeholder="First Name"required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="contact">Last Name</label>  
  <div class="col-md-4">
  <input  type="text" name="lastname" value="" class="form-control input-md"  placeholder="Last Name" required>
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label" for="area">Phone Number</label>  
  <div class="col-md-4">
  <input  type="text" name="phone" value="" class="form-control input-md" pattern="[0-9]{10,10}" placeholder="09XXXXXXXX" required>
  </div>
</div>



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="signup"></label>
  <div class="col-md-4">
    <!--<button id="signup" name="submit" class="btn btn-success">submit</button>-->
    <input type="submit" name="submit" value="submit">
  </div>
</div>

</fieldset>
</form>
