    <?php $this->load->view('header') ?>
    <?php $this->load->view('sidebar') ?>
    <!-- Main content -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Question 2</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="welcome">Home</a></li>
                  <li class="breadcrumb-item active">Question 2</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body table-responsive" style="height: 700px;">

                    <table cellpadding="3" cellspacing="0" border="0">
                      <tbody>
                        <tr id="filter_col2" data-column="1">
                          <td>Polling Units</td>
                          <td align="center">
                            <select class="column_filter" id="col1_filter" autofocus="true">
                              <option value=""></option>
                              <?php 
                                foreach ($indi_pu_results as $key => $value){ ?>
                                  <option><?php echo $value->polling_unit_uniqueid; ?></option>
                                <?php } ?>
                            </select>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <table class="table table-head-fixed text-nowrap" id="myDatatable">
                      <thead>
                        <tr>
                          <th>SN</th>
                          <th>POLLING UNIT</th>
                          <th>PARTY</th>
                          <th>SCORE</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td><strong>TOTAL</strong></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php foreach ($indi_pu_results as $key => $value){ ?>
                        <tr>
                          <td><?php echo $value->result_id; ?></td>
                          <td><?php echo $value->polling_unit_uniqueid; ?></td>
                          <td><?php echo $value->party_abbreviation; ?></td>
                          <td><?php echo $value->party_score; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
        <!-- /.content-wrapper -->
        </section>
      </div>

    <!-- END-Main content -->
    <?php $this->load->view('footer') ?>