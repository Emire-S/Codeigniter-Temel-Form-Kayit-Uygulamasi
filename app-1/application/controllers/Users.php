<?php
class users extends CI_Controller
{
    /**
     * @var object|null
     */
    public $user_model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_Model", "user_model");
    }

    public function index()
    {
$users = $this->user_model->get_all("created_at DESC");
$viewData = new stdClass();
$viewData->kullanicilar = $users;
$viewData ->users = $users;
$this->load->view("Users_v", $viewData);




       // $this->load->view("Users_v");
    }

    
    public function save()
    {
        // kütüphane önyükleme işlemi
        $this->load->library("form_validation");

        // kuralların belirlenmesi
        $this->form_validation->set_rules("name", "kullanıcı adı", "required|trim");
        $this->form_validation->set_rules("surname", "soyad", "required|trim");
        $this->form_validation->set_rules("email", "email", "required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password", "şifre", "required|trim|min_length[6]");
        $this->form_validation->set_rules("re-password", "şifre tekrar", "required|trim|matches[password]");

        //hata mesajlarının belirlenmesi
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "<b>{field}</b> alanı geçerli bir email adresi olmalıdır",
                "is_unique" => "<b>{field}</b> alanı benzersiz olmalıdır",
                "min_length" => "<b>{field}</b> alanı en az {6} karakter olmalıdır",
                "mathces" => "<b>{field}</b> alanı ile </b> alanı eşleşmelidir"     )
        );

        //validasyon işlemi kuralları çalıştırılır
        $validation = $this->form_validation->run();

        if($validation) {
            echo "validasyon başarılı kayıt başlar";

            $data = array(
            "name"        => $this->input->post("name"),
            "surname"     => $this->input->post("surname"),
            "email"       => $this->input->post("email"),
            "password"    => md5($this->input->post("password"))
            //"re-password" => $this->input->post("re-password")
        );
        //print_r($data);

        $insert = $this->user_model->add($data);
        if ($insert) {
            echo "kayıt işlemi başarılı";
        } else {
            echo "kayıt işlemi başarısız";
        }
        } else {
            

            $viewData = new stdClass();
            $viewData->formError = true;
            $this->load->view("Users_v" , $viewData);
            
      
    }
    }
        //echo "kayıt formu işlemi";    
        //print_r($this->input->post());
    
    
    public function getall()
    {
             $users = $this->user_model->get_all("created_at DESC");
            echo "<pre>";
            print_r($users);
            echo "</pre>";
    }  
 



    public function get()
    {
        $user = $this->user_model->get(
            array(
                "id" => 1
                )
                );
        echo "<pre>";
        print_r($user);
        echo "</pre>";
    }
}





//echo "kayıt formu işlemi";    


        //echo "Form name: " . $this->input->post("name") . "<br>";
        //echo "Form surname: " . $this->input->post("surname") . "<br>";
        //echo "Form email: " . $this->input->post("email") . "<br>";
        //echo "Form password: " . $this->input->post("password") . "<br>";
        //echo "Form re-password:" . $this->input->post("re-password") . "<br>"