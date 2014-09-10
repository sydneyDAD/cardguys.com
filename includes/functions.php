<?php
function header_redirect($redirect_url)
{
    echo "<script>document.location.href='" . $redirect_url . "'</script>";
}
function rep($input)
{
	return str_replace("'","\"",$input);
}
function clear_all($input){
	$input = chop($input);
	$fine=array("'","<",">");
	$replace = array("\"","(",")");
	return str_replace($fine,$replace,$input);
}
function clear($input){
	$input = chop($input);
	return str_replace('\'','"',$input);
}
function price($input)
{
	$rt = strrev(wordwrap(strrev($input),3,'.',true));
    return $rt;
}
function date_time_fomat($date)
{
	$row = explode(" ",$date);
	$row_time = $row ['1'];
	$row_date = date_fomat($row['0']);
	echo $row_time.' - '.$row_date;
}
function date_fomat($date)
{
	$row_break = explode("-",$date);
	$row_date = $row_break['2'].' / '.$row_break['1'].' / '.$row_break['0'];
	return $row_date;
}


function full_url()
{
$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
$protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")) . $s;
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
}
function seourl($str){
	$marTViet=array(" ","速");

	$marKoDau=array("-","");
	return str_replace($marTViet,$marKoDau,$str);
}
function change_url($url){
	$search = array('index.php','?module=','&view=','&id=','&type=','&quality=','&issuer=','&issuers=','&int=','&id=','&alias=', '&date=','&year=','&f=');
	$replace = array('','','/','/','/type/','/quality/','/issuer/','/issuers/','/int/','','-','/date/','-','/f/');
	$str= str_replace($search,$replace,$url);
    return $str;
}
function change_url1($url){
	$search = array('index.php','?module=','&view=','&id=','&type=','&quality=','&issuer=','&issuers=','&int=','&id=','&alias=', '&date=','&year=');
	$replace = array('','','/','/','/type/','/quality/','/issuer/','/issuers/','/int/','','-','/date/','-');
	$str= str_replace($search,$replace,$url);
    return $str;
}
function word_limiter($str, $limit = 100, $end_char = '&#8230;')
	{
		if (trim($str) == '')
		{
			return $str;
		}

		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

		if (strlen($str) == strlen($matches[0]))
		{
			$end_char = '';
		}

		return rtrim($matches[0]).$end_char;
	}
function change_month($month)
{
    $result= '';
    switch ($month)
    {
        case 1:
            $result = 'January';
            break;
        case 2:
            $result = 'February';
            break;
        case 3:
            $result = 'March';
            break;
        case 4:
            $result = 'April';
            break;
        case 5:
            $result = 'May';
            break;
        case 6:
            $result = 'June';
            break;
        case 7:
            $result = 'July';
            break;
        case 8:
            $result = 'August';
            break;
        case 9:
            $result = 'September';
            break;
        case 10:
            $result = 'Octorber';
            break;
        case 11:
            $result = 'November';
            break;
        case 12:
            $result = 'December';
            break;
    }
    return $result;
}
?>