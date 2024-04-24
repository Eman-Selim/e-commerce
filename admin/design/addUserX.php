
<form class="col-lg-12" method = "post" action="Functions/userAdd.php">
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" placeholder="Enter username" name="username">
  </div>
    <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password">
  </div>
   <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control"  placeholder="Enter address" name="address">
  </div>
   <div class="form-group">
    <label>Phone</label>
    <input type="phone" class="form-control" placeholder="Enter phone" name="phone">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
      <label>Privliges</label>
      <select class="custom-select" name="priv">
          <option value="user">user</option>
          <option value="admin">admin</option>
      </select>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male">
          <label class="form-check-label">
            male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female">
          <label class="form-check-label">
            female
          </label>
        </div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
