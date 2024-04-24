
<?php
    require_once  'Functions/connect.php';
    $id = $_GET['id'];
    $selectUser ="SELECT * FROM products WHERE id='$id'";
    $query = $conn ->query($selectUser);
    $product =$query -> fetch_assoc();
?>
<form class="col-lg-12" method = "post" action="Functions/proEdit.php?id=<?= $id;?>">
  <div class="form-group">
    <label>name</label>
    <input type="text" class="form-control" placeholder="Enter name" name="name" value="<?= $product['name'];?>">
  </div>
    <div class="form-group">
    <label>Price</label>
    <input type="text" class="form-control" placeholder="Enter price" name="price"  value="<?= $product['price'];?>">
  </div>
   <div class="form-group">
    <label>Sale</label>
    <input type="text" class="form-control"  placeholder="Enter sale" name="sale" value="<?= $product['sale'];?>">
  </div>
   <div class="form-group">
    <label>Description</label>
    <input type="text" class="form-control" placeholder="Enter Describtion" name="description" value="<?= $product['description'];?>">
  </div>
  <div class="form-group">
    <label class="form-label" for="customFile">Product Image</label>
    <input type="file" class="form-control" id="customFile" name="img" />
  </div>

  <div class="form-group">
    <label>category</label>
    <select class="form-control" name="cat_id" >
    <?php
    include'Functions/connect.php';
    $set_cat="SELECT *FROM category";
    $query=$conn ->query($set_cat);
    foreach($query as $category){
        ?>
        <option value="<?=$category['id']?>" <?= $category['id']==$product['cat_id']?'selected':''?>>
        <?= $category['name']?>
        </option>
    <?php } ?>
    </select>
  </div>  
  <div class="form-group">
    <label>Rating</label>
    <select class="form-control" name="rate">
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
<div class="form-group">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
