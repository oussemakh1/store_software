<?php include '../includes/header.inc.php'; ?>
<?php include '../includes/side_navbar.inc.php'; ?>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title col-md-7">Clients</h4>
                        <div class="float-right col-md-5">
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">

                            <thead class=" text-primary">
                            <th>
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Country
                            </th>

                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    Dakota Rice
                                </td>
                                <td>
                                    Niger
                                </td>
                                <td>
                                    Oud-Turnhout
                                </td>
                                <td>
                                    1200
                                </td>

                                <td class="float-right"><icon class="icon-pencil"></icon></td>
                                <td class="float-right"><icon class="icon-trash-simple"></icon></td>


                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../includes/footer.inc.php'; ?>