<?php if(!defined('__CONTROLLER__')) return; ?>
<?php getTemplate("header", $viewParams); ?>
<link rel="stylesheet" type="text/css" href="assets/css/posts.css">
<body>
<?php getTemplate("topbar", $viewParams); ?>
<?php 'include function.php' ?>
</section>

<section id="browse-news">
	<div class="latest-post-wrap">
        <?php $topic = $viewParams['topic']; 
            $topic = (array)$topic[0];
        ?>
    <div class="cat-title"><h2>Chủ đề:  <?php echo $topic['description']; ?></h2></div>
		

        <?php
            $list_posts = $viewParams['listPosts'];
            $sourcelist = $viewParams['listSource'];
            // print_r($list_posts);
            foreach($list_posts as $p){
                $post = (array)$p;
                foreach($sourcelist as $source){
                    $source = (array)$source;
                    if($source['source_id'] == $post['source_id']){
                      $newsSource = $source;
                    }
                }
        ?>

			<div class="row single-latest-post align-items-center">
			<div class="col-lg-1 col-md-1 col-sm-12"></div>
			<div class="col-lg-3 col-md-3 col-sm-12 post-left">
				<div class="feature-img relative">
				<a href="?link=posts" onclick="myFunc()">
					<div nid="<?php echo $post['news_id']; ?>" class="overlay overlay-bg"></div>
                    <img  class="img-fluid" src="
                    <?php 
                    if($post['img'] == ''){
                        echo "./assets/css/images/no-img.jpg";
                    }
                    else{
                        echo $post['img']; } ?>" >
                    
				</a>
				</div>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-12 post-right">
				<a href="?link=posts" onclick="myFunc()">
					<h4 nid="<?php echo $post['news_id']; ?>">
					<?php echo $post['title']; ?>
					</h4>
				</a>
				<ul class="meta browse">

                <?php
                    //if($viewParams['loggedIn'] == true){
                ?>
					<!-- <li><a href="#"><svg class="bi bi-download" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8z"/><path fill-rule="evenodd" d="M5 7.5a.5.5 0 0 1 .707 0L8 9.793 10.293 7.5a.5.5 0 1 1 .707.707l-2.646 2.647a.5.5 0 0 1-.708 0L5 8.207A.5.5 0 0 1 5 7.5z"/><path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 1z"/></svg> 
					<p>Save</p></a>
					</li> -->

                <?php //} ?>

					<li><a target="_blank" href="<?php echo $newsSource['source']; ?>"><svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg> 
					<p><?php echo $newsSource['description']; ?></p></a>
					</li>
					<!-- <li><a href="#"><svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg> 
					<p>Thế giới</p></a>
					</li> -->
				</ul>
				<p class="sub-description"><?php echo $post['summary']; ?></p>
			</div>
            </div>
            
		<?php } ?>
		
		<!-- <div class="button-refresh-area">
			<button type="button" class="btn">Xem thêm</button>
		</div> -->
	</div>
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