<?php if(!defined('__CONTROLLER__')) return; ?>
<?php getTemplate("header", $viewParams); ?>
<body>
<?php getTemplate("topbar", $viewParams); ?>
  </section>

<!-- <form style="display:none;" id="send-post-id" method="POST" action="?link=posts">
  <input id="input-news-id" name="news_id" value="">
</form> -->

  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">

          <?php 
          $toppost = $viewParams['topPost'];
          $sourcelist = $viewParams['sourceList'];

          foreach($toppost as $post){
            $post = (array)$post;
            foreach($sourcelist as $source){
              $source = (array)$source;
              if($source['source_id'] == $post['source_id']){
                $newsSource = $source;
              }
            }
          ?>
          
          <div class="single_iteam">
            
            <a href="?link=posts" onclick="myFunc()"> 
              <img src="<?php echo $post['img'];?>" nid="<?php echo $post['news_id']; ?>">
            </a>
            <div class="slider_article">
              <h2><a onclick="myFunc()" class="slider_tittle" href="?link=posts" nid="<?php echo $post['news_id']; ?>">
                <?php echo $post['title'] ?>
              </a></h2>
              <ul class="meta bar">
                <li>
                  <a target="_blank" href="<?php echo $newsSource['source'] ?>"><svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg> 
                    <?php echo $newsSource['description'];?>
                  </a>
                </li>
              </ul>
              <p class="description"><?php echo $post['summary'] ?></p>
            </div>
          </div>

          <?php } ?>

        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Tin nổi bật</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
            
            <?php 
              $subtop = $viewParams['subTop'];
              shuffle($subtop);
              // print_r($subtop);
              foreach($subtop as $sub){ 
                $sub = (array)$sub;
                foreach($sourcelist as $source){
                  $source = (array)$source;
                  if($source['source_id'] == $sub['source_id']){
                    $newsSource = $source;
                  }
                }
            ?>

              <li>
                <div class="media">
                  
                  <a onclick="myFunc()" href="?link=posts" class="media-left"> 
                    <img src="<?php echo $sub['img'] ?>" nid="<?php echo $post['news_id']; ?>"> 
                  </a>
                  <div class="media-body">
                  <p class="catg_title" ><a onclick="myFunc()" href="?link=posts" nid="<?php echo $post['news_id']; ?>">
                      <?php echo $sub['title']; ?></a></p>

                    <a target="_blank" class="source" href="<?php echo $newsSource['source'] ?>">
                        <svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg> 
                        <?php echo $newsSource['description'];?>
                    </a>
                  </div>
                </div>
              </li>

            <?php } ?>

            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          
          <?php 
            $list_leftcontent = $viewParams['listLeftContent'];
            foreach(array_keys($list_leftcontent) as $key){
              $topic = $list_leftcontent[$key];
              
          ?>

            <div class="news col-lg-6 col-md-6 col-sm-6">
                <div class="single_post_content">
                  <h2><span><?php echo $key; ?> </span></h2>

                  <?php  $t = (array)$topic[0]; 
                        foreach($sourcelist as $source){
                          $source = (array)$source;
                          if($source['source_id'] == $t['source_id']){
                            $newsSource = $source;
                          }
                        } 
                  ?>

                  <ul class="business_catgnav wow fadeInDown">
                    <li>
                      <figure class="bsbig_fig">                     
                        <a href="?link=posts" onclick="myFunc()" class="featured_img"> 
                          <img alt=""src="<?php if($t['img'] == null) echo "assets/css/images/no-img.jpg";
                                                else echo $t['img']?>" > 
                          <span nid="<?php echo $post['news_id']; ?>" class="overlay"></span>
                        </a>
                        <figcaption>
                          <a href="?link=posts" nid="<?php echo $post['news_id']; ?>"
                          onclick="myFunc()"><?php echo $t['title']; ?></a>
                        </figcaption>
                        <a target="_blank" class="source" href="<?php echo $newsSource['source'] ?>">
                          <svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg> 
                          <?php echo $newsSource['description'];?>
                        </a>
                        <p class="description"><?php echo $t['summary']; ?></p>
                      </figure>
                    </li>
                  </ul>
                  <ul class="spost_nav">
                    <li>
                      <?php $t = (array)$topic[1];
                            foreach($sourcelist as $source){
                              $source = (array)$source;
                              if($source['source_id'] == $t['source_id']){
                                $newsSource = $source;
                              }
                            } 
                      ?>

                      <div class="media wow fadeInDown"> 
                        <!-- <a href="?link=posts" class="media-left"><img alt="" src="images/post_img1.jpg"> </a> -->
                        <div class="media-body">
                          <a class="link-source" nid="<?php echo $post['news_id']; ?>"
                           href="?link=posts" onclick="myFunc()"><?php echo $t['title']; ?></a><br>
                          <a class="source" href="<?php echo $newsSource['source'] ?>">
                            <svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg> 
                            <?php echo $newsSource['description'];?>
                          </a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <?php $t = (array)$topic[2];
                            foreach($sourcelist as $source){
                              $source = (array)$source;
                              if($source['source_id'] == $t['source_id']){
                                $newsSource = $source;
                              }
                            } 
                      ?>

                      <div class="media wow fadeInDown"> 
                        <!-- <a href="?link=posts" class="media-left"><img alt="" src="images/post_img1.jpg"> </a> -->
                        <div class="media-body">
                          <a class="link-source" nid="<?php echo $post['news_id']; ?>"
                           href="?link=posts" onclick="myFunc()"><?php echo $t['title']; ?></a>
                           <br>
                           <a class="source" href="<?php echo $newsSource['source'] ?>">
                              <svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg> 
                              <?php echo $newsSource['description'];?>
                            </a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
            </div>

            <?php } ?>
              
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">

		<?php if($viewParams['loggedIn'] === true){ 
          $savednews = $viewParams['savedNews'];
          $list_saved = $viewParams['list_saved'];
    ?>

          <div class="single_sidebar">
            <h2><a href="?link=saved_news"><span>Đã lưu</span></a></h2>
            <ul class="spost_nav">
              <?php for($i=0;$i<count($savednews);$i++){
                  $sn = (array)$savednews[$i];
                  $sp = (array)$list_saved[$i]; 
              ?>
              <li>
                <div class="media wow fadeInDown"> 
                  <a onclick="myFunc()" href="?link=posts" class="media-left">
                    <img alt="" src="<?php echo $sp['img']; ?>" nid="<?php echo $sp['news_id']; ?>">
                  </a>
                  <div class="media-body"> 
                    <a nid="<?php echo $sp['news_id']; ?>" onclick="myFunc()" href="?link=posts" class="catg_title"><?php echo $sp['title']; ?></a> </div>
                </div>
              </li>
              <?php  } ?>
            </ul>
		  </div>
		<?php } else {echo ' ';} ?>
    
        </aside>
      </div>
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