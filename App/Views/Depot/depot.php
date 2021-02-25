<?php include '../includes/header.inc.php'; ?>
<?php include '../includes/side_navbar.inc.php'; ?>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">INSERT DEPOT</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Country</label>
                          <select class="form-control">
                              <option>Company</option>
                              <option>Personal</option>
                          </select>
                      </div>
                    </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Adress</label>
                              <input type="text" class="form-control">
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Size</label>
                              <input type="text" class="form-control">
                          </div>
                      </div>
                  </div>
                    <div class="row">

                        <div class="dual-list list-left col-md-5">
                            <div class="well text-right">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <span class="input-group-addon glyphicon glyphicon-search"></span>
                                            <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="btn-group">
                                            <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item">bootstrap-duallist <a href="https://github.com/bbilginn/bootstrap-duallist" target="_blank">github</a></li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Morbi leo risus</li>
                                    <li class="list-group-item">Porta ac consectetur ac</li>
                                    <li class="list-group-item">Vestibulum at eros</li>
                                </ul>
                            </div>
                        </div>

                        <div class="list-arrows col-md-1 text-center">
                            <button class="btn btn-default btn-sm move-left">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </button>

                            <button class="btn btn-default btn-sm move-right">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </button>
                        </div>

                        <div class="dual-list list-right col-md-5">
                            <div class="well">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="btn-group">
                                            <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                                            <span class="input-group-addon glyphicon glyphicon-search"></span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Morbi leo risus</li>
                                    <li class="list-group-item">Porta ac consectetur ac</li>
                                    <li class="list-group-item">Vestibulum at eros</li>
                                </ul>
                            </div>
                        </div>

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