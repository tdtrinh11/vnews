<?php
include 'simple_html_dom.php';

function setTimeZone(){
    date_default_timezone_set('Asia/Ho_Chi_Minh');
}

function sessionInit(){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function getView($view, $data = null){
    $viewParams = $data;
    require_once "View/$view.view.php";
}

function getTemplate($template, $data = null){
    $viewParams = $data;
    require_once "View/Template/$template.template.php";
}

function notice($mess){
    echo "<script>alert(\"$mess\");</script>";
}

function nextpage($link){
    ob_start();
    header("location: $link");
    ob_flush();
}

function debug($var){
    //...
}

function _hash($data){
    return sha1(sha1($data));
}

function randString($length){
    $chars="abcdefghijklmnopqrstuvwxyz0123456789";
    $str="";
    for($i = 0; $i < $length; $i++)
        $str .= $chars[rand(0,35)];
    return $str;
}

function randInt($length){
    $chars="0123456789";
    $str="";
    for($i = 0; $i < $length; $i++)
        $str .= $chars[rand(0,9)];
    return $str;
}

function getCurDate(){
    setTimeZone();
    return date("Y-m-d");
}

function getCurTime(){
    setTimeZone();
    return date("Y-m-d H:i:s");
}

function getTopPosts(){

    $list_url = array(
        "https://vnexpress.net",
        "https://dantri.com.vn",
        "https://vietnamnet.vn"
    );

    $list_toppost=array();

    // vnexpress
    $html = file_get_html($list_url[0]);
    foreach($html->find('div[class=col-left-top]') as $article){
        foreach($article->find('article') as $toppost){
            
            // img
            $picture = $toppost->find('picture img');
            if($picture == null){
                $picture = $toppost->find('video');
                foreach($picture as $p){
                    $img = $p->getAttribute('poster');
                }
            }
            else{
                foreach($picture as $p){
                    $img = $p->getAttribute('src');
                    if(strstr($img, 'data:image')){
                        $img = $p->getAttribute('data-src');
                    }
                }
            }

            // title va href
            $temp = $toppost->find('h3.title-news a');
            $title = $temp[0]->getAttribute('title');
            $href = $temp[0]->getAttribute('href');

            // description
            $des = $toppost->find('p.description')[0]->plaintext;
            // echo $des;
        }
    }
    $list_toppost = array_merge($list_toppost, array(array(
        'source_id'=>0,
        'title'=>$title,
        'href'=>$href,
        'img'=>$img,
        'des'=>$des
    )));  
    
    // dantri
    $html = file_get_html($list_url[1]);
    $toppost = $html->find('div[data-boxtype=homenewsposition]')[0];
    $title = $toppost->find('a')[0]->getAttribute('title');
    $href = $toppost->find('a')[0]->getAttribute('href');
    $href = $list_url[1].$href;
    $img = $toppost->find('a img')[0]->getAttribute('src');
    $des = $toppost->find('p')[0]->plaintext;

    $list_toppost = array_merge($list_toppost, array(array(
        'source_id'=>1,
        'title'=>$title,
        'href'=>$href,
        'img'=>$img,
        'des'=>$des
    )));

    // vietnamnet
    $html = file_get_html($list_url[2]);
    $toppost = $html->find('div.top-one')[0];
    $href = $toppost->find('a')[0]->getAttribute('href');
    $href = $list_url[2].$href;
    $img = $toppost->find('a img')[0]->getAttribute('src');
    $title = $toppost->find('a img')[0]->getAttribute('alt');
    $des = $toppost->find('div')[0]->plaintext;

    $list_toppost = array_merge($list_toppost, array(array(
        'source_id'=>3,
        'title'=>$title,
        'href'=>$href,
        'img'=>$img,
        'des'=>$des
    )));

    return $list_toppost;
}

function getSubTop(){
    $list_url = array(
        "https://vnexpress.net",
        "https://dantri.com.vn",
        "https://vietnamnet.vn"
    );

    $list_subtop = array();

    // vnexpress
    $html = file_get_html($list_url[0]);
    $divnews = $html->find('div[class=col-left col-small]')[0];
    $list_article = $divnews->find('article');
    $i = 0;
    $count = 0;
    while($count < 5){
        $article = $list_article[$i];
        $i++;
        $title = $article->find('.title-news a')[0]->plaintext;
        $href = $article->find('.title-news a')[0]->getAttribute('href');
        $temp = $article->find('picture img');
        if($temp == null){
            continue;
        }
        $img = $temp[0]->getAttribute('src');
        if(strstr($img, 'data:image')){
            $img = $temp[0]->getAttribute('data-src');
        }
        $list_subtop = array_merge($list_subtop, array(array(
            'source_id'=>0,
            'title'=>$title,
            'href'=>$href,
            'img'=>$img
        ))); 
        $count++;
    }

    // dantri
    $html = file_get_html($list_url[1]);
    $list_article = $html->find('div[class=fl wid470] div[class=mt1 clearfix]');
    $i = 0;
    $count = 0;
    while($count < 5){
        $article = $list_article[$i];
        $i++;

        $title = $article->find('h4 a')[0]->plaintext;
        $href = $article->find('h4 a')[0]->getAttribute('href');
        $href = $list_url[1].$href;
        $img = $article->find('a img')[0]->getAttribute('src');
        // echo $title.$href.$img;
        $list_subtop = array_merge($list_subtop, array(array(
            'source_id'=>1,
            'title'=>$title,
            'href'=>$href,
            'img'=>$img
        )));
        $count++;
    }

    // vietnamnet
    $html = file_get_html($list_url[2]);
    $list_article = $html->find('div[class=TopNew va-top bor-bottom2]')[0];
    $list_article = $list_article->find('div')[0];
    $list_article = $list_article->find('ul')[0];
    foreach($list_article->find('li') as $article){
        $title = $article->find('a img')[0]->getAttribute('alt');
        $img = $article->find('a img')[0]->getAttribute('src');
        $href = $article->find('a')[0]->getAttribute('href');
        $href = $list_url[2].$href;

        $list_subtop = array_merge($list_subtop, array(array(
                    'source_id'=>3,
                    'title'=>$title,
                    'href'=>$href,
                    'img'=>$img
                )));
    }
    return $list_subtop;
}

function getContent($id, $link){
        if($id == 0){
            $html = file_get_html($link);
            $article = $html->find('div[class=sidebar-1]');
            if($article == null){
                $title=$html->find('h1')[0]->plaintext;
                $des = $html->find('p[class=description]')[0];
                $temp = $html->find('picture img');
                if($temp == null){
                    $img = 'assets/css/images/no-img.jpg';
                }
                else{
                    $img = $temp[0]->getAttribute('src');
                }
                if(strstr($img, 'data:image')){
                    $img = $temp[0]->getAttribute('data-src');
                }
                // $temp = $html->find('text');
                // echo $temp;
                $text = '';
                foreach($html->find('p') as $t){
                    $text = $text." ".$t->plaintext;
                }
                // echo $text;
            }
            else{
                $article = $article[0];
                $title = $article->find('h1[class=title-detail]')[0]->plaintext;
                $des = $article->find('p[class=description]')[0];
                
                $content = $article->find('article')[0];
                $temp = $content->find('picture img');
                if($temp == null){
                    $img = 'assets/css/images/no-img.jpg';
                }
                else{
                    $img = $temp[0]->getAttribute('src');
                }
                if(strstr($img, 'data:image')){
                    $img = $temp[0]->getAttribute('data-src');
                }

                $text = '';
                foreach($content->find('p') as $t){
                    $temp = $t->plaintext;
                    $text = $text.' '.$temp;
                }

            }
            
            $post = array(
                "source_name"=>'VNExpress',
                "source"=>'https://vnexpress.net',
                "title"=>$title,
                "des"=>$des,
                "img"=>$img,
                "text"=>$text
            );
        }
        else if($id == 1){
            $html = file_get_html($link);
            $article = $html->find('div[id=ctl00_IDContent_ctl00_divContent]')[0];
            $title = $article->find('h1')[0]->plaintext;
            $des = $article->find('h2')[0]->plaintext;

            $content = $article->find('div[id=divNewsContent]')[0];
            $img = $content->find('figure img');

            $temp = $content->find('figure img');
            if($temp == null){
                $img = 'assets/css/images/no-img.jpg';
            }
            else{
                $img = $temp[0]->getAttribute('src');
            }

            $text = ' ';
            foreach ($content->find('p') as $t){
                $temp = $t->plaintext;
                $text = $text.' '.$temp;
            }
            $post = array(
                "source_name"=>'Dân Trí',
                "source"=>'https://dantri.com.vn',
                "title"=>$title,
                "des"=>$des,
                "img"=>$img,
                "text"=>$text
            );
        }
        else if($id == 3){
            try{
                $html = file_get_html($link);
                $article = $html->find('div[id=ArticleHolder]')[0];
                $title = $article->find('h1')[0]->plaintext;
    
                $content = $article->find('div[id=ArticleContent]')[0];
                $des = $content->find('h2')[0]->plaintext;
    
                $temp = $content->find('table img');
                if($temp == null){
                    $img = 'assets/css/images/no-img.jpg';
                }
                else{
                    $img = $temp[0]->getAttribute('src');
                }
    
                $text = ' ';
                foreach($content->find('p') as $t){
                    $temp = $t->plaintext;
                    $text = $text.' '.$temp;
                }
    
                $post = array(
                    "source_name"=>'Vietnamnet',
                    "source"=>'https://vietnamnet.vn',
                    "title"=>$title,
                    "des"=>$des,
                    "img"=>$img,
                    "text"=>$text
                );
            }
            catch(Exception $e){
                $post = array(
                    "source_name"=>'Vietnamnet',
                    "source"=>'https://vietnamnet.vn',
                    "title"=>"Khong co du lieu",
                    "des"=>"khong co du lieu",
                    "img"=>"khong co du lieu",
                    "text"=>" "
                );
            }
            
        }
        
        return $post;
}

function runTextRank($text){
    $text = str_replace('"', ' ', $text);
    $text = str_replace("'", ' ', $text);
    $text = str_replace('`', ' ', $text);
    $text = str_replace("$", ' ', $text);
    $text = str_replace("\\", ' ', $text);
    $text = str_replace("/", ' ', $text);
    $text = str_replace("|", ' ', $text);
    $text = "'".$text."'";
    
    exec("./shell.sh ".$text, $keyword);
    return $keyword;
}

function vectorizer($text){
    $text = str_replace('"', ' ', $text);
    $text = str_replace("'", ' ', $text);
    $text = str_replace('`', ' ', $text);
    $text = str_replace("$", ' ', $text);
    $text = str_replace("\\", ' ', $text);
    $text = str_replace("/", ' ', $text);
    $text = str_replace("|", ' ', $text);
    $text = "'".$text."'";

    exec("./vectorizer.sh ".$text, $result);
    // if($result == null){
    //     return $result;
    // }
    return $result[0];
}

function getNewsByKw($kw){
    $list_url = array(
        "https://timkiem.vnexpress.net/?q=",
        "https://dantri.com.vn/tim-kiem?keyword=",
        "https://timkiem.vietnamnet.vn/indexV9.html?k="
    );

    $list_posts = array();

    $kw_vne = str_replace(' ', '%20', $kw);
    $kw_vnn = str_replace(' ', '+', $kw);

    $html = file_get_html($list_url[0].$kw_vne);

    $lp = $html->find('div[id=result_search]');
    if($lp == null){
        // $list_posts = array(
        //     'source_name'=>'VNExpress',
        //     'source_id'=>0,
        //     'title'=>"Không có dữ liệu",
        //     'href'=>"",
        //     'img'=>"",
        //     'des'=>"không có dữ liệu",
        //     'kw'=>""
        // );
        return $list_posts;
    }

    $lp = $lp[0];
    $count = 0;
    foreach($lp->find('article[data-url]') as $article){

        $temp = $article->find('h3[class=title-news] a')[0];
        $title = $temp->plaintext;
        $href = $temp->getAttribute("href");
        $des = $article->find('p.description a')[0]->plaintext;
        $temp = $article->find('picture img');
        if($temp == null){
            $temp = $article->find('video');
            if($temp == null){
                continue;
            }
            $img = $temp[0]->getAttribute('poster');
        }
        else{
            $img = $temp[0]->getAttribute('src');
            if(strstr($img, 'data:image')){
                $img = $temp[0]->getAttribute('data-src');
            }
        }
        
        $list_posts = array_merge($list_posts, array(array(
            'source_name'=>'VNExpress',
            'source_id'=>0,
            'title'=>$title,
            'href'=>$href,
            'img'=>$img,
            'des'=>$des,
            'kw'=>$kw
        )));
        $count++;
        if($count > 4) break;
    }

    return $list_posts;
}

?>