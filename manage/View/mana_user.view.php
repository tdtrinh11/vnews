<?php getTemplate("header", $viewParams); ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php getTemplate("sidebar"); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php getTemplate("topbar", $viewParams); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <table class="table table-striped">
            <thead>
              <tr>
                <th width="10%">ID</th>
                <th width="20%">Email</th>
                <th width="15%">Họ và tên</th>
                <th width="15%">Giới tính</th>
                <th width="15%">Ngày sinh</th>
                <th width='15%'>Trạng thái</th>
                <th width="10%"></th>
              </tr>
            </thead>
            <tbody id="classlist_body">
            <?php
            foreach($viewParams['userList'] as $userItem){
            ?>  
              <tr>
                <td><?php echo $userItem['acc_id']; ?></td>
                <td><?php echo $userItem['email']; ?></td>
                <td><?php echo $userItem['name']; ?></td>
                <td><?php if($userItem['gender'] == 0) echo 'Nam';
                          else echo 'Nữ'; ?></td>
                <td><?php echo $userItem['birthday']; ?></td>
                <td><?php if($userItem['stt'] == 0) echo 'Bình thường';
                          else echo 'Bị khóa'; ?>
                <td class="icon-button">
                  <button onclick="<?php echo "document.getElementById('input-acc-id').setAttribute('value',".$userItem['acc_id']."); printId('remove',".$userItem['acc_id'].");" ?>" class="btn btn-danger" data-toggle="modal" data-target="#userDeleteModal">
                  <i class="fas fa-trash-alt fsize14"></i></button>
                  
                  <?php if($userItem['stt'] == 0) { ?>
                    <button onclick="<?php echo "document.getElementById('lock-acc-id').setAttribute('value',".$userItem['acc_id']."); printId('lock',".$userItem['acc_id'].");" ?>" class="btn btn-danger" data-toggle="modal" data-target="#lockAccount">
                    <i class="fas fa-<?php echo 'lock'; ?> fsize14"></i></button>
                  <?php } else { ?>
                    <button onclick="<?php echo "document.getElementById('unlock-acc-id').setAttribute('value',".$userItem['acc_id']."); printId('unlock',".$userItem['acc_id'].");" ?>" class="btn btn-danger" data-toggle="modal" data-target="#unlockAccount">
                    <i class="fas fa-<?php echo 'unlock'; ?> fsize14"></i></button>
                  <?php } ?>
                  
                </td>
              </tr>
            <?php
            } ?>
            </tbody>
          </table>


          <div class="modal fade" id="userDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Xóa người dùng</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                
                <!-- form remove account -->
                  <form method="POST" action="?action=removeAccount" id="remove-acc-form" style="display: none;">
                    <input type="text" name="acc_id" id="input-acc-id">
                  </form>

                  <p id='description-remove-account'></p>
                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" onclick="document.getElementById('remove-acc-form').submit()" type="button" data-dismiss="modal">Xóa</button>
                  <button class="btn btn-primary" data-dismiss="modal">Thoát</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="lockAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Khóa người dùng</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                
                <!-- form lock account -->
                  <form method="POST" action="?action=lockAccount" id="lock-acc-form" style="display: none;">
                    <input type="text" name="acc_id" id="lock-acc-id">
                  </form>

                  <p id='description-lock-account'></p>
                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" onclick="document.getElementById('lock-acc-form').submit()" type="button" data-dismiss="modal">Khóa</button>
                  <button class="btn btn-primary" data-dismiss="modal">Thoát</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="unlockAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Mở khóa người dùng</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                
                <!-- form unlock account -->
                  <form method="POST" action="?action=unlockAccount" id="unlock-acc-form" style="display: none;">
                    <input type="text" name="acc_id" id="unlock-acc-id">
                  </form>

                  <p id='description-unlock-account'></p>
                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" onclick="document.getElementById('unlock-acc-form').submit()" type="button" data-dismiss="modal">Mở khóa</button>
                  <button class="btn btn-primary" data-dismiss="modal">Thoát</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <script type="text/javascript">
            function printId(name, id){
                text = 'description-'+ name +'-account';
                if(name == 'remove'){
                  document.getElementById(text).innerHTML = "Xóa người dùng có ID là: " + id;
                }
                else if(name == 'lock'){
                  document.getElementById(text).innerHTML = "Khóa người dùng có ID là: " + id;
                }
                else{
                  document.getElementById(text).innerHTML = "Mở khóa người dùng có ID là: " + id;
                }
            }
      </script>

      <!-- Footer -->
      <?php getTemplate("footer", $viewParams); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>



</body>