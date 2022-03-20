        <section class="content-header poto-schools">
          <h1>
            Potomanto Schools
            <small>administration</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content poto-schools">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6 col-xs-12">
              <!-- small box -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Add/Remove Country <!-- <span><img src="images/loading.png"/></span> --></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form">

                    <!-- input -->
                    <div class="form-group">
                      <label>Add Country</label>
                      <input type="text" class="form-control" id="country_value" placeholder="Enter New Country To Add"/>
                      <button style="margin-top:1%;" id="country_add_button" class="btn btn-success"><span><i class="fa fa-plus-circle fa-fw"></i></span> Add Country</button>
                    </div>

                    <div class="form-group">
                      <label>Remove Country</label>
                      <select class="form-control" id="country_list">
                        <option value="">Country</option>
                        <?php echo $country; ?>
                      </select>
                       <button style="margin-top:1%;" id="country_remove" class="btn btn-danger"><span><i class="fa fa-close fa-fw"></i></span>Remove Country</button>
                       <button style="margin-top:1%;" onclick="location.reload();" class="btn btn-info"><span><i class="fa fa-refresh fa-fw"></i></span>Refresh</button>
                    </div>


                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->

             <div class="col-lg-6 col-xs-12">
              <!-- small box -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Add New Institution</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form">

                    <div class="form-group">
                      <label>Institution Country</label>
                      <select class="form-control" id="institution_country">
                      <option value="">Country</option>
                       <?php echo $country; ?>
                      </select>
                    </div>

                    <!-- input -->
                    <div class="form-group">
                      <label>Institution Name</label>
                      <input type="text" id="institution_value" class="form-control" placeholder="Institution Name Here"/>
                      <button style="margin-top:1%;" id="institution_add_button" class="btn btn-success"><span><i class="fa fa-plus-circle fa-fw"></i></span> Add Institution</button>
                      <button style="margin-top:1%;" onclick="location.reload();" class="btn btn-info"><span><i class="fa fa-refresh fa-fw"></i></span>Refresh</button>
                    </div>


                    <div class="form-group">
                      <label>Remove Institution</label>
                      <select class="form-control" id="institution_list">
                        <option value="">Select Institution</option>
                        <?php echo $institution; ?>
                      </select>
                       <button style="margin-top:1%;" id="institution_remove_button" class="btn btn-danger"><span><i class="fa fa-close fa-fw"></i></span>Remove Institution</button>
                       <button style="margin-top:1%;" onclick="location.reload();" class="btn btn-info"><span><i class="fa fa-refresh fa-fw"></i></span>Refresh</button>
                    </div>

                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
          </div>


           <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6 col-xs-12">
              <!-- small box -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Add/Remove School</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form">

                     <div class="form-group">
                      <label>Institution Faculty/School Belongs To</label>
                      <select class="form-control" id="faculty_institution">
                        <option value="">Select Institution</option>
                        <?php echo $institution; ?>
                      </select>
                    </div>

                    <!-- input -->
                    <div class="form-group">
                      <label>Add School/Faculty</label>
                      <input type="text" id="faculty_value" class="form-control" placeholder="Enter New School/Faculty Here"/>
                      <button style="margin-top:1%;" id="faculty_add_button" class="btn btn-success"><span><i class="fa fa-plus-circle fa-fw"></i></span> Add School/Faculty</button>
                       <button style="margin-top:1%;" onclick="location.reload();" class="btn btn-info"><span><i class="fa fa-refresh fa-fw"></i></span>Refresh</button>
                    </div>

                    <div class="form-group">
                      <label>Remove School Or Faculty</label>
                      <select class="form-control" id="faculty_list">
                        <option value="">Select Faculty</option>
                        <?php echo $faculty; ?>
                      </select>
                       <button style="margin-top:1%;" id="remove_faculty_button" class="btn btn-danger"><span><i class="fa fa-close fa-fw"></i></span>Remove School/Faculty</button>
                    </div>


                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->

             <div class="col-lg-6 col-xs-12">
              <!-- small box -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Add New Department</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form">

                    <div class="form-group">
                      <label>School/Faculty Department Belongs To</label>
                      <select class="form-control" id="department_faculty">
                        <option value="">Select Faculty</option>
                        <?php echo $faculty; ?>
                      </select>
                    </div>

                    <!-- input -->
                    <div class="form-group">
                      <label>Department Name</label>
                      <input type="text" class="form-control" id="department_value" placeholder="Department Name Here"/>
                      <button style="margin-top:1%;" id="add_department_button" class="btn btn-success"><span><i class="fa fa-plus-circle fa-fw"></i></span> Add Department</button>
                       <button style="margin-top:1%;" onclick="location.reload();" class="btn btn-info"><span><i class="fa fa-refresh fa-fw"></i></span>Refresh</button>
                    </div>

                     <div class="form-group">
                      <label>Remove Deparment</label>
                      <select class="form-control" id="department_list">
                        <option value="">Select Department</option>
                        <?php echo $department; ?>
                      </select>
                       <button style="margin-top:1%;" id="remove_department_button" class="btn btn-danger"><span><i class="fa fa-close fa-fw"></i></span>Remove Deparment</button>
                    </div>


                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
          </div>


           <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6 col-xs-12">
              <!-- small box -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Add New Year Group</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form">
                   
                    <!-- input -->
                    <div class="form-group">
                      <label>Add New Year Group</label>
                      <input type="text" id="year_group_value" class="form-control" placeholder="e.g 2013-2014"/>
                      <button style="margin-top:1%;" id="add_year_group_button" class="btn btn-success"><span><i class="fa fa-plus-circle fa-fw"></i></span> Add Year Group</button>
                    </div>

                    <div class="form-group">
                      <label>Remove Year Group</label>
                      <select class="form-control" id="year_group_list">
                        <option value="">Select Year Group</option>
                        <?php echo $year; ?>
                      </select>
                       <button style="margin-top:1%;" id="remove_year_group_button" class="btn btn-danger"><span><i class="fa fa-close fa-fw"></i></span>Remove Year Group</button>
                    </div>


                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
      
          </div><!-- /.box-body -->
              <!-- </div> --><!-- /.box -->
            <!-- </div> --><!-- ./col -->
        <!--   </div> -->
  
  
               <!-- Your Page Content Here -->

        </section><!-- /.stats content -->