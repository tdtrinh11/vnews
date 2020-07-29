<?php if(!defined('__CONTROLLER__')) return; ?>
<?php getTemplate("header", $viewParams); ?>
<link rel="stylesheet" type="text/css" href="assets/css/posts.css">
<body>
<?php getTemplate("topbar", $viewParams); ?>
<?php 'include function.php' ?>
</section>

<?php 

	// if(isset($_COOKIE['link'])){
	// 	$link = $_COOKIE['link'];
	// }
	// else{
	// 	echo 'khong co du lieu';
	// }

	// if(isset($_COOKIE['id'])){
	// 	$id = $_COOKIE['id'];
	// }
	// else{
	// 	echo 'khong co du lieu';
	// }

	$post = (array)$viewParams['post'][0];
	$link = $post['source'];
	$id = $post['source_id'];

	$list_source = $viewParams['list_source'];
	foreach($list_source as $source){
		$source = (array)$source;
		if($source['source_id'] == $post['source_id']){
			$temp = $source;
			break;
		}
	}

	$list_topic = $viewParams['list_topic'];
	foreach($list_topic as $topic){
		$topic = (array)$topic;
		if($topic['topic_id'] == $post['topic_id']){
			$topic1 = $topic;
		}
	}

	

	// $content = getContent($id, $link);
	// $keyword = runTextRank("'".$content['text']."'");
	$keyword = $viewParams['keyword'];
	

	// $vec = vectorizer("'".$post['text']."'");
?>

<!-- code -->
<section id="post-detail">
	<div class="row">
		<div class="col-sm-12 col-md-5 col-xl-5 col-lg-5 mb-4">
			<div class="post-detail-left">
		        <a target="_blank" href="<?php echo $link; ?>">
		        	<img src="<?php if($post['img'] != null){echo $post['img'];} else{ echo './assets/css/images/no-img.jpg'; } ?>" alt="">
		        	<div class="mask rgba-white-slight"></div>
		    	</a>
		    </div>
		</div>
		<div class="col-sm-12 col-md-7 col-xl-7 col-lg-7 mb-4">
			<a target="_blank" href="<?php echo $link; ?>">
				<h3 class="title dark-grey-text pb-2 font-weight-bold">
	            	<strong><?php echo $post['title']; ?></strong>
	        	</h3>
	    	</a>
	        <ul class="post bar">
				<li>
				<form id="save-form" class="form-none" method="POST" action="?action=save">
					<input id="" name="nid" value="<?php echo $post['news_id']; ?>">
				</form>
                  <a href="#" onclick="document.getElementById('save-form').submit(); alert('Lưu tin báo thành công');" ><svg class="bi bi-download" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8z"/><path fill-rule="evenodd" d="M5 7.5a.5.5 0 0 1 .707 0L8 9.793 10.293 7.5a.5.5 0 1 1 .707.707l-2.646 2.647a.5.5 0 0 1-.708 0L5 8.207A.5.5 0 0 1 5 7.5z"/><path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 1z"/></svg> 
                	<p>Save</p></a>
                </li>
                <li><a target="_blank" href="<?php echo $temp['source']; ?>">
				<svg class="bi bi-house" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg> 
                <p><?php echo $temp['description']; ?></p></a>
				
				</li>
				<li><a onclick="submitBrowseForm()" class="category" href="#">
						<svg category="<?php echo $topic1['topic_id']; ?>" class="bi bi-pencil-square" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg> 
						<p category="<?php echo $topic1['topic_id']; ?>" id="main-category"><?php echo $topic1['description']; ?></p>
					</a>
                </li>

				<?php 
					if($post['sub_cid'] != null){
						foreach($list_topic as $topic){
							$topic = (array)$topic;
							if($topic['topic_id'] == $post['sub_cid']){
								$topic2 = $topic;
							}
						}
				?>
					<li><a onclick="submitBrowseForm()" href="#">
						<svg category="<?php echo $topic1['topic_id']; ?>" class="bi bi-pencil-square" width="0.8em" height="0.8em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg> 
						<p id="sub-category" category="<?php echo $topic2['topic_id']; ?>"></p></a>
					</li>
				<?php } ?>
                
              </ul>
	        <hr>

	        <p class="summary dark-grey-text mt-4 text-justify">
				<?php echo $post['summary']; ?>
			</p>

			<ul class="keyword">

			<?php foreach($keyword as $kw){ ?>
				<li><a onclick="searchByKw()" href="#" value="<?php echo $kw; ?>"> <?php echo $kw; ?> </a></li>
			<?php } ?>		


			</ul>
			

		</div>
	</div>
	
</section>


<section id="recommend">

	<div class="cat-title"><h2>Có liên quan: </h2></div>

	<?php 
	if($keyword == null){
		echo "<h4 class='data-null'> Không có dữ liệu </h4>";
	}
	else{
		$list_posts = $viewParams['list_post'];
		if($list_posts == null){
			echo "<h4 class='data-null'> Không có dữ liệu </h4>";
		}
		else{	
			foreach($list_posts as $p){ 
				$p = (array)$p;
				foreach($list_source as $source){
					$source = (array)$source;
					if($source['source_id'] == $p['source_id']){
						$temp = $source;
						break;
					}
				}
	?>

	<div class="row single-latest-post align-items-center">
	<div class="col-lg-1 col-md-1 col-sm-12"></div>
	<div class="col-lg-3 col-md-3 col-sm-12 post-left">
		<div class="feature-img relative">
		<a href="?link=posts" onclick="myFunc()">
			<div nid="<?php echo $p['news_id']; ?>" class="overlay overlay-bg"></div>
			<img  class="img-fluid" src="<?php if($p['img'] != null){echo $p['img'];} else{ echo './assets/css/images/no-img.jpg'; } ?>" alt="">
		</a>
		</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-12 post-right">
		<a href="?link=posts" onclick="myFunc()">
			<h4 nid="<?php echo $p['news_id']; ?>">
			<?php echo $p['title']; ?>
			</h4>
		</a>
		<ul class="meta browse">
			<!-- <li><a href="#"><svg class="bi bi-download" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8z"/><path fill-rule="evenodd" d="M5 7.5a.5.5 0 0 1 .707 0L8 9.793 10.293 7.5a.5.5 0 1 1 .707.707l-2.646 2.647a.5.5 0 0 1-.708 0L5 8.207A.5.5 0 0 1 5 7.5z"/><path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 1z"/></svg> 
			<p>Save</p></a>
			</li> -->
			<li><a target="_blank" href="<?php echo $temp['source']; ?>"><svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg> 
			<p><?php echo $temp['description']; ?></p></a>
			</li>
			<!-- <li><a href="#"><svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg> 
			<p>Thế giới</p></a>
			</li> -->
		</ul>
		<p class="sub-description"><?php echo $p['summary']; ?></p>
	</div>
	</div>

<?php } } } ?>

</section>

<?php //$vec = vectorizer("'".$post['text']."'"); ?>
<!-- <script src="assets/js/tfjs.js"></script> -->
<!-- <script src="assets/js/posts.js"></script> -->
<?php //echo "<script> re = predict(".$vec.");</script>"; ?>	
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

	function searchByKw(){
		search_form = document.getElementById('form-search');
		kw = event.target.getAttribute('value');
		document.getElementById('input-search').setAttribute('value', kw);
		search_form.submit();
	}
  </script>

<?php getTemplate("footer"); ?>

</html>