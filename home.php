<?php
$page = "home";
  include 'inc/base.php';
  include 'inc/header.php';
  include 'inc/sidebar.php'; //sidebar menu
  include 'inc/top-nav.php'; //more option section
  include 'lib/patient.php';
  $patient = new patient();
 ?>

        <!-- page content -->
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <?php
                echo session::get('loginMsg');
                session::set('loginMsg', '');
               ?>
              <div class="x_title">
                <h2>Add new patient <small>( fill all patient information )</small></h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />

                <?php
                  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
                    $patient->addPatient($_POST);
                    $name = $_POST['name'];
                    $age = $_POST['age'];
                    $phone = $_POST['phone'];
                    $gender = $_POST['gender'];
                    $referred_by = $_POST['referred_by'];
                    $doctor_name = $_POST['doctor_name'];
                    $intensive = $_POST['intensive'];
                    $doctor_fee = $_POST['doctor_fee'];
                  }

                  if (session::get('reset') == true) {
                    $name = '';
                    $age = '';
                    $phone = '';
                    $gender = 'male';
                    $referred_by = '';
                    $doctor_name = '';
                    $intensive = '';
                    $doctor_fee = '';
                    session::set('reset', false);
                  } else{
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
                      $gender = $_POST['gender'];
                    } else{
                      $gender = 'male';
                    }
                  }

                 ?>

                <form id="demo-form2" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                  <!-- <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Patient ID <span class="0">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="" id="first-name" required="required" value="2145" disabled class="form-control col-md-7 col-xs-12">
                    </div>
                  </div> -->

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="0">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="name" value="<?php echo isset($name)? $name: ''; ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Age <span class="0">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="number" name="age" value="<?php echo isset($age)? $age: ''; ?>" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                      <?php $patient->age_err(); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Gender*
                    </label>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="radio">
                        <label>
                          <input type="radio" class="flat" value="male" <?php echo $gender=='male'? 'checked': ''; ?> name="gender"> Male
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" class="flat" value="female" <?php echo $gender=='female'? 'checked': ''; ?> name="gender"> Female
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" class="flat" value="other" <?php echo $gender=='other'? 'checked': ''; ?> name="gender"> Other
                        </label>
                      </div>
                      <?php $patient->gender_err(); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone No. <span class="0">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="birthday" type="number" value="<?php echo isset($phone)? $phone: ''; ?>" name="phone" class="date-picker form-control col-md-7 col-xs-12" required="required">
                      <?php $patient->phone_err(); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Referred By <span class="0">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="referred_by" value="<?php echo isset($referred_by)? $referred_by: ''; ?>" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Intensive <span class="0">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="number" name="intensive" value="<?php echo isset($intensive)? $intensive: ''; ?>" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                      <?php $patient->intensive_err(); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Doctor's name <span class="0">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="doctor_name" value="<?php echo isset($doctor_name)? $doctor_name: ''; ?>" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Doctor's fee <span class="0">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="number" name="doctor_fee" value="<?php echo isset($doctor_fee)? $doctor_fee: ''; ?>" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                      <?php $patient->doctor_fee_err(); ?>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="margin-top: -10px;">
                      <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                      <button type="submit" name="add" class="btn btn-success" style="min-width: 275px; margin-top: 10px;">Add Patient</button>
                        <button class="btn btn-primary" type="reset" style="margin-top: 10px;">Clear</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php
  include 'inc/footer.php';
?>

<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="vendors/moment/min/moment.min.js"></script>
<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="build/js/custom.min.js"></script>
  </body>
</html>
