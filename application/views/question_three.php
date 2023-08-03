    <?php $this->load->view('header') ?>
    <?php $this->load->view('sidebar') ?>
    <!-- Main content -->
    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

      <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Question 3</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Question 3</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Uploads Details</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <?php
                  if ($this->session->flashdata('successsubmit')) {
                    echo "<div class='alert alert-success successsubmit' role='alert'>";
                    echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                    echo "<span aria-hidden='true'>&times;";
                    echo "</span></button>";
                    echo $this->session->flashdata('successsubmit');
                    echo "</div>";
                  }
                ?>
                <?php
                  echo form_open(base_url('upldrslts'), array(
                      'method'=>'POST',
                      'id'=>'needs-validation',
                      'enctype'=>'multipart/form-data',
                      'novalidate'=>''
                  ));
                ?>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleSelectOption">States</label>
                      <select class="form-control column_filter" id="statesnames" name="statesnames" autofocus="true">
                        <option value="">---</option>
                        <?php 
                          foreach ($states_list as $key => $value){ ?>
                            <option value="<?php echo $value->state_id; ?>"><?php echo $value->state_name; ?>
                            </option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectOption">LGA</label>
                      <select class="form-control column_filter" id="lganames" name="lganames" autofocus="true">
                        <option value="">---</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleSelectOption">Ward</label>
                      <select class="form-control column_filter" id="wardsnames" name="wardsnames" autofocus="true">
                        <option value="">---</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName">New Polling Unit Name</label>
                      <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Polling Unit Name" required="" name="pollingunitname">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputID">New Polling Unit Unique ID</label>
                      <input type="number" class="form-control" id="exampleInputID" placeholder="Enter Polling Unit ID" required="" name="pollingunitid">
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectOption">Parties</label>
                      <select class="form-control column_filter" id="partiesnames" name="partiesnames" autofocus="true">
                        <option value="">---</option>
                        <?php 
                          foreach ($parties_list as $key => $value){ ?>
                            <option value="<?php echo $value->partyid; ?>"><?php echo $value->partyname; ?>
                            </option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName">Party Score</label>
                      <input type="number" class="form-control" id="exampleInputName" placeholder="Enter Party Score" required="" name="pollingunitscore">
                    </div>

                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1" required="">
                      <label class="form-check-label" for="exampleCheck1"><span style="color: red;">Carefully crosschecked and confirmed no error!</span></label>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                <!-- </form> -->
                <?php echo form_close(); ?>
              </div>
              <!-- /.card -->

            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        
      </div>
      <!-- /.content-wrapper -->
    <!-- END-Main content -->

    <script>
      (function() {
    "use strict";
    window.addEventListener("load", function() {
      var form = document.getElementById("needs-validation");
      form.addEventListener("submit", function(event) {
        if (form.checkValidity() == false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add("was-validated");
      }, false);
    }, false);
  }());
  </script>

  <!-- Auto-Dismissible Success Alert -->
  <script>
    window.setTimeout(function() {
        $(".successsubmit").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
        });
    }, 2000);
  </script>
  <!-- END - Auto-Dismissible Success Alert -->
    <?php $this->load->view('footer') ?>