<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey extends CI_Controller {

    protected $gold_count = 0,
     $activity = array();

    public function __construct()
    {
      parent::__construct();
		$this->gold_count = $this->session->userdata('gold_count');
		$this->activity = $this->session->userdata('activity');
    }

	  public function index()
  	{
  		$this->load->view('index');
  	}

    public function process()
    {
      $post_data = $this->input->post();

      if(isset($post_data['action']) && $post_data['action'] == 'restart_form')
        {
          $this->session->sess_destroy();
          redirect(base_url());
        }

        if(isset($post_data['building']))
        {
          $gold_count = 0;
          $class = 'green';

          switch($post_data['building'])
          {
            case 'farm':
            $gold_count = rand(10,20);
            break;

            case 'cave':
            $gold_count = rand(5,10);
            break;

            case 'house':
            $gold_count = rand(2,5);
            break;

            case 'casino':
            $percent = rand(0,100);

            if($percent <=70)
            {
              $gold_count = rand(-50,-1);
              $class = 'red';
              $message = 'Ouch';
            }
            else
            {
              $gold_count = rand(1,50);
              $class= 'green';
              $message = 'Nice';
            }
            break;

          }
        }
        if(!empty($this->activity))
        $this->session->set_userdata('activity');
        if($post_data['building'] == 'casino' && $gold_count < 0)
        $this->activity[]= "<p class='red'>You entered a " . $post_data['building'].  " and lost " . abs($gold_count) ." gold coins. OUCH! ". date('M d, Y h:ia')."</p>";
        else if
        ($post_data['building'] == 'casino' && $gold_count > 0)
        $this->activity[]= "<p class='green'>You entered a " . $post_data['building'].  " and won " . $gold_count ." gold coins. WOW! ". date('M d, Y h:ia')."</p>";
        else
        $this->activity[]= "<p class='green'>You entered a " . $post_data['building'].  "and earned " . $gold_count ." gold coins. NICE! ". date('M d, Y h:ia')."</p>";



        $gold_count += $this->session->userdata('gold_count');
        $this->session->set_userdata('gold_count', $gold_count);
        $this->session->set_userdata('activity', $this->activity);

        redirect(base_url());
       }
}
