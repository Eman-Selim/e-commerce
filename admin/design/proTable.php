<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                  <div class="md-form mb-5">
                        <i class="fab fa-product-hunt"></i>
                        <input type="text" id="orangeForm-name" class="form-control validate" name="name">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Product name</label>
                    </div>

                    <div class="md-form mb-4">
                        <i class="fas fa-tags"></i>
                        <input type="text" id="orangeForm-pass" class="form-control validate" name="price">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Product price</label>
                    </div>

                    <div class="md-form mb-5">
                        <i class="fab fa-salesforce"></i>
                            <input type="text" id="orangeForm-name" class="form-control validate" name="sale">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Sale</label>
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-comments"></i>
                            <input type="text" id="orangeForm-name" class="form-control validate" name="description">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Description</label>
                    </div>

                    <div class="md-form mb-5">
                        <i class="fal fa-ballot-check"></i>
                        <label data-error="wrong" data-success="right" for="orangeForm-email">Category</label>
                        <select class="custom-select" name="cat">
                        <?php
                        require_once 'Functions/connect.php';
                        $set_cat="SELECT *FROM category";
                        $query=$conn ->query($set_cat);
                        foreach($query as $category){
                            ?>
                            <option value="<?=$category['id']?>">
                            <?= $category['name']?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="md-form mb-5">
                        <i class="fal fa-ballot-check"></i>
                        <label data-error="wrong" data-success="right" for="orangeForm-email">Rating</label>
                        <select class="custom-select" name="rate">
                            <?php
                            $queryRate=$conn ->query("SELECT *FROM rating");
                            foreach($queryRate as $rate){
                                ?>
                                <option value="<?=$rate['id']?>">
                                <?= $rate['name']?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="md-form mb-5">
                        <form method="post" action="" enctype="multipart/form-data" id="myform">
                            <div class='preview'>
                                <img src="" id="img" width="100" height="100">
                            </div>
                            <div>
                                <input type="file" id="file" name="file" />
                                <input type="button" class="button" value="Upload" id="but_upload">
                            </div>
                        </form>
                    </div> 
            </div>
            
            <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-deep-orange addUser">Add Product</button>
            </div>

            <div class="newData modal-body mx-3"></div>
     </div>
  </div>
</div>

  <a href="" class="btn btn-success btn-rounded mb-4 " data-toggle="modal" data-target="#modalRegisterForm">
    Add Product</a>
   


<table class="table table-hover table-bordered table-info">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
            <th>sale</th>
            <th>img</th>
            <th>rating</th>
            <th>cat_id</th>           
            <th>controlls</th>
        </tr>
    </thead>
    <tbody>
    <?php
    require_once 'Functions/connect.php';
    $select_pro="SELECT * FROM products";
    $query=$conn ->query($select_pro);
    $id=0;
    foreach($query as $product){?>     
        <tr class="listPro "id="<?= $product['id']?>">
            <td><?= ++$id?></td>
            <td><?= $product['name']?></td>
            <td><?= $product['price']?></td>
            <td><?= $product['sale']?></td>
            <td>
            <img style="width: 50px; height: 50px; " src="images/<?= $product['img']?>" id="img" alt="no">
            </td>
            <td> <?= $product['rating']?></td>
            <td><?php
            $cat_id  = $product['cat_id'];
            $select_cat="SELECT name FROM category WHERE id ='$cat_id'";
            $query=$conn -> query($select_cat);
            $category = $query->fetch_assoc();
            echo $category['name'];
            ?></td>
            <td>
                <a class="btn btn-info" href="?action=editPro&id=<?= $product['id']?>">edit</a>
                <!-- Trigger the modal with a button -->

                    <button type="button" class="btn btn-info btn-lg modalBtn" data-toggle="modal" data-target="#myModal-<?= $product['id']?>" name="<?=$product['name']?>">Delete</button>

                    
            </td>
        </tr>
        <?php }?>
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
                    <p></p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a class="btn btn-info delBtn" href="">Delete</a>
                    <div class="nData "></div>
                    </div>
                </div>
                </div>
            </div>
    </tbody>
    
</table>