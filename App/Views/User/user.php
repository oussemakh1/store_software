<?php include '../includes/header.inc.php'; ?>
<?php include '../includes/side_navbar.inc.php'; ?>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">INSERT USER</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Username</label>
                          <input type="text" class="form-control">
                      </div>
                    </div>

                      <div class="col-md-3">
                          <div class="form-group">
                              <label>Fullname</label>
                              <input type="text" class="form-control">
                          </div>
                      </div>

                      <div class="col-md-3">
                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label>Type</label>
                              <input type="password" class="form-control">
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