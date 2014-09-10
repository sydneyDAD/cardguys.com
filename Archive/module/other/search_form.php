<? if ( !defined('INCLUDED') ) { die("Access Denied"); }?>
<form method="GET" action="" name="searchform">
	<input value="" name="keyword" size="20"/>
	<select name="module" onchange="showform()">
		<option value=""><?=SEARCH_MODULE?></option>
		<option value="product"><?=SEARCH_PRODUCT?></option>
		<option value="news"><?=SEARCH_NEWS?></option>
	</select>
	<span id="search_advanded" style="display: none">
		<select name="search">
			<option value="name"><?=SEARCH_NAME?></option>
			<option value="detail"><?=SEARCH_DETAIL?></option>
			<option value="priceup"><?=SEARCH_NAME?></option>
			<option value="pricedown"><?=SEARCH_NAME?></option>
		</select>
	</span>
	<input type="submit" value="<?=SEARCH?>"/>
</form>
<script language="javascript">
	function showform(){
		if (document.searchform.module.value == 'product'){
			document.getElementById('search_advanded').style.display = 'block';
		}
		else{
			document.getElementById('search_advanded').style.display = 'none';
			document.searchform.search.value = '';
		}
	}
</script>