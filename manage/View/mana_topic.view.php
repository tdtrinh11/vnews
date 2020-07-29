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
                <th width="30%">Tên chủ đề </th>
                <th width="30%">Mô tả</th>
                <th width="30%"><button class="btn btn-primary" data-toggle="modal" data-target="#topicAddModal"><i class="fas fa-plus"></i></button></th>
              </tr>
            </thead>
            <tbody id="classlist_body">
              <?php
                foreach($viewParams['topicList'] as $topicItem){
              ?>
              <tr>
                <td><?php echo $topicItem['topic_id']; ?></td>
                <td><?php echo $topicItem['topic_name']; ?></td>
                <td><?php echo $topicItem['description']; ?></td>
                <td>

                <script type="text/javascript">
                  function addTopicInfo_<?php echo $topicItem['topic_id']; ?>(){
                    document.getElementById('topic_edit_name').setAttribute('value',"<?php echo $topicItem['topic_name']; ?>");
                    document.getElementById('description').setAttribute('value',"<?php echo $topicItem['description']; ?>");
                  }

                  function desc_<?php echo $topicItem['topic_id']; ?>(){
                    document.getElementById('description-remove-topic').innerHTML = "Xóa chủ đề có ID là: <?php echo $topicItem['topic_id']; ?>"
                  }
                </script>
                
                  <button onclick="<?php echo "document.getElementById('topic_edit_id').setAttribute('value',".$topicItem['topic_id']."); addTopicInfo_".$topicItem['topic_id']."();" ?>" class="btn btn-primary" data-toggle="modal" data-target="#topicUpdateModal"><i class="fas fa-edit fsize14" topicid="<?php echo $topicItem['topic_id']; ?>"></i></button>
                  <button onclick="<?php echo "document.getElementById('input-topic-id').setAttribute('value',".$topicItem['topic_id']."); desc_".$topicItem['topic_id']."();" ?>" class="btn btn-warning" data-toggle="modal" data-target="#topicDeleteModal"><i class="fas fa-trash-alt fsize14"  topicid="<?php echo $topicItem['topic_id']; ?>"></i></button>
                </td>
              </tr>
              <?php
              } ?>
            </tbody>
          </table>

          <div class="modal fade" id="topicUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cập nhật chủ đề</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="form-topic" method="POST" action="?action=edittopic">
                    <div class="form-group">
                      <label for="topic_id">Topic ID</label>
                      <input readonly name="topic_id" type="text" class="form-control" style="width: 100%;" id="topic_edit_id">
                    </div>
                    <div class="form-group">
                      <label for="topic_name">Tên chủ đề</label>
                      <input name="topic_name" type="text" class="form-control" style="width: 100%;" id="topic_edit_name">
                    </div>
                    <div class="form-group">
                      <label for="topic_description">Mô tả</label>
                      <input name="description" type="text" class="form-control" style="width: 100%;" id="description">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                  <button class="btn btn-primary" onclick="updateTopicInfo()" data-dismiss="modal">Cập nhật</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="topicAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Thêm chủ đề</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="form-add-topic" method="POST" action="?action=addTopic">
                    <div class="form-group">
                      <label for="topic_name">Tên chủ đề</label>
                      <input name="topic_name" type="text" class="form-control" style="width: 100%;" id="topic_name">
                    </div>
                    <div class="form-group">
                      <label for="topic_description">Mô tả</label>
                      <input name="description" type="text" class="form-control" style="width: 100%;" id="description">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                  <button class="btn btn-primary" onclick="addTopic()" data-dismiss="modal">Thêm</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="topicDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Xóa chủ đề</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="?action=removeTopic" id="remove-topic-form" style="display: none;">
                    <input type="text" name="topic_id" id="input-topic-id">
                  </form>
                  <p id="description-remove-topic">Xóa chủ đề có ID là: </p>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                  <button class="btn btn-primary" onclick="removeTopic()" data-dismiss="modal" href="">Xóa</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <script type="text/javascript">

        function updateTopicInfo(){
          form = document.getElementById("form-topic");
          form.submit();
          // alert("submit form");
        }
        function removeTopic(){
          var form = document.getElementById('remove-topic-form');
          // alert("submit");
          form.submit();
        }
        function addTopic(){
          form = document.getElementById("form-add-topic");
          form.submit();
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
</body>
  <!-- Logout Modal-->
  <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  </div> -->
<!-- </body> -->