<?php if(!defined('__CONTROLLER__')) return; ?>
<?php getTemplate("header", $viewParams); ?>
<?php
  $row = $viewParams['userInfo'];
  $fav = $viewParams['fav'];
  $list_topic = $viewParams['list_topic'];
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
                <h1 class="h4 text-gray-900 mb-4">Thông tin cá nhân</h1>
              </div>
              <div>
                <p>Tên: <?php echo $row['name']; ?></p>
                <p>Email: <?php echo $row['email']; ?></p>
                <p>Ngày sinh: <?php echo $row['birthday']; ?></p>
                <p>Giới tính: <?php if($row['gender'] == 0) echo "Nam";
                                  else echo 'Nữ'; ?></p>
                <p>Trạng thái: <?php if ($row['stt'] == 0) echo "Hoạt động bình thường"; 
                                else echo "Tài khoản bị khóa"; ?></p>
                <div class="fav">
                <p>Quan tâm:
                <?php 
                if($fav == null){
                  echo "Không có chủ đề</p>";
                }
                else{
                  foreach($fav as $f){ 
                    $f = (array)$f;
                    // echo $f['topic_id'];
                    foreach($list_topic as $topic){
                      $topic = (array)$topic;
                      if($topic['topic_id'] == $f['topic_id']){
                        $temp = $topic;
                      }
                    }
                
                     echo '</p><p><b>'.$temp['description'].'</b></p>';
                
                } } ?>
                </div>
                <a href="?link=repair"><button type="submit" class="btn btn-primary btn-user btn-block">
                  Chỉnh sửa >>>
                </button></a>
                               
              </div>
                
              </form>
              <a href="?link=home"><button class="btn btn-primary btn-user btn-block">
                  <<< Về trang chủ
                </button></a>
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

</body>