<?php
class config{
	var $table = '8x_config';
	var $module = 'config';
	var $path = 'upload/config/';
	var $default = '1';
	
	function config(){
		$this->db = new database;
	}
	function detail(){
		return $this->db->detail($this->table,'','lang = '.$this->get_lang());
	}
	function hit_counter(){
		if (!$_SESSION['hit']){
			$_SESSION['hit'] = 1;
			$select = "UPDATE 8x_config SET hit = hit + 1 WHERE lang =". intval($this->get_lang());
			//$this->db->query($select);
		}
	}
	function edit(){
		    $input = array(
		    		'footer' => $_POST['footer'],
		    		'hit' => intval($_POST['hit']),
		    		'aboutus' => intval($_POST['aboutus']),
		    		'currency1' => clear($_POST['currency1']),		    				    		
		    		'pagetitle' => clear($_POST['pagetitle']),
		    		'metakey' => clear($_POST['metakey']),
                    'metatag' => clear($_POST['metatag']),
					'metades' => clear($_POST['metades']),
                    'header_left' => clear($_POST['header_left']),
                    'header_right' => clear($_POST['header_right']),
                    'home_footer' => clear($_POST['home_footer']),
                    'home' => clear($_POST['home']),
                    'bookmark' => clear($_POST['bookmark']),
                    'home_header' => clear($_POST['home_header']),
                    's_home' => clear($_POST['s_home']),
					's_about' => clear($_POST['s_about']),
					's_privacy' => clear($_POST['s_privacy']),
					's_contact' => clear($_POST['s_contact']),
					's_blog' => clear($_POST['s_blog']),
					's_advice' => clear($_POST['s_advice']),
					's_faq' => clear($_POST['s_faq']),
					/*'s_type' => clear($_POST['s_type']),
					's_quality' => clear($_POST['s_quality']),
					's_int' => clear($_POST['s_int']),
					's_bank' => clear($_POST['s_bank']),
					's_report' => clear($_POST['s_report']),*/
					's_terms' => clear($_POST['s_terms']),
					's_sitemap' => clear($_POST['s_sitemap']),
					's_glossary' => clear($_POST['s_glossary']),
					'blog_stat' => (int)$_POST['blog_stat'],
					'facebookid' => clear($_POST['facebook_id']),
					'twitterid' => clear($_POST['twitter_id'])
					);
					
			$this->db->update_record($this->table,$input, 'id = 1');
			security::redirect($this->module,'form');
	}
	/*
		1 - viet
		2 - eng
	*/
	function get_lang(){
		if (!isset($_SESSION['lang_epc_lang']))
		$_SESSION['lang'] = $this->default;
		if (isset($_GET['lang'])){
			$_SESSION['lang'] = intval($_GET['lang']);
		}
		return $_SESSION['lang'];
	}
}
?>