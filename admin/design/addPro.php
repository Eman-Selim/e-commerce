

<form class="col-lg-12" method = "post" action="Functions/proAdd.php" enctype="multipart/form-data">
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" placeholder="Enter name" name="name">
  </div>
  <div class="form-group">
    <label>Price</label>
    <input type="number" class="form-control" placeholder="Enter price" name="price">
  </div>
   <div class="form-group">
    <label>Sale</label>
    <input type="number" class="form-control"  placeholder="Enter sale" name="sale">
  </div>
   <div class="form-group">
    <label>description</label>
    <input type="text" class="form-control" placeholder="Enter description" name="description">
  </div>

  <div class="form-group">
    <label class="form-label" for="customFile">Product Image</label>
    <input type="file" class="form-control" id="customFile" name="img" />
  </div>

  <div class="form-group">
    <label>category</label>
    <select class="form-control" name="cat">
    <?php
    require_once 'Functions/connect.php';
    $set_cat="SELECT *FROM category";
    $query=$conn ->query($set_cat);
    foreach($query as $category){
        ?>
        <option value="<?=$category['id']?>">
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