<?php if(!defined('__CONTROLLER__')) return; ?>
<?php getTemplate("header", $viewParams); ?>

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
                <h1 class="h4 text-gray-900 mb-4">Đăng ký tài khoản</h1>
              </div>
              <div class="text-center">
                <a class="small" href="?link=home"><<< Quay về trang chủ</a>
              </div>
              <br>
              <form class="user" method="POST" action="?action=register">
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputName" name="name" placeholder="Họ tên">
                </div>
                <div class="form-group">
                  <input type="birthday" class="form-control form-control-user" id="exampleInputBirthday" name="birthday" placeholder="Ngày sinh">
                </div>
                <div class="form-group">
                    <label>Giới tính:</label>
                    <label class="gender">Nam
                        <input type="radio" value="female" checked="checked" name="gender">
                        <span class="checkmark"></span>
                    </label>
                    <label class="gender">Nữ
                        <input type="radio" value="male" name="gender">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="form-group">
                  <label>Quan tâm:</label>
                  <!-- <input type="care" class="form-control form-control-user" id="exampleInputCare" placeholder="Quan tâm"> -->
                  
                <div class="row">
                  
                  <div class="category col-lg-6">
                    <label><input type="checkbox" name="care[]" value="0">Chính trị - Xã hội</label>
                    <label><input type="checkbox" name="care[]" value="1">Đời sống</label>
                    <label><input type="checkbox" name="care[]" value="2">Giáo dục</label>
                    <label><input type="checkbox" name="care[]" value="3">Kinh doanh</label>
                    <label><input type="checkbox" name="care[]" value="4">Khoa học công nghệ</label>
                  </div>
                  <div class="category col-lg-6">
                    <label><input type="checkbox" name="care[]" value="5">Pháp luật</label>
                    <label><input type="checkbox" name="care[]" value="6">Sức khỏe</label>
                    <label><input type="checkbox" name="care[]" value="7">Thể thao</label>
                    <label><input type="checkbox" name="care[]" value="8">Văn hóa</label>
                    <label><input type="checkbox" name="care[]" value="9">Xe cộ</label>
                  </div>
                  
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Mật khẩu">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="password1" placeholder="Nhập lại mật khẩu">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Đăng ký
                </button>
              </form>
              <div class="text-center">
                <a class="small" href="?link=login">Bạn đã có tài khoản? Đăng nhập ngay >>></a>
              </div>
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