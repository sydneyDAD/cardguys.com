<?php
	
	function seourl_loopup($module=""){
		if($module){
			$module=mysql_real_escape_string($module);			
			
			$sql1="SELECT tbl_id FROM 8x_creditcard WHERE alias = '$module' LIMIT 1"; //credti-details
			$sql2="SELECT n2.name,n1.news_id FROM 8x_news n1 LEFT JOIN 8x_category_news n2 ON n1.cat_id=n2.cat_id  WHERE n1.alias = '$module' LIMIT 1";
			$sql3="SELECT tbl_id FROM 8x_cards_type WHERE alias = '$module' LIMIT 1";
			$sql4="SELECT tbl_id FROM 8x_cards_bank WHERE alias = '$module' LIMIT 1";
			$sql5="SELECT tbl_id FROM 8x_cards_quality WHERE alias = '$module' LIMIT 1";
			$sql6="SELECT tbl_id FROM 8x_cards_int WHERE alias = '$module' LIMIT 1";
			$sql7="SELECT tbl_id FROM 8x_cards_report WHERE alias = '$module' LIMIT 1";
			
			if($module=='advice-center'){
				
			}elseif(is_array($myquery=mysql_fetch_row(mysql_query($sql1)))){				
				$module=array(
						'name'=>"card-details",
						//'type'=>$myquery[0]
						'xid'=>'id',
						'id'=>$myquery[0]
						);
			}elseif(is_array($myquery=mysql_fetch_assoc(mysql_query($sql2)))){
				if(isset($myquery['name']) && $myquery['name']){
					switch(strtolower($myquery['name'])){
					case 'advice center':
						$module=array(
						'name'=>"advice-center",
						'xid'=>'id',
						'id'=>$myquery['news_id']);
					break;
					case 'pages':
						$module="pages";
					break;
					}
				}
				
			}elseif(is_array($myquery=mysql_fetch_row(mysql_query($sql3)))){				
				$module=array(
						'name'=>"credit-cards",
						'xid'=>'type',
						'type'=>$myquery[0]						
						);			
			}elseif(is_array($myquery=mysql_fetch_row(mysql_query($sql4)))){
				$module=array(
						'name'=>"credit-cards",
						'xid'=>'issuer',
						'issuer'=>$myquery[0]
						);	
			}elseif(is_array($myquery=mysql_fetch_row(mysql_query($sql5)))){
				$module=array(
						'name'=>"credit-cards",
						'xid'=>'quality',
						'quality'=>$myquery[0]
						);
			
			}elseif(is_array($myquery=mysql_fetch_row(mysql_query($sql6)))){
				$module=array(
						'name'=>"credit-cards",
						'xid'=>'int',
						'int'=>$myquery[0]
						);
			
			}elseif(is_array($myquery=mysql_fetch_row(mysql_query($sql7)))){
				$module=array(
						'name'=>"credit-cards",
						'xid'=>'report',
						'report'=>$myquery[0]
						);
			
			}
		}return $module;
	}
?>