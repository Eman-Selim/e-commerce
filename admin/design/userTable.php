

<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" class="form-control validate" name="username">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" class="form-control validate" name="password">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
        </div>

        <div class="md-form mb-5">
        <i class="fas fa-address-card"></i>
          <input type="text" id="orangeForm-name" class="form-control validate" name="address">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your Address</label>
        </div>

        <div class="md-form mb-5">
        <i class="fas fa-phone"></i>
          <input type="phone" id="orangeForm-name" class="form-control validate" name="phone">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your phone</label>
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" class="form-control validate" name="email">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-users-cog"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Privliges</label>
          <select class="custom-select" name="priv">
              <option value="user">user</option>
              <option value="admin">admin</option>
          </select>
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-venus-mars"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Gender</label>
          <select class="custom-select" name="gender">
              <option value="male">male</option>
              <option value="female">female</option>
          </select>
        </div>
         
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-deep-orange addUser">Sign up</button>
      </div>

      <div class="newData modal-body mx-3"></div>
    </div>
  </div>
</div>

  <a href="" class="btn btn-success btn-rounded mb-4 " data-toggle="modal" data-target="#modalRegisterForm">
    Add user</a>



<table class="table table-hover table-bordered table-strip">
    <thead>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>address</th>
            <th>phone</th>
            <th>email</th>
            <th>Privliges</th>
            <th>gender</th>
            <th>controlls</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once 'Functions/connect.php';
        $select_users="SELECT * FROM users";
        $query=$conn ->query($select_users);
        $id=0;
        foreach($query as $user){?>     
            <tr class="listUsr "id="<?= $user['id']?>">
                <td><?= ++$id?></td>
                <td><?= $user['username']?></td>
                <td><?= $user['address']?></td>
                <td><?= $user['phone']?></td>
                <td><?= $user['email']?></td>
                <td><?= $user['priv']?></td>
                <td><?= $user['gender']?></td>
                <td>
                    <a class="btn btn-info" href="?action=edit&id=<?= $user['id']?>">Edit</a>
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-lg modalUBtn" data-toggle="modal" data-target="#myModal-<?= $user['id']?>" name="<?= $user['username']?>" priv="<?= $user['priv']?>">Delete</button>

                    
                </td>
            </tr>
            <?php } ?>
           
            <!-- Modal -->
                    <div id="" class="modal fade modalTarget" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-titled"></h4>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure you want to delete the <?= $user['priv']?> <?= $user['username']?></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a class="btn btn-info delBtn">Delete</a>
                          </div>
                          <div class="nData "></div>
                        </div>
                      </div>
                    </div>
   </tbody>
</table>