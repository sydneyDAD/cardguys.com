<?php
class order{
	var $table = '8x_order';
	var $table_detail = '8x_order_detail';
	var $key = 'order_id';
	var $key_detail = 'id';
	var $module = 'order';
	function order(){
		$this->db = new database;
	}
	function lists($limit,$where=''){
		$result = $this->db->lists($this->table,'',$where,$this->key.' DESC',$limit);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->order_id = $row['order_id'];
			$list[$i]->total = $row['total'];
			$list[$i]->customer = $row['customer'];
			$list[$i]->address = $row['address'];
			$list[$i]->mobile = $row['mobile'];
			$list[$i]->email = $row['email'];
			$list[$i]->ma_nhanvien = $row['ma_nhanvien'];
            $list[$i]->ma_website = $row['ma_website'];
			$list[$i]->note = $row['note'];
			$list[$i]->status = $row['status'];
			$list[$i]->date = $row['date_up'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function detail(){
		$product = new product();
		$select = 'c.*,p.'.$product->key.',p.name as name';
		$other = 'LEFT JOIN '.$product->table.' as p ON p.'.$product->key.' = c.pro_id';
		$ordering = 'id DESC';
		$result = $this->db->lists($this->table_detail.' AS c',$select,$this->key.' = '.intval($_GET['id']),$ordering,'',$other);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->id = $row[$this->key_detail];
			$list[$i]->pro_id = $row['pro_id'];
			$list[$i]->pro_price = $row['pro_price'];
			$list[$i]->name = $row['name'];
			$list[$i]->quantity = $row['quantity'];
            $list[$i]->chiphitamtinh = $row['chiphitamtinh'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function save(){
	       if($_SESSION['member_id']!=''){
	           
               $ma_nhanvien =$_SESSION['member_id'];
	       }
           else {
            
                $ma_nhanvien =1;
           }
		    $input_order = array( 'customer' => clear($_POST['name']),
                            'ma_nhanvien'=>$ma_nhanvien,
                            'ma_website'=>$_POST['maweb'],
		    				'company' => clear($_POST['company']),
		    				'address' => clear($_POST['address']),
		    				'mobile' => clear($_POST['tel']),
                            'email' => clear($_POST['email']),
                            'yahoo' => clear($_POST['nick_yahoo']),
                            'skype' => clear($_POST['nick_skype']),
                            'tenmien' => clear($_POST['tenmien']),
                            'tenmien_sudung' => clear($_POST['tenmien_sudung']),
                            'hotro' => clear($_POST['hotro']),
                            'hosting' => clear($_POST['hosting']),
                            'giaodien' => clear($_POST['giaodien']),
                            'logo' => clear($_POST['logo']),
                            'banner' => clear($_POST['banner']),
                            'ten_cty_banner' => clear($_POST['ten_cty_banner']),
                            'slogan' => clear($_POST['slogan']),
		    				'note' => clear($_POST['thongtinkhac']),
		    				'banquyen' => $_POST['banquyen'],
		    				'date_up' => date('Y-m-d h:m:s')
	       );
    		
    		if(!$this->db->insert_record($this->table,$input_order)){
    		  
                  // get order_id of order
    			$row = $this->db->detail($this->table,$this->key, '',$this->key." DESC");
    			$order_id = $row[$this->key];
    			
    			$input_order_detail = array( 
    							'order_id' => $order_id,
    							'pro_price' => $_POST['gia'],
    							'pro_id' => $_POST['maweb'],
                                'chiphitamtinh' => $_POST['chiphitamtinh'],
    							'quantity' => '1',
    			);
                
        		if(!$this->db->insert_record($this->table_detail,$input_order_detail,0))
                {
                    echo "success";
                }
                else{
                    echo "Cannot insert order detail.";
                }
                
                    //Staff mail
                if($_SESSION['member_email']!=''){
                    
                    $to      = $_SESSION['member_email'];
                    $subject = 'Web Mail - New order.';
                    $message = '
                    <p>Hello <b>'.$_SESSION['member_name'].'</b>!</p>
                    <p>Order code<b>'.$order_id.'</b> has been sent. please visit <a href="http://url/admin" target="_blank">http://url/admin</a> 
                     for details.
                    </p>
                    <p>
                        (c)2010 - @@sitename@@ - http://url
                    </p>
                    
                    ';
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $headers .= 'From: @@emailaddress@@' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                    
                    @mail($to, $subject, $message, $headers);
                    
                }
                    
              
    		}
            else {
                
                echo "Cannot insert order.";
            }
    		
			
    	
    		
			
	}
	function edit(){
		    $input = array( 'status' => '1'
    						);
			$this->db->update_record($this->table,$input,$this->key.'='.$this->getid);
			$this->security->redirect($this->module,'list');
	}
	function delete(){
			$this->db->delete_record($this->table,$this->key,$_POST['cid']);
			$this->delete_detail($this->key);
	}
	function add_cart($id){
		$product = new product;
		if (!$_SESSION['add_cart']){
		$_SESSION['add_cart'] = "'".intval($id)."',";
		}
		else{
			if (strpos(','.$_SESSION['add_cart'],"'".intval($id)."',") == true){?>
				<script language="javascript">
					alert ("<?=CART_ADD_NOTSUCCESS?>");
				</script>
			<?
			return false;
			}
			else{
				$_SESSION['add_cart'] = $_SESSION['add_cart']."'".intval($id)."',";
				?><!--<script language="javascript">
					alert ("<?=CART_ADD_SUCCESS?>");
				</script>--><?
			}
		}
		header_redirect('/order');
	}
	function del_cart ($input){
			$_SESSION['add_cart'] = str_replace("'$input',",'',$_SESSION['add_cart']);
			header_redirect(change_url('index.php?module='.$this->module));
	}
	function show_cart(){
		$product = new product;
		if (!$_SESSION['add_cart']) return false;
		else $input = substr ($_SESSION['add_cart'],0,-1);
		$result = $this->db->lists($product->table,'pro_id,name,alias,price',$product->key." IN ($input)");
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->pro_id = $row['pro_id'];
			$list[$i]->name = $row['name'];
			$list[$i]->alias = $row['alias'];
			$list[$i]->price = $row['price'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;
	}
	function count_cart(){
		if ($_SESSION['add_cart']){
			$cart = '<a href="'.change_url('index.php?module='.$this->module).'">'.CART_COUNT.'<font color ="red"><b>';
			$cart .= count(explode(',',$_SESSION['add_cart'])) - 1;
			$cart .= '  '.PRODUCT_CART.'</b></font></a>';
			return $cart;
		}
	}
	function payment($pay){
		if ($pay == 1)
		return CART_PAYMENT_LIVE;
		if ($pay == 0);
		return CART_PAYMENT_BANK;
	}
	function delete_detail($colum=''){
		$list = 'list';
		if ($colum == ''){
			$colum = $this->key_detail;
			$list = 'form&id='.intval($_GET['id']);
		}
		$this->db->delete_record($this->table_detail,$colum,$_POST['cid']);
		security::redirect($this->module,$list);
	}
}
?>