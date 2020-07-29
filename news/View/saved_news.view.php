<?php if(!defined('__CONTROLLER__')) return; ?>
<?php getTemplate("header", $viewParams); ?>
<link rel="stylesheet" type="text/css" href="assets/css/posts.css">
<body>
<?php getTemplate("topbar", $viewParams); ?>
</section>

<!-- code -->

<section class="saved-news">
    <div class="row">
        <div class="title-area">
            <div class="sn-title col-lg-6">
                <h2>Tin báo đã lưu</h2>
            </div>
            <div class="search-sn col-lg-6">

                    <form id="form-search-sn" class="search-form" method="POST" action="?link=saved_news">  
                        <input id="input-search-sn" type="text" name="search_sn" class="" placeholder="Tìm kiếm tin đã lưu">
                        <!-- <button type="submit" style="height: 36px; width: 36px;">
                            <i class="fas fa-search"></i>
                        </button> -->
                    </form>

            </div>
            
        </div>
    </div>
    <div class="border-bottom">
        <hr>
    </div>
    
        <?php $saved_news = $viewParams['savedNews']; 
            if($saved_news == null){
                echo "<h4 class='data-null'> ".$viewParams['stt']." </h4>"; 
            }
            else {

        ?>

        <?php
            $list_post = $viewParams['list_post'];
            $list_source = $viewParams['listSource'];

            for($i=0;$i<count($saved_news);$i++){ 
                $sn = (array)$saved_news[$i];
                $post = (array)$list_post[$i];

                foreach($list_source as $ls){
                    $ls = (array)$ls;
                    if($post['source_id'] == $ls['source_id']){
                        $newsSource = $ls;
                        break;
                    }
                }

        ?>
        <div class="div-saved-news col-lg-4 col-md-4 col-sm-12">
            <div class="img">
                <a href="?link=posts" onclick="myFunc()">
                    <img src="<?php echo $post['img']; ?>" nid="<?php echo $post['news_id'] ?>">
		        	<!-- <div class="mask rgba-white-slight"></div> -->
		    	</a>
            </div>
            <div class="saved-news-detail">
                <a href="?link=posts">
                    <h3 nid="<?php echo $post['news_id']?>" onclick="myFunc()" 
                     class="dark-grey-text pb-2 font-weight-bold">
                        <?php echo $post['title']; ?>
                    </h3>
                </a>
                <ul class="post bar">
                    <li>
                    <form id="savednews-<?php echo $sn['id']; ?>" class="form-none" method="POST" action="?action=remove_saved_news">
					    <input id="" name="id" value="<?php echo $sn['id']; ?>">
				    </form>
                    <a onclick="document.getElementById('savednews-<?php echo $sn['id']; ?>').submit(); alert('Xóa tin thành công');" href="#"><svg class="bi bi-trash" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                    Xóa</a>
                    </li>
                    <li><a target="_blank" href="<?php echo $newsSource['source'] ?>">
                        <svg class="bi bi-house" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg> 
                        <?php echo $newsSource['description']; ?>
                    </a></li>
                </ul>
	            <!-- <hr> -->
                
                <!-- <p class="summary dark-grey-text mt-4 text-justify"></p> -->
                
            </div>
        </div>
            <?php } } ?>

        <!-- <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="img">
                <a href="#">
		        	<img src="assets/css/images/CTXH.jpg" alt="">
		        	<div class="mask rgba-white-slight"></div>
		    	</a>
            </div>
            <div class="saved-news-detail">
                <a href="#">
                    <h3 class="dark-grey-text pb-2 font-weight-bold">
                        <strong>TP HCM dự kiến sáp nhập ba quận và 19 phường</strong>
                    </h3>
                </a>
                <ul class="post bar">
                    <li>
                    <a href="#"><svg class="bi bi-trash" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                    Xóa</a>
                    </li>
                    <li><a href="#">
                    <svg class="bi bi-house" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg> 
                    VNExpress</a>
                    </li>
                    <li><a href="#"><svg class="bi bi-pencil-square" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg> 
                    Chính trị xã hội</a>
                    </li>
                    <li><a href="#"><svg class="bi bi-pencil-square" width="0.8em" height="0.8em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg> 
                    Đời sống</a>
                    </li>
                </ul>
	            <hr>
                
                <p class="summary dark-grey-text mt-4 text-justify">Phương án sắp xếp các đơn vị hành chính cấp huyện, xã lần này được hoàn chỉnh trên cơ sở nội dung buổi làm việc của Thủ tướng và các bộ ngành với TP HCM hôm 8/5.</p>

                <ul class="keyword">
                    <li><p> Từ khóa: </p></li>
                    <li><a href="#">TP HCM</a></li>
                    <li><a href="#">Quan</a></li>
                    <li><a href="#">huyen</a></li>
                    <li><a href="#">Sat nhap</a></li>
                </ul>
                
            </div>
        </div> -->


</section>
<script type="text/javascript">
    // document.getElementByClass("link-posts").addEventListener("click", myFunc);
    
    function myFunc(){
      // alert(event.target.getAttribute("source"));
      // var link = event.target.getAttribute("link");
      // var id = event.target.getAttribute("source");
      // var d = new Date();
      // d.setTime(d.getTime() + (10 * 60 * 1000));
      // document.cookie = 'link=' + link + '; expires=' + d.toGMTString();
      // document.cookie = 'id=' + id + '; expires=' + d.toGMTString();

      var nid = event.target.getAttribute('nid');
      var d = new Date();
      d.setTime(d.getTime() + (10 * 60 * 1000));
      document.cookie = 'nid=' + nid + '; expires=' + d.toGMTString();

      // document.getElementById('input-news-id').setAttribute('value', nid);
      // document.getElementById('send-post-id').submit();
    }
  </script>
<?php getTemplate("footer"); ?>
</html>