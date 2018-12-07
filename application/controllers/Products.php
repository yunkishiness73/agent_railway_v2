<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{

    function  __construct(){
        parent::__construct();
        
        // Load paypal library & product model
        $this->load->library('paypal_lib');
        $this->load->model('product');
        $this->load->model('ve_model');
    }
    
    
    function buy() {

        // Set variables for paypal form
        $returnURL = base_url().'paypal/success';
        $cancelURL = base_url().'paypal/cancel';
        $notifyURL = base_url().'paypal/ipn';
        
        // Get product data from the database
         $product = [];
        foreach($_SESSION['tickets'] as $ticket){
            $product[] = $this->ve_model->dataTicketsCart($ticket);
        }

        // Get current user ID from the session

        $userID = 0;
        $item_name = 'item_name_';
        $item_number = 'item_number_';
        $amount = 'amount_';
        $quantity = 'quantity_';

        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('custom', $userID);

        foreach ($product as $key => $value) {

            $item_name .= intval($key)+1;
            $item_number .= intval($key)+1;
            $amount .= intval($key)+1;
            $quantity .= intval($key)+1;

            $this->paypal_lib->add_field($item_name, $value->ten_ghe);
           
            $this->paypal_lib->add_field($item_number, $value->id);
            $this->paypal_lib->add_field($amount,  1);
            $this->paypal_lib->add_field($quantity,  1);

            $item_name = 'item_name_';
            $item_number = 'item_number_';
            $amount = 'amount_';
            $quantity = 'quantity_';

            $this->ve_model->autoCancelBookTicket($value->id);

        }

        // Render paypal form
        $this->paypal_lib->paypal_auto_form();
    
    }
}