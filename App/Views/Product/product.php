<?php include '../includes/header.inc.php'; ?>
<?php include '../includes/side_navbar.inc.php'; ?>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">INSERT PRODUCT</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">

                      <div class="col-md-3">
                          <div class="form-group">
                              <label>Provider</label>
                              <input type="text" class="form-control">
                          </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>Brand</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>

                      <div class="col-md-3">
                          <div class="form-group">
                              <label>Category</label>
                              <input type="text" class="form-control">
                          </div>
                      </div>

                      <div class="col-md-3">
                          <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control">
                          </div>
                      </div>

                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Size</label>
                              <input type="text" class="form-control">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Weight</label>
                              <input type="text" class="form-control">
                          </div>
                      </div>

                  </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cost</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Expiration Date</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                       <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control"></textarea>
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