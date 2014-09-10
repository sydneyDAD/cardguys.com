<?php

class xmlfeed{
	var $table = '8x_xmlfeed';
	var $key = 'tbl_id';

	function xmlfeed(){
		$this->db = new database;
	}
	function detail($select='',$id=''){
		if ($id == '')
		$id = intval($_GET['id']);
		return $this->db->detail($this->table,$select,$this->key.' = '.$id);
	}
	function lists(){
	
		$result = $this->db->lists($this->table,'*');
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->OfferId = $row['OfferId'];
			$list[$i]->OfferName = $row['OfferName'];
			$list[$i]->BigCreative = $row['BigCreative'];
			$list[$i]->TextDetails = $row['TextDetails'];
			$list[$i]->PurchaseIntroRate = $row['PurchaseIntroRate'];
			$list[$i]->PurchaseIntroPeriod = $row['PurchaseIntroPeriod'];
			$list[$i]->PurchaseGoToRate = $row['PurchaseGoToRate'];
			$list[$i]->TransferFee = $row['TransferFee'];
			$list[$i]->AnnualFee = $row['AnnualFee'];
			$list[$i]->CreditType = $row['CreditType'];
			$list[$i]->tbl_id = $row['tbl_id'];
			$list[$i]->card_cty = $row['card_cty'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function loadxml(){
           $xmlarray=$this->get_accounturl();           
           if(is_array($xmlarray)){
            foreach($xmlarray as $arrkk=>$arrvv){
            $ods="";            
            $xmls = new SimpleXMLElement($arrvv,null,true);
            $ods = $xmls->xpath('products/product');
           
            $i=0;
            
           // current list id
            foreach($ods as $od){
                $newdata[$i] = (string)$od->id;
                $i++;
            }
            
            
            $rs = $this->db->lists($this->table,'OfferId');
            $o =0;
            $olddata= array();
            while($rss = $this->db->fetch_array($rs))
            {
                $olddata[$o]=$rss['OfferId'];
                $o++;
            }
             
            $rs = $this->db->lists($this->table,'OfferId');
            $o =0;
            $xmldata = array();
            while($rss = $this->db->fetch_array($rs))
            {
                $xmldata[$o]=$rss['OfferId'];
                $o++;
            }
            
           $data = array_diff($newdata,$olddata);
           $data = array_diff($data,$xmldata);
		   
           $a=0;
            foreach($ods as $od)
            {
					$BalTrans = (string)$od->balanceTransferIntroApr;
					$RegApr = (string)$od->regularApr;
					$IntrAPR =(string)$od->introApr;
					
                    $input = array( 
                            'OfferId' => (string)$od->id,	  											//id
		    				'AnnualFee' => (string)$od->annualFee, 										//annualFee
		 					'RedirectLink' => (string)$od->url."&sid=20195",  										//url
		    				'CreditType' => (string)$od->creditNeeded, 	 								//creditNeeded
		    				'TextDetails' => mysql_real_escape_string((string)$od->description),	  	//description
		    				'BigCreative' => 'http://www.imgsynergy.com/standard/'.(string)$od->imagePath, 	//imagePath
		    				'PurchaseIntroRate' => $IntrAPR,		 					 	
//introApr
		    				'PurchaseIntroPeriod' => (string)$od->introAprPeriod,	 				 	//introAprPeriod
		    				'OfferName' => (string)$od->name, 										 	//name
		    				'PurchaseGoToRate' => $RegApr,		 					 	
//regularApr
                            'TransferIntroRate' => $BalTrans, 			 	
//balanceTransferGoToRate
                            'TransferIntroPeriod' => (string)$od->balanceTransferIntroAprPeriod,	 	//balanceTransferIntroAprPeriod
                            'TransferGoToRate'=>(string)$od->balanceTransferGoToRate, 				 	//balanceTransferGoToRate
                            'LateFee' => (string)$od->lateFee, 										 	//lateFee
                            'CashAdvancedFee' => (string)$od->cashAdvanceFee, 						 	//cashAdvanceFee
                            'CashAdvancedGoToRate' => (string)$od->cashAdvanceGoToRate, 			 	//cashAdvanceGoToRate
                            'PenaltyGoToRate' => (string)$od->penalityGoToRate, 					 	//penaltyGoToRate
                            'TransferFee' => (string)$od->balanceTransferFee, 						 	//balanceTransferFee
                            'Issuer' => (string)$od->issuer, 										 	//issuer
                            'Private' => ' ', 													 		//''
                            'Perks' => mysql_real_escape_string((string)$od->shortDescription),		 	//shortDescription
                            'card_cty'=>$arrkk 												 			//we have to input card type here as defined 1,2,3,4,5,6 type, bank, international etc
    						);

    			$offerid=trim((string)$od->id);
    			if(trim($offerid))
    			if(!isset($olddata[$offerid])){
	              if($this->db->insert_record($this->table,$input,0)){	               
	               if($this->feed){
					echo "Write error while tring to access the internal xml database ".$this->table;
	               }else{
                    echo "Error(101): Please try again later.";
                    }
                    exit;
                   
	              }if($this->feed && $this->write_saves){$this->save_one_card($od->id,$input);}
					
                }else{ //update do not write new data
					$mywhere="OfferId='".$offerid."'";
				  $this->db->mysql_error='';$this->db->update_record($this->table,$input,$mywhere,0);
				  if($this->db->mysql_error){	               
	               if($this->feed){
					echo "Update error while tring to access the internal xml database ".$this->table;
					echo $this->glob_update."<br>";

					echo "<br>".$this->db->mysql_error;
					exit;
					
	               }else{
                    echo "Error(102): Please try again later.";
                    }
                    exit;
                   
	              }if($this->feed && $this->write_saves){$this->save_one_card($od->id,$input);}
                }
                
                $a++;
            }
            unset($xmls);
            }}else{
                   if($this->feed){
                   echo "There was an error accessing the xml accounts";
                   }else{
					echo "Error (103): Please try again later.";
                   }
                    exit;
                  }
            if(!$this->feed){
            $str = "success";
        	echo trim($str);
		   }else{
		   //echo "test success!";
		   }
			
	}
	
	function get_accounturl($bit=0){
	 $xmlarray=array(
            1=>"http://feeds.cardsynergy.com/datafeed/?aid=120177&v=2"
            );
            $bit=($bit && $bit>1)?0:$bit;
            return ($bit)?$xmlarray[1]:$xmlarray;
	}
	
	function save_one_card($id,$myinput=""){
			

			if($id && is_array($myinput) && $this->feed && $this->write_saves){
				$newinput=array();
				foreach($myinput as $kk=>$vv){
					$newinput[$kk]=($vv && !is_numeric($vv))?mysql_real_escape_string($vv):$vv;
				}
				
				$input=$newinput;				
				
				$this->db->mysql_error="";
				$getrows=$this->db->query("SELECT tbl_id FROM 8x_creditcard WHERE OfferId='$id'");
				$get_chk=$this->db->fetch_assoc($getrows);
				if(isset($get_chk['tbl_id']) && $get_chk['tbl_id']){ //update
				$mywhere="tbl_id='".trim($get_chk['tbl_id'])."'";
				$this->db->update_record('8x_creditcard',$input,$mywhere,0);
				if($this->db->mysql_error){
					echo "Write error while trying to access 8x_creditcard database";return false;
				}else{
				}
				}else{ //new write
				$input['Textdisplay']='';
                $input['footer_text']='';
                $input['asign_article']='';
                $input['sapxep']='';
				if($this->db->insert_record('8x_creditcard',$input,0) || $this->db->mysql_error){
					echo "Write error while trying to access 8x_creditcard database.";return false;
				}else{
					//echo "success ".$id."<br>";
				}}
			}else{
            			$getrows=$this->db->query("SELECT * FROM ".$this->table." WHERE OfferId='$id'");
			$getitnow=$this->db->fetch_assoc($getrows);
			
			$xmlurl=$this->get_accounturl($getitnow['card_cty']);
			if(!$xmlurl || is_array($xmlurl)){return false;exit;}        
				$BalTrans = (string)$getitnow['TransferIntroRate'];
					$IntrAPR = (string)$getitnow['PurchaseGoToRate'];
					$RegApr = (string)$getitnow['PurchaseIntroRate'];
					
				//manual card updates
                if($getitnow['OfferId']==(int)$id){  
                    $input = array(  
                            'OfferId' => (string)$getitnow['OfferId'],	  								//id
		    				'AnnualFee' => (string)$getitnow['AnnualFee'], 								//annualFee
		 					'RedirectLink' => (string)$getitnow['RedirectLink'],  						//url
		    				'CreditType' => (string)$getitnow['CreditType'], 	 						//creditNeeded
		    				'TextDetails' => mysql_real_escape_string((string)$getitnow['TextDetails']),//description
		    				'BigCreative' => (string)$getitnow['BigCreative'], 							//imagePath
		    				'PurchaseIntroRate' => $RegApr,			 	
//introApr
		    				'PurchaseIntroPeriod' => (string)$getitnow['PurchaseIntroPeriod'],		 	//introAprPeriod
		    				'OfferName' => (string)$getitnow['OfferName'], 							 	//name
		    				'PurchaseGoToRate' => $IntrAPR,			 	
//regularApr
                            'TransferIntroRate' => $BalTrans, 			 	
//balanceTransferGoToRate
                            'TransferIntroPeriod' => (string)$getitnow['TransferIntroPeriod'],		 	//balanceTransferIntroAprPeriod
                            'TransferGoToRate'=>(string)$getitnow['TransferGoToRate'], 				 	//balanceTransferGoToRate
                            'LateFee' => (string)$getitnow['LateFee'],								 	//lateFee
                            'CashAdvancedFee' => (string)$getitnow['CashAdvancedFee'], 				 	//cashAdvanceFee
                            'CashAdvancedGoToRate' => (string)$getitnow['CashAdvancedGoToRate'],	 	//cashAdvanceGoToRate
                            'PenaltyGoToRate' => (string)$getitnow['PenaltyGoToRate'],				 	//penaltyGoToRate
                            'TransferFee' => (string)$getitnow['TransferFee'], 						 	//balanceTransferFee
                            'Issuer' => (string)$getitnow['Issuer'],								 	//issuer
                            'Perks' => mysql_real_escape_string((string)$getitnow['Perks']).' ',	 	//shortDescription
                            'card_cty'=>$getitnow['card_cty'],								 			//we have to input card type here as defined 1,2,3,4,5,6 type, bank, international etc                           
    						);
    						
				$getrows=$this->db->query("SELECT tbl_id FROM 8x_creditcard WHERE OfferId='$id'");
				$get_chk=$this->db->fetch_assoc($getrows);
				if(isset($get_chk['tbl_id']) && $get_chk['tbl_id']){ //update
				$mywhere="tbl_id='".trim($get_chk['tbl_id'])."'";$this->db->mysql_error="";
				$this->db->update_record('8x_creditcard',$input,$mywhere,0);
				if($this->db->mysql_error){
				 //echo $this->db->mysql_error;
                    return false;
				} return true;exit;
				}else{
				  $this->db->mysql_error="";
				  $input['Private']='';
				  $input['Textdisplay']='';
                  $input['footer_text']='';
                  $input['asign_article']='';
                  $input['sapxep']='';  
				  if($getme=$this->db->insert_record('8x_creditcard',$input,0) || $this->db->mysql_error){
                    //echo $this->db->mysql_error;
                    return false;
                    exit;
                   
	              }return true;exit;
				}
               }
            
            
            }
            return false;
		   
			
	}
	function clearxml(){
	
			return $this->db->delete_all($this->table);
			
	}
    function delete_one($colum = '',$card_id){
		if ($colum == ''){
			$colum = $this->key;
		}
		return $this->db->delete_one_record($this->table,$colum,$card_id);
			
	}
	
}
?>