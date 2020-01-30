<?php
include 'database.php';
include 'session.php';

 class admin{
   private $db;

   public function __construct(){
     $this->db = new database();
   }

   public function adminLogin($data){
     $email   = $data['email'];
     $pass    = $data['pass'];

     if( empty($email) || empty($pass) ){
       $loginMsg = '<div class="alert alert-warning alert-dismissible fade in" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         </button>
         <strong>ERROR!</strong> Fill all fields.
       </div>';
     } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $loginMsg = '<div class="alert alert-warning alert-dismissible fade in" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         </button>
         <strong>ERROR!</strong> Invalied email format.
       </div>';
     } else{
       $pass = md5($pass);
       $sql = 'SELECT * FROM admin WHERE email = :email && pass = :pass';
       $query = $this->db->pdo->prepare($sql);
       $query->bindValue(':email', $email);
       $query->bindValue(':pass', $pass);
       $query->execute();
       $result = $query->fetch(PDO::FETCH_OBJ);
       if($query->rowCount() > 0){

           session::init();
           session::set('login', true);
           session::set('id', $result->id);
           session::set('email', $result->email);
           session::set('loginMsg', '<div class="alert alert-success alert-dismissible fade in" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             </button>
             <strong>WELCOME!</strong> Koser Uddin Medical Hospital Management System
           </div>');

           $loginMsg = '<div class="alert alert-success alert-dismissible fade in" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             </button>
             <strong>Login successful!</strong> Koser Uddin Medical Hospital Management System.
           </div>';

           header('Location: home.php');
         } else{
           $loginMsg = '<div class="alert alert-warning alert-dismissible fade in" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             </button>
             <strong>ERROR!</strong> Incorrect username or password.
           </div>';
         }
     }
   echo $loginMsg;
 }
}

 ?>
