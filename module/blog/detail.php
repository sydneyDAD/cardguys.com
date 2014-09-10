<?php if ( !defined('INCLUDED') ) { die("Access Denied"); }
if($_GET['id'])
$blog_id=0;
$n=0;
?>
  <h3>Credit Card City Blog</h3>
  <?
if($_GET['id'])
    {
   $row = $blogs->lists('*','b.blog_id ='.intval($_GET['id']),'','','1');
   $row_comment = $comment_blog->lists('comment_id, blog_id','c.status=1 and c.blog_id ='.intval($_GET['id']),'','',1);
   $n = count($row_comment);
   }
   if($row)
   {
    $j=0;
        foreach($row as $row)
        {
            $blog_id = $row->blog_id;
            if($j==0)
            {
              echo '<div class="cat_blog_name">View blog posting on '.$row ->publishdate.'</div>';
            }
            $j++;
   ?>
   <div class="infocard">
				<div class="border-content-card-top"></div>
				<div class="title-content-card-top" style="height: 30px;"><span class="text-title-Content-card-top" style="display: block; height: 30px; line-height: 15px;"><?=$row->title?></span></div>
				<div class="content-card-text-infomation">
					<div class="content-apply-text">

            <div class="history">Posted on <?=$row->publishdate .'- Filed under '.$row->cat_name?></div>
            <div class="body"><?=$row->body?></div>

          <div class="view_comment">


   <?
            if($n==0)
            {
                echo "<div id='no_comment'>There are currently no comments for this Blog</div>";
                echo "<div id='frmcomment'>";
                include_once('module/comment/form.php');
                echo "</div>";
            }
            else
            {
                echo "<div id='view_comment_title'>View comment</div>";
                $row_comment = $comment_blog->lists('*','c.status=1 and c.blog_id = '.intval($_GET['id']),'','','1');
                echo "<div id='detail_comment'>";
                foreach($row_comment as $row_comment)
                {
                    echo '<div id="comment_title">'.$row_comment->name.' said on '.$row_comment->commentdate.'</div>';
                    echo '<div id="comments">'.$row_comment->comments.'</div>';
                    echo '<div id="comment_hr"><hr no-shade=""></div>';

                }
                include_once('module/comment/form.php');
                echo "</div>";
            }

   ?>
            </div>
            </div>
				</div>
				<div class="border-content-card-bottom"></div>
			</div>
   <?


        }

   }
// Form comments
?>



