<?php
function tachchuoi()
{
    $uri=$_SERVER['REQUEST_URI'];
    $chuoi = explode("/", $uri);   
    $so=count($chuoi);
    $result=$chuoi[$so-1];
    
    if(strpos($result,'.html'))
    {
        $result2= explode('-',$result);
        $result="";
        $so2=count($result2);
        for($k=1;$k<$so2;$k++)
        {           
            if($result2[$k]!='-' )
            {           
            $result .= ucfirst($result2[$k]).' ';            
            }            
        }
        $result=str_replace('.html',' ',$result);
        
        
    } 
    else
    {
        $result .=' ';
    }   
    return ucwords($result);
}
if(tachchuoi()!= '')
{
 
 $_SESSION['meta'] = $meta['meta'];
 $_SESSION['banner']=$meta['assign_banner'];

 }
 else
 {
 
 $_SESSION['keyword'] = $meta['keyword'];
 $_SESSION['destination'] = $meta['destination'];
 $_SESSION['banner']=$meta['assign_banner'];
}
?>