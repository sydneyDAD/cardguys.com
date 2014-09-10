<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
$option = 'edit';
if ($_POST['option'] == 'edit'){
	$config->edit();
}
$row = $config->detail();
	echo $temp->title('Web Config');
	echo $temp->input_text('Account Number on NCSReporting.com','hit',$row['hit'],'20');
	echo $temp->input_text('ID News In Home Page','aboutus',$row['aboutus'],'15');
	echo $temp->input_text('Home Page Title','pagetitle',$row['pagetitle'],'96');
	echo $temp->area_text('Keywords','metakey',$row['metakey'],'cols="60" rows ="2"');
	echo $temp->area_text('Description','metades',$row['metades'],'cols="60" rows ="2"');
	//echo $temp->area_text('Home Header Text','home_header',$row['home_header'],'cols="60" rows ="2"');
	echo $temp->detail('home_header',$row['home_header'],'180px','Default','1','Home Header Text');
	
	//echo $temp->area_text('Home Footer Text','home_footer',$row['home_footer'],'cols="60" rows ="2"');
	echo $temp->detail('home_footer',$row['home_footer'],'180px','Default','1','Home Footer Text');
	
    echo $temp->area_text('Home Header Text left','header_left',$row['header_left'],'cols="60" rows ="2"');
	echo $temp->area_text('Home Header Text right','header_right',$row['header_right'],'cols="60" rows ="2"');
    echo $temp->area_text('Tracker Code','metatag',$row['metatag'],'cols="60" rows ="10"');
    
    echo $temp->area_text('Facebook ID','facebook_id',$row['facebookid'],'cols="20" rows="1"');
    
    echo $temp->area_text('Twitter ID','twitter_id',$row['twitterid'],'cols="20" rows ="1"');
    
    //echo $temp->detail('home',$row['home'],'150px','basic','1','Top Home');
$onblog=($row['blog_stat'])?" checked ":"";
$offblog=(!$row['blog_stat'])?" checked ":"";

echo <<<TOPTEXT
	<tr>
	<td class="td_left" valign=top>Advice Center Status</td>
	<td class=td_right valign=top>
     <input type=radio name=blog_stat value="1" $onblog>On <input type=radio name=blog_stat value="0" $offblog>Off
    </td>
	</tr>
	<tr><td class="td_left" valign=top>Top Slogan Text:<Br> (Per Section)</td>
	<td class=td_right>
    Home<Br>
    <input type=text size=30 name=s_home value="$row[s_home]"><br><Br>
About us<Br>
    <input type=text size=30 name=s_about value="$row[s_about]"><br><Br>
Privacy<Br>
    <input type=text size=30 name=s_privacy value="$row[s_privacy]"><br><Br>
Terms<Br>
    <input type=text size=30 name=s_terms value="$row[s_terms]"><br><Br>
Contact us<Br>
    <input type=text size=30 name=s_contact value="$row[s_contact]"><br><Br>
Blog<Br>
    <input type=text size=30 name=s_blog value="$row[s_blog]"><br><Br>
Advice center<Br>
    <input type=text size=30 name=s_advice value="$row[s_advice]"><br><Br>
faq<Br>
    <input type=text size=30 name=s_faq value="$row[s_faq]"><br><Br>
Sitemap<Br>
    <input type=text size=30 name=s_sitemap value="$row[s_sitemap]"><br><Br>
Glossary<Br>
    <input type=text size=30 name=s_glossary value="$row[s_glossary]"><!-- br><Br>

<b>Cards</b><br>
Type<Br>
    <input type=text size=30 name=s_type value="$row[s_type]"><br><Br>
Quality<Br>
    <input type=text size=30 name=s_quality value="$row[s_quality]"><br><Br>
International<Br>
    <input type=text size=30 name=s_int value="$row[s_int]"><br><Br>
Banks/issuer<Br>
    <input type=text size=30 name=s_bank value="$row[s_bank]"><br><Br>
Reports<Br>
    <input type=text size=30 name=s_report value="$row[s_report]"><br><Br -->
	</td></tr>
TOPTEXT;
    
    /*
    home
about us
privacy
contact
blog
advice center
faq

type
quality
international
banks/issuer
    */
	echo $temp->submit();
	?>
<script language="javascript">
function checkinput(){
	<? 	echo $check->check_number('hit','Account Number on NCSReporting.com must be a number.');


	?>
}
</script>