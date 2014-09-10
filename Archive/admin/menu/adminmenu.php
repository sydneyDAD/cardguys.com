<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
?>
<table border="0" cellpadding="4" cellspacing="0">
   <tr class="header">
      <td><img src="images/folder.gif"></td>
      <td width="100%"><a href="javascript: d.openAll();">
         Open All
         </a> | <a href="javascript: d.closeAll();">
         Close All
         </a></td>
   </tr>
</table>
<br>
<div class="dtree" style="margin-left: 2px;">
   <script type="text/javascript">
		d = new dTree('d');

		d.add(0,-1,'<b>Home</b>','index.php');
		d.add(2,0,'Members','');
		d.add(200,2,'Add New Member','?module=user&view=form');
		d.add(201,2,'Member List','?module=user&view=list');

        d.add(1,0,'Images & Banners','');
		d.add(200,1,'Add New Images or Banner','?module=advertise&view=form');
		d.add(201,1,'Images & Banners List','?module=advertise&view=list');

		d.add(3,0,'Menu','');
		d.add(300,3,'Add New Menu','index.php?module=menu&view=form');
		d.add(301,3,'Menu List','index.php?module=menu&view=list');
		d.add(4,0,'News','');
		d.add(400,4,'Add New Channel','index.php?module=channel_news&view=form');
		d.add(401,4,'Channels List','index.php?module=channel_news&view=list');
		d.add(402,4,'Add New Category','index.php?module=category_news&view=form');
		d.add(403,4,'Category List','index.php?module=category_news&view=list');
		d.add(404,4,'Add News','index.php?module=news&view=form');
		d.add(405,4,'News List','index.php?module=news&view=list');
		d.add(6,0,'Cards','');
		d.add(600,6,'Manage Types','index.php?module=cards&view=list_types');
        d.add(601,6,'Manage Banks','index.php?module=cards&view=list_banks');
        d.add(602,6,'Manage Qualitys','index.php?module=cards&view=list_qualitys');
        d.add(603,6,'Manage International','index.php?module=cards&view=list_ints');
        d.add(604,6,'Manage Credit Cards','index.php?module=cards&view=list_credit_cards');
        d.add(605,6,'Manage XML Feed','index.php?module=cards&view=xmlfeed');
        d.add(606,6,'Credit Card by Issuer section','index.php?module=cards&view=list_issuers');
        d.add(607,6,'Credit Report Section','index.php?module=cards&view=list_reports');
		d.add(9,0,'Contact','');
		d.add(900,9,'Contact Lists','index.php?module=contact&view=list');
		d.add(10,0,'FAQ','');
        d.add(1001,10,'Add New FAQ','index.php?module=faq&view=form');
		d.add(1002,10,'FAQs List','index.php?module=faq&view=list');
        d.add(12,0,'Glossary of Terms','');
        d.add(1003,12,'Add new glossary','index.php?module=glossary&view=form');
		d.add(1004,12,'List glossary of terms','index.php?module=glossary&view=list');


        d.add(13,0,'Blogs','');
		d.add(1301,13,'Add new category blog','index.php?module=category_blog&view=form');
       	d.add(1302,13,'List category blog','index.php?module=category_blog&view=list');
        d.add(1303,13,'Add news blog','index.php?module=blog&view=form');
       	d.add(1304,13,'List blog','index.php?module=blog&view=list');
        //d.add(1305,13,'Add new comment','index.php?module=comment_blog&view=form');
       	d.add(1306,13,'List comment','index.php?module=comment_blog&view=list');

		d.add(11,0,'Config','');
		d.add(1100,11,'Web Config','index.php?module=config&view=form');

		document.write(d);

	</script>
</div>