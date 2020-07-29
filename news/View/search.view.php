<?php if(!defined('__CONTROLLER__')) return; ?>
<?php getTemplate("header", $viewParams); ?>
<link rel="stylesheet" type="text/css" href="assets/css/posts.css">
<body>
<?php getTemplate("topbar", $viewParams); ?>
<?php 'include function.php' ?>
</section>
<?php

	$kw = $viewParams['keyword'];
	if($kw == ''){
		$kw = $_COOKIE["keyword"];
	}
	$list_source = $viewParams['listSource'];
	// $list_posts = getNewsByKw($kw);
	$list_posts = $viewParams['list_post'];
?>
<!-- code -->
<section id="browse-news">
	<div class="latest-post-wrap">
		<div class="cat-title"><h2>Từ khóa: <?php echo $kw; ?></h2></div>
		
			<?php

			if($list_posts == null){ echo "<h4 class='data-null'> Không có dữ liệu </h4>"; }
			else{
				foreach($list_posts as $post){
					$post = (array)$post;
					foreach($list_source as $ls){
						$ls = (array)$ls;
						if($ls['source_id'] = $post['source_id']) break;
					}
			?>

			<div class="row single-latest-post align-items-center">
			<div class="col-lg-1 col-md-1 col-sm-12"></div>
			<div class="col-lg-3 col-md-3 col-sm-12 post-left">
				<div class="feature-img relative">
				<a href="?link=posts" onclick="myFunc()">
					<div nid="<?php echo $post['news_id']; ?>" class="overlay overlay-bg"></div>
					<img  class="img-fluid" src="<?php if($post['img'] != null){echo $post['img'];} else{ echo './assets/css/images/no-img.jpg'; } ?>" alt="">
				</a>
				</div>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-12 post-right">
				<a href="?link=posts" onclick="myFunc()">
					<h4 nid="<?php echo $post['news_id']; ?>">
					<?php echo $post['title']; ?>
					</h4>
				</a>
				<ul class="meta browse">
					
					<li><a target='_blank' href="<?php echo $ls['source']; ?>"><svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg> 
					<p><?php echo $ls['description']; ?></p></a>
					</li>
					
				</ul>
				<p class="description-full"><?php echo $post['summary']; ?></p>
			</div>
			</div>
				<?php } } ?>

		
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
</html>