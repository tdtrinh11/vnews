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
                <th width="20%">Nguồn tin</th>
                <th width="30%">Link</th>
                <th width="20%">Mô tả</th>
                <th width="20%"><button class="btn btn-primary" data-toggle="modal" data-target="#sourceAddModal"><i class="fas fa-plus"></i></button></th>
              </tr>
            </thead>
            <tbody id="classlist_body">
              <?php
                foreach($viewParams['sourceList'] as $sourceItem){
              ?>
              <tr>
                <td><?php echo $sourceItem['source_id']; ?></td>
                <td><?php echo $sourceItem['source_name']; ?></td>
                <td><?php echo $sourceItem['source']; ?></td>
                <td><?php echo $sourceItem['description']; ?></td>
                <td>
                <script type="text/javascript">
                  function addSourceInfo_<?php echo $sourceItem['source_id']; ?>(){
                    document.getElementById('source_edit_name').setAttribute('value',"<?php echo $sourceItem['source_name']; ?>");
                    document.getElementById('source_edit_source').setAttribute('value',"<?php echo $sourceItem['source']; ?>");
                    document.getElementById('description').setAttribute('value',"<?php echo $sourceItem['description']; ?>");
                  }
                </script>
                  <button onclick="<?php echo "document.getElementById('source_edit_id').setAttribute('value',".$sourceItem['source_id']."); addSourceInfo_".$sourceItem['source_id']."();" ?>"  class="btn btn-primary" data-toggle="modal" data-target="#sourceUpdateModal"><i class="fas fa-edit fsize14"></i></button>
                  <button onclick="<?php echo "document.getElementById('input-remove-id').setAttribute('value',".$sourceItem['source_id'].")" ?>"  class="btn btn-warning" data-toggle="modal" data-target="#sourceDeleteModal"><i class="fas fa-trash-alt fsize14"></i></button>
                </td>
              </tr>
              <?php
              } ?>
            </tbody>
          </table>

          <!-- Form chỉnh sửa nguồn tin báo -->
          <div class="modal fade" id="sourceUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cập nhật nguồn tin</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="form-source" method="POST" action="?action=editsource">
                    <div class="form-group">
                      <label for="source_id">Source ID</label>
                      <input readonly name="source_id" type="text" class="form-control" style="width: 100%;" id="source_edit_id">
                    </div>
                    <div class="form-group">
                      <label for="source_name">Tên nguồn</label>
                      <input name="source_name" type="text" class="form-control" style="width: 100%;" id="source_edit_name">
                    </div>
                    <div class="form-group">
                      <label for="source">Link</label>
                      <input name="source" type="text" class="form-control" style="width: 100%;" id="source_edit_source">
                    </div>
                    <div class="form-group">
                      <label for="source_description">Mô tả</label>
                      <input name="description" type="text" class="form-control" style="width: 100%;" id="description">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                  <button class="btn btn-primary" onclick="updateSourceInfo()" data-dismiss="modal">Cập nhật</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Form thêm nguồn tin báo -->
          <div class="modal fade" id="sourceAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Thêm nguồn tin</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="form-add-source" method="POST" action="?action=addSource">
                    <div class="form-group">
                      <label for="source_name">Tên nguồn</label>
                      <input name="source_name" type="text" class="form-control" style="width: 100%;" id="source_name">
                    </div>
                    <div class="form-group">
                      <label for="source">Link</label>
                      <input name="source" type="text" class="form-control" style="width: 100%;" id="source">
                    </div>
                    <div class="form-group">
                      <label for="source_description">Mô tả</label>
                      <input name="description" type="text" class="form-control" style="width: 100%;" id="description">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                  <button class="btn btn-primary" onclick="addSource()" data-dismiss="modal">Thêm</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Form xóa nguồn tin báo -->
          <div class="modal fade" id="sourceDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Xóa nguồn tin</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="?action=removeSource" id="remove-source-form" style="display: none;">
                    <input type="text" name="source_id" id="input-remove-id">
                  </form>
                  <p>Xóa nguồn tin.</p>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                  <button class="btn btn-primary" onclick="removeSource()" data-dismiss="modal" href="">Xóa</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <script type="text/javascript">
        // function setValue(){
        //   var id = event.target.getAttribute('sourceid');
        //   var input_id = document.getElementById('source_edit_id');
        //   input_id.setAttribute('value', id);
        // }

        function updateSourceInfo(){
          form = document.getElementById("form-source");
          form.submit();
          // alert("submit form");
        }
        function removeSource(){
          var form = document.getElementById('remove-source-form');
          form.submit();

        }
        function addSource(){
          form = document.getElementById("form-add-source");
          form.submit();
        }
      </script>

      <?php getTemplate("footer", $viewParams); ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
 
  <div class="modal fade" id="device_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cập nhật nguồn tin</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST">
                <div class="form-group">
                  <label for="source_id">Source ID</label>
                  <input type="text" class="form-control" style="width: 100%;" disabled="" id="source_edit_id">
                </div>
                <div class="form-group">
                  <label for="device_name">Tên nguồn tin</label>
                  <input type="text" class="form-control" style="width: 100%;" id="source_edit_name">
                </div>
                <div class="form-group">
                  <label for="source">Link</label>
                  <input type="text" class="form-control" style="width: 100%;" id="source_edit_source">
                </div>
                <div class="form-group">
                  <label for="description">Mô tả</label>
                  <input type="text" class="form-control" style="width: 100%;" id="source_edit_description">
                </div>
                <div class="form-group" id="param_list">
                  
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" onclick="updateSourceInfo()" data-dismiss="modal">Cập nhật</button>
            </div>
          </div>
        </div>
      </div>
<?php getTemplate("footer", $viewParams); ?>
