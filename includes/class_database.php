<?php
class database{
	var $trang;
	function connect($db_host,$db_username,$db_password,$db_name){
	    $result_database = mysql_connect($db_host, $db_username, $db_password) or die ("Cannot connect database.");
            mysql_select_db($db_name);
    	return $result_database;
	}
	function query($input){
		$this->all_sql_dat=$input;
                
		$thequery=mysql_query($input);
		if(mysql_error() && (isset($this) && get_class($this)==__CLASS__)){
                    $this->mysql_error=mysql_error();
                }

                $row = mysql_fetch_assoc($thequery);  
                return $thequery;
	}
	function fetch_assoc($result){
		return  @mysql_fetch_assoc($result);
	}
    function fetch_array($result){
		return  @mysql_fetch_array($result);
	}
	function free_result($result){
		@mysql_free_result($result);
	}
	function select($table,$select,$where,$ordering = '',$limit = '',$other=''){

		if ($select == ''){
			$select = '*';
		}
		if ($where != '')
		$where = 'WHERE '.$where;
		if ($limit != '')
		$limit = 'LIMIT '.$limit;
		if ($ordering != '')
		$ordering = 'ORDER BY '.$ordering;
                
                ///$sql = "SELECT $select FROM $table $other WHERE Country = '' AND $where $ordering $limit";
		$sql = "SELECT $select FROM $table $other $where $ordering $limit";
        return $sql;
	}
	function count ($table,$where){
		$result = $this->query($this->select($table,'COUNT(*) as tong',$where));
		$row = $this->fetch_assoc($result);
		$this->free_result($result);
		return $row['tong'];
	}
	function detail ($table,$select='',$where = '',$ordering = ''){
             
                //had to make own query because database was not querying  as is
            
                $thequery=mysql_query($this->select($table,$select,$where,$ordering,1));
		
                if(mysql_error() && (isset($this) && get_class($this)==__CLASS__)){
                    $this->mysql_error=mysql_error();
                }
                $row = mysql_fetch_assoc($thequery);  
                

                
		return $row;
        
	}

	function lists ($table,$select = '',$where = '',$ordering = '',$limit = '',$other = ''){
            
                //print_r($this->query($this->select($table,$select,$where,$ordering,$limit,$other)));
		return $this->query($this->select($table,$select,$where,$ordering,$limit,$other));
                
	}
	function insert_record($table,$input,$check = 1){
		if ($check == 1)
		security::check_pin();
		$column = implode(',',array_keys($input));
		$value = implode('\' , \'',$input);
		$sql = ("INSERT ".$table." (".$column.") VALUE ('".$value."')");
    	$this->glob_input=$input;
		$this->query($sql);
	}
	function update_record($table,$input,$where,$check = 1){
		if ($check == 1)
		security::check_pin();
		$count = count($input);
		$i = 1;
		$sql = "UPDATE `$table` SET ";
		foreach ($input as $key => $value){
				$sql .= "`$key` = '".$value."'";
				if ($i ++ < $count){
					$sql.= ', ';
				}
			}
		$sql .= " WHERE $where";
		$this->glob_update=$sql;
	//	echo $sql;
		return $this->query($sql);
	}
	function update_status($table,$key,$colum = 'status'){
		if ($_GET['changestatus'])
		{
			if (intval($_GET['st'] == 1))
				$status = 0;                
			else
				$status = 1;
			if (intval($_GET['special']) == 1)
				$colum = 'special';
            else if (intval($_GET['top']) == 1)
				$colum = 'top';
            else if (intval($_GET['good']) == 1)
				$colum = 'good';
			$input = array( $colum => $status
			);
			$this->update_record($table,$input,$key.' = '.intval($_GET['changestatus']),0);
		}
	}
	function delete_record($table,$colum,$input,$path = ''){
		$input = implode('\' , \'',$input);
		// neu co duong dan cua anh, se xoa anh/////////////////
		////////////////////////////////////////////////////////
		if ($path != ''){
			$result = $this->lists($table,'image',$colum .' IN (\''.$input.'\')');
			while ($row = $this->fetch_assoc($result)){
				if ($row['image']){
					unlink($path.$row['image']);
					unlink($path.'resize/'.$row['image']);
				}
			}
			$this->free_result($result);
		}
		/////////////////////////////////////////////////////////
		$sql = "DELETE FROM `$table` WHERE $colum IN ('$input')";
	//	echo $sql;
		$this->query($sql);
	}
	function delete_one_record($table,$colum,$input){
		
		/////////////////////////////////////////////////////////
		$sql = "DELETE FROM `$table` WHERE $colum = $input";
	//	echo $sql;
		return $this->query($sql);
	}
    
    function delete_all($table){
        
        $sql = "DELETE FROM `$table` ";
	 //	echo $sql;
		return $this->query($sql);
        
    }
	function check_delete($table,$colum,$input){
		$input = implode('\' , \'',$input);
		return $this->count($table,$colum .' IN (\''.$input.'\')');
	}
	function alert($text){?>
			<script language="javascript">
				alert('<?=$text?>');
			</script>
	<?}
}
?>