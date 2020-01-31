<?php
include 'database.php';

class patient{

  private $db;
  function __construct(){
    $this->db = new database();
  }

  public function clear($data){
    $data='';
  }

  public $age_err='';
  public function age_err(){
      echo $this->age_err;
      $this->age_err='';
  }

  public $gender_err='';
  public function gender_err(){
      echo $this->gender_err;
      $this->gender_err='';
  }

  public $phone_err='';
  public function phone_err(){
      echo $this->phone_err;
      $this->phone_err='';
  }

  public $intensive_err='';
  public function intensive_err(){
      echo $this->intensive_err;
      $this->intensive_err='';
  }

  public $doctor_fee_err='';
  public function doctor_fee_err(){
      echo $this->doctor_fee_err;
      $this->doctor_fee_err='';
  }

  public function addPatient($data){

      $name        =  $data['name'];
      $age         =  $data['age'];
      $gender      =  $data['gender'];
      $phone       =  $data['phone'];
      $referred_by =  $data['referred_by'];
      $intensive   =  $data['intensive'];
      $doctor_name =  $data['doctor_name'];
      $doctor_fee  =  $data['doctor_fee'];

        if ( empty($name) || empty($age) || empty($gender) || empty($phone) || empty($referred_by) || empty($intensive) || empty($doctor_name) || empty($doctor_fee) ) {
          echo '<div class="alert alert-danger alert-dismissible fade in text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>ERROR!</strong> Fill all fields.
          </div>';
        } else if( !is_numeric($age) ){
          echo '<div class="alert alert-danger alert-dismissible fade in text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>ERROR!</strong> Fill all fields correctly.
          </div>';
          $this->age_err = '<i class="text-danger"> <i class="fa fa-warning"></i> Age must be a number </i>';
          $this->clear($age);
        } else if ( $gender!='male' && $gender!='female' && $gender!='other' ) {
          echo '<div class="alert alert-danger alert-dismissible fade in text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>ERROR!</strong> Fill all fields correctly.
          </div>';
          $this->gender_err = '<i class="text-danger"> <i class="fa fa-warning"></i> Gender must be male/female/other </i>';
        } else if ( !is_numeric($phone) || strlen($phone)!=11 || $phone[0]!=0 || $phone[1]!=1 ) {
          echo '<div class="alert alert-danger alert-dismissible fade in text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>ERROR!</strong> Fill all fields correctly.
          </div>';
          $this->phone_err = '<i class="text-danger"> <i class="fa fa-warning"></i> phone number must be 11 digit number starting with 01 </i>';
        } else if( !is_numeric($intensive) ){
          echo '<div class="alert alert-danger alert-dismissible fade in text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>ERROR!</strong> Fill all fields correctly.
          </div>';
          $this->intensive_err = '<i class="text-danger"> <i class="fa fa-warning"></i> Intensive must be a number </i>';
        } else if( !is_numeric($doctor_fee) ){
          echo '<div class="alert alert-danger alert-dismissible fade in text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>ERROR!</strong> Fill all fields correctly.
          </div>';
          $this->doctor_fee_err = '<i class="text-danger"> <i class="fa fa-warning"></i> doctor fee must be a number </i>';
        } else{
          // insert to database
          $sql = 'INSERT INTO patient_data(name, age, gender, phone, referred_by, intensive, doctor_name, doctor_fee) VALUES(:name, :age, :gender, :phone, :referred_by, :intensive, :doctor_name, :doctor_fee)';
          $query = $this->db->pdo->prepare($sql);
          $query->bindValue(':name', $name);
          $query->bindValue(':age', $age);
          $query->bindValue(':gender', $gender);
          $query->bindValue(':phone', $phone);
          $query->bindValue(':referred_by', $referred_by);
          $query->bindValue(':intensive', $intensive);
          $query->bindValue(':doctor_name', $doctor_name);
          $query->bindValue(':doctor_fee', $doctor_fee);
          $query->execute();
          session::set('reset', true);
          session::set('patient_status', '<div class="alert alert-success alert-dismissible fade in text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>SUCCESS!</strong> Patient added to database.
          </div>');
          // header('Location: ../home.php');
          ?>
            <script type="text/javascript">
              window.location.href = "home.php";
            </script>
          <?php
          // insert to database
        }

  }

}

 ?>
