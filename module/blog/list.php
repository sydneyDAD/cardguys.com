<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>
  <h3>Credit Card City Blog</h3>
  <?
  $limit=0;
  $month=0;
  $year=0;
if($_GET['type'])
    {
   $row = $blogs->lists('*','b.category_id ='.intval($_GET['type']),'','','1');
   }
elseif($_GET['date'])
    {

    $chuoi = explode('-',(string)$_GET['date']);
    $month=$chuoi[0];
    $year=$chuoi[1];
    $row = $blogs->lists('*',' month(publishdate) ='.$month.' and year(publishdate) ='.$year);
   }
else
    {
        $limit='2';
        $paging = $page->paging($blogs->table,$limit);
        $row = $blogs->lists('*','blog_id > 0','',$page->limit());
    }

if($row)
   {

				$extraie1=$extraie2=$extraie3="";
				if($matchcase){
				$extraie1="re-mod-brow";
				$extraie2="re-mod-title";
				$extraie3="re-mod-card-top";
				}

    $j=0;
        foreach($row as $row)
        {
            echo "<div class='blog'>";
            if($j==0 )
            {
                if($_GET['type']!='')
                {
                echo '<div class="cat_blog_name">All blogs in '.$row ->cat_name.'</div>';
                }
                elseif($_GET['date']!='')
                {
                    ?>
                    <div class="cat_blog_name">All blogs for <?=change_month($month).', '.$year?></div>
                    <?
                }
                else
                {
                    echo '<div class="cat_blog_name">Most recent posts</div>';
                }
            }
            $j++;
            $n=0;
            $row_comment = $comment_blog->lists('comment_id, blog_id','c.status=1 and c.blog_id ='.$row->blog_id,'','',1);
            $n=count($row_comment);
   ?>
   <div class="infocard">
				<div class="border-content-card-top <?=$extraie3?>"></div>
				<div class="title-content-card-top <?=$extraie2?>" style="height: 30px;"><span class="text-title-Content-card-top" style="display: block; height: 30px; line-height: 15px;"><?=$row->title?></span></div>
				<div class="content-card-text-infomation <?=$extraie2?>">
					<div class="content-apply-text">

            <div class="history">Posted on <?=date('m/d/Y',$row->publishdate).'- Filed under '.$row->cat_name?></div>
            <div class="body"><?=$row->body?></div>
            <div class="add_view_comment">
             <img src="images/comments_icon.gif"/> <a href="<?=change_url('index.php?module=blog&id='.$row->blog_id.'&alias= blog')?>">Add comment (<?=$n?>)</a>
            <a href="<?=change_url('index.php?module=blog&id='.$row->blog_id.'&alias= blog')?>">View comment</a>
          </div>

          </div>
				</div>
				<div class="border-content-card-bottom <?=$extraie3?>"></div>
			</div>
          </div>


   <?
        }

    if($limit!=0)
    {
        echo "<div class='paging_blog'>".$paging."</div>";
    }

   }




?>



