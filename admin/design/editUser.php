
<?php
    require_once 'Functions/connect.php';
    $id = $_GET['id'];
    $selectUser ="SELECT * FROM users WHERE id='$id'";
    $query = $conn ->query($selectUser);
    $user =$query -> fetch_assoc();
?>
<form class="col-lg-12" method = "post" action="Functions/userEdit.php?id=<?= $id;?>">
  <div class="form-group">
    <label>Username</label>
    <input type="username" class="form-control" placeholder="Enter username" name="username" value="<?= $user['username'];?>">
  </div>
    <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password">
  </div>
   <div class="form-group">
    <label>Address</label>
    <input type="address" class="form-control"  placeholder="Enter address" name="address" value="<?= $user['address'];?>">
  </div>
   <div class="form-group">
    <label>Phone</label>
    <input type="phone" class="form-control" placeholder="Enter phone" name="phone" value="<?= $user['phone'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?= $user['email'];?>">
  </div>
  <div class="form-group">
      <label>Privliges</label>
      <select class="custom-select" name="priv">
          <option value="user" <?= $user['priv']=="user"?'selected':'';?>>user</option>
          <option value="admin" <?= $user['priv']=="admin"?'selected':'';?>>admin</option>
      </select>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male"<?= $user['gender']=="male"?'checked':'';?>>
          <label class="form-check-label">
            male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female"<?= $user['gender']=="female"?'checked':'';?>>
          <label class="form-check-label">
            female
          </label>
        </div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
