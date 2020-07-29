<?php if(!defined('__CONTROLLER__')) return; ?>
<?php getTemplate("header", $viewParams); ?>
<?php
    $row = $viewParams['userInfo'];
    $fav = $viewParams['fav'];
?>
<body class="bg-gradient-primary">

  <div class="container" style="width: 555px;">
    <div class="row justify-content-center">

    <div class="col-xl-5 col-lg-12 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Sửa thông tin người dùng</h1>
              </div>
              <form class="user" method="POST" action="?action=repair">
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" value="<?php echo $row['email']; ?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputName" name="name" value="<?php echo $row['name']; ?>">
                </div>
                <div class="form-group">
                  <input type="birthday" class="form-control form-control-user" id="exampleInputBirthday" name="birthday" value="<?php echo $row['birthday']; ?>">
                </div>
                <div class="form-group">
                    <label>Giới tính:</label>
                        <?php if($row['gender'] == 0){ ?>
                          <label class="gender">Nam
                            <input value='0' type="radio" checked="checked" name="gender">
                            <span class="checkmark"></span>
                        </label>
                        <label class="gender">Nữ
                            <input value='1' type="radio" name="gender">
                            <span class="checkmark"></span>
                        </label>
                    <?php }
                    else { ?>
                        <label class="gender">Nam
                            <input type="radio"name="gender">
                            <span class="checkmark"></span>
                        </label>
                        <label class="gender">Nữ
                            <input value='0' type="radio" checked="checked"  name="gender">
                            <span value= '1' class="checkmark"></span>
                        </label>
                    <?php } ?>
                </div>
                <div class="form-group">
                  <label>Quan tâm:</label>
                  <!-- <input type="care" class="form-control form-control-user" id="exampleInputCare" placeholder="Quan tâm"> -->
                  
                <div class="row">
                  
                  <div class="category col-lg-6">
                    <label><input id="care-0" type="checkbox" name="care[]" value="0">Chính trị - Xã hội</label>
                    <label><input id="care-1"  type="checkbox" name="care[]" value="1">Đời sống</label>
                    <label><input id="care-2"  type="checkbox" name="care[]" value="2">Giáo dục</label>
                    <label><input id="care-3"  type="checkbox" name="care[]" value="3">Kinh doanh</label>
                    <label><input id="care-4"  type="checkbox" name="care[]" value="4">Khoa học công nghệ</label>
                  </div>
                  <div class="category col-lg-6">
                    <label><input id="care-5"  type="checkbox" name="care[]" value="5">Pháp luật</label>
                    <label><input id="care-6"  type="checkbox" name="care[]" value="6">Sức khỏe</label>
                    <label><input id="care-7"  type="checkbox" name="care[]" value="7">Thể thao</label>
                    <label><input id="care-8"  type="checkbox" name="care[]" value="8">Văn hóa</label>
                    <label><input id="care-9"  type="checkbox" name="care[]" value="9">Xe cộ</label>
                  </div>
                  
                </div>
                <div class="form-group row">
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Update
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
<script type="text/javascript">
  function addCheck(id){
      var input = document.getElementById('care-'+id);
      input.setAttribute("checked", "checked");
  }
</script>
<?php 
  if($fav != null){
    foreach($fav as $f){
      $f = (array)$f;
      echo "<script>addCheck(".$f['topic_id'].")</script>";
    }
  }

?>


</body>