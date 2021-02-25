<?php include '../includes/header.inc.php'; ?>
<?php include '../includes/side_navbar.inc.php'; ?>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">INSERT PROVIDER</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Type</label>
                          <select class="form-control">
                              <option>Company</option>
                              <option>Personal</option>
                          </select>
                      </div>
                    </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Fullname</label>
                              <input type="text" class="form-control">
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Phone</label>
                              <input type="number" class="form-control">
                          </div>
                      </div>
                  </div>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" class="form-control">
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Country</label>
                                  <input type="text" class="form-control">
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Adress</label>
                                  <input type="text" class="form-control">
                              </div>
                          </div>
                      </div>

                  </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-fill btn-primary">INSERT</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>


<?php include '../includes/footer.inc.php'; ?>