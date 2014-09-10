<?php

class credit_cards {

    var $table = '8x_creditcard';
    var $key = 'tbl_id';
    var $order = 'OfferId';
    var $module = 'credit-cards';
    var $path = 'upload/product/';
    var $pathadm = '../upload/product/';
    var $path_other = 'upload/product_images/';
    var $path_otheradm = '../upload/product_images/';
    var $max_width = '200';

    function credit_cards() {
        $this->db = new database;
    }

    function delete($colum = '') {
        if ($colum == '') {
            $colum = $this->key;
        }
        $this->db->delete_record($this->table, $colum, $_POST['cid'], $this->pathadm);
        $this->db->delete_record($this->table_image, $colum, $_POST['cid'], $this->path_otheradm);
        security::redirect('cards', 'list_credit_cards');
    }

    function detail($select = '', $id = '') {
        if ($id == '')
            $id = intval($_GET['id']);
        return $this->db->detail($this->table, $select, $this->key . ' = ' . $id);
    }

    function detail2($select = '', $id = '') {
        if ($id == '')
            $id = intval($_GET['id']);
        return $this->db->detail($this->table, $select, $this->order . ' = ' . $id);
    }

    function detail1($select = '', $id = '', $args = '') {
        $id = intval($id);
        $my_args = ($args) ? $args : '';

        $return = $this->db->detail($this->table, $select, $this->order . ' = ' . $id . $args);


        return $return;
    }

    function detail3($select = '', $id = '') {

        $id = intval($_GET['id']);
        return $this->db->detail($this->table, $select, $this->key . ' = ' . $id);
    }

    function edit() {

        $articles = (isset($_POST['asign_article'])) ? implode(",", $_POST['asign_article']) : ' ';
        $sapx = (isset($_POST['sapxep'])) ? implode(",", $_POST['sapxep']) : ' ';
        $input = array('AnnualFee' => clear($_POST['AnnualFee']),
            'alias' => clear($_POST['alias']),
            'OfferName' => $_POST['name'],
            'RedirectLink' => $_POST['RedirectLink'],
            'CreditType' => $_POST['CreditType'],
            'TextDetails' => addslashes($_POST['TextDetails']),
            'Textdisplay' => $_POST['Textdisplay'],
            'PurchaseIntroRate' => $_POST['PurchaseIntroRate'],
            'PurchaseIntroPeriod' => $_POST['PurchaseIntroPeriod'],
            'PurchaseGoToRate' => $_POST['PurchaseGoToRate'],
            'TransferIntroRate' => $_POST['TransferIntroRate'],
            'TransferIntroPeriod' => $_POST['TransferIntroPeriod'],
            'TransferGoToRate' => $_POST['TransferGoToRate'],
            'LateFee' => $_POST['LateFee'],
            'CashAdvancedFee' => $_POST['CashAdvancedFee'],
            'CashAdvancedGoToRate' => $_POST['CashAdvancedGoToRate'],
            'PenaltyGoToRate' => $_POST['PenaltyGoToRate'],
            'TransferFee' => $_POST['TransferFee'],
            'Issuer' => $_POST['Issuer'],
            'Private' => $_POST['Private'],
            'Perks' => addslashes($_POST['Perks']),
            'header_text' => $_POST['header_text'],
            'footer_text' => $_POST['footer_text'],
            'title_text' => $_POST['title_text'],
            'keywords_text' => $_POST['keywords_text'],
            'description_text' => $_POST['description_text'],
            'ordering' => intval($_POST['ordering']),
            'top' => intval($_POST['top']),
            'good' => intval($_POST['good']),
            'asign_article' => $articles,
            'sapxep' => $sapx,
            'card_slogan' => clear($_POST['card_slogan'])
        );




        if (clear($_POST['assign_banner']) != "") {
            $input['BigCreative'] = clear($_POST['assign_banner']);
        }
        $this->db->update_record($this->table, $input, $this->key . '=' . $_GET['id']);
        security::redirect('cards', 'list_credit_cards');
    }

    function lists_name() {

        $result = $this->db->lists($this->table, 'OfferId,OfferName,ordering,top,good');
        $i = 0;
        while ($row = $this->db->fetch_assoc($result)) {
            $list[$i]->OfferId = $row['OfferId'];
            $list[$i]->OfferName = $row['OfferName'];
            $list[$i]->ordering = intval($row['ordering']);
            $list[$i]->top = intval($row['top']);
            $list[$i]->good = intval($row['good']);
            $i++;
        }
        $this->db->free_result($result);
        return $list;
    }

    function lists_in($in_list) {

        $where = " `OfferId` IN($in_list) ";
        $order = " `ordering` ASC ";
        $result = $this->db->lists($this->table, '*', $where, $order);
        $i = 0;
        while ($row = $this->db->fetch_assoc($result)) {
            $list[$i]->OfferId = $row['OfferId'];
            $list[$i]->OfferName = $row['OfferName'];
            $list[$i]->BigCreative = $row['BigCreative'];
            $list[$i]->TextDetails = $row['TextDetails'];
            $list[$i]->Textdisplay = $row['Textdisplay'];
            $list[$i]->PurchaseIntroRate = $row['PurchaseIntroRate'];
            $list[$i]->PurchaseIntroPeriod = $row['PurchaseIntroPeriod'];
            $list[$i]->PurchaseGoToRate = $row['PurchaseGoToRate'];
            $list[$i]->TransferFee = $row['TransferFee'];
            $list[$i]->AnnualFee = $row['AnnualFee'];
            $list[$i]->CreditType = $row['CreditType'];
            $list[$i]->tbl_id = $row['tbl_id'];
            $list[$i]->alias = $row['alias'];
            $list[$i]->top = $row['top'];
            $list[$i]->good = $row['good'];
            $list[$i]->ordering = $row['ordering'];
            $list[$i]->asign_article = $row['asign_article'];
            $list[$i]->sapxep = $row['sapxep'];
            $list[$i]->card_slogan = $row['card_slogan'];
            $i++;
        }
        $this->db->free_result($result);
        return $list;
    }

    function lists($where = '', $orderr = '') {
         $this->db->select($table,$select,$where,$ordering,$limit,$other);
        $thequery=mysql_query($this->db->select($this->table,$select,$where,$ordering,$limit,$other));
        
        if(mysql_error() && (isset($this) && get_class($this)==__CLASS__)){
                    $this->mysql_error=mysql_error();
        }
        
        
        
    
        $i = 0;
        ini_set('error_reporting', E_STRICT);
        while ($row = mysql_fetch_assoc($thequery)) {
            $list[$i]->OfferId = $row['OfferId'];
            $list[$i]->OfferName = $row['OfferName'];
            $list[$i]->BigCreative = $row['BigCreative'];
            $list[$i]->TextDetails = $row['TextDetails'];
            $list[$i]->Textdisplay = $row['Textdisplay'];
            $list[$i]->PurchaseIntroRate = $row['PurchaseIntroRate'];
            $list[$i]->PurchaseIntroPeriod = $row['PurchaseIntroPeriod'];
            $list[$i]->PurchaseGoToRate = $row['PurchaseGoToRate'];
            $list[$i]->TransferIntroRate = $row['TransferIntroRate'];
            $list[$i]->TransferIntroPeriod = $row['TransferIntroPeriod'];
            $list[$i]->TransferFee = $row['TransferFee'];
            $list[$i]->AnnualFee = $row['AnnualFee'];
            $list[$i]->CreditType = $row['CreditType'];
            $list[$i]->tbl_id = $row['tbl_id'];
            $list[$i]->special = $row['special'];
            $list[$i]->ordering = $row['ordering'];
            $list[$i]->top = $row['top'];
            $list[$i]->good = $row['good'];
            $list[$i]->asign_article = $row['asign_article'];
            $list[$i]->sapxep = $row['sapxep'];
            $list[$i]->alias = $row['alias'];
            $list[$i]->card_slogan = $row['card_slogan'];

            $i++;
        }
        $this->db->free_result($result);
        return $list;
    }

    function add() {
        $articles = (isset($_POST['asign_article'])) ? implode(",", $_POST['asign_article']) : "";
        $sapx = (isset($_POST['sapxep'])) ? implode(",", $_POST['sapxep']) : "";

        $offeridrand = substr(number_format(time() * rand(), 0, '', ''), 0, 5);
        $input = array('OfferID' => $offeridrand, 'AnnualFee' => clear($_POST['AnnualFee']),
            'alias' => clear($_POST['alias']),
            'BigCreative' => clear($_POST['assign_banner']),
            'OfferName' => $_POST['name'],
            'RedirectLink' => $_POST['RedirectLink'],
            'CreditType' => $_POST['CreditType'],
            'TextDetails' => addslashes($_POST['TextDetails']),
            'Textdisplay' => $_POST['Textdisplay'],
            'PurchaseIntroRate' => $_POST['PurchaseIntroRate'],
            'PurchaseIntroPeriod' => $_POST['PurchaseIntroPeriod'],
            'PurchaseGoToRate' => $_POST['PurchaseGoToRate'],
            'TransferIntroRate' => $_POST['TransferIntroRate'],
            'TransferIntroPeriod' => $_POST['TransferIntroPeriod'],
            'TransferGoToRate' => $_POST['TransferGoToRate'],
            'LateFee' => $_POST['LateFee'],
            'CashAdvancedFee' => $_POST['CashAdvancedFee'],
            'CashAdvancedGoToRate' => $_POST['CashAdvancedGoToRate'],
            'PenaltyGoToRate' => $_POST['PenaltyGoToRate'],
            'TransferFee' => $_POST['TransferFee'],
            'Issuer' => $_POST['Issuer'],
            'Private' => $_POST['Private'],
            'Perks' => addslashes($_POST['Perks']),
            'header_text' => $_POST['header_text'],
            'footer_text' => $_POST['footer_text'],
            'title_text' => $_POST['title_text'],
            'keywords_text' => $_POST['keywords_text'],
            'description_text' => $_POST['description_text'],
            'ordering' => intval($_POST['ordering']),
            'top' => intval($_POST['top']),
            'good' => intval($_POST['good']),
            'asign_article' => $articles,
            'sapxep' => $sapx,
            'card_slogan' => clear($_POST['card_slogan'])
        );
        $this->db->insert_record($this->table, $input);

        security::redirect('cards', 'list_credit_cards');
    }

}

?>