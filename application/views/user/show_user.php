<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <h4 class="card-title">All Users</h4>
                    </div>
                    <div class="col-lg-2">
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newUserModal">Add User</button>
                        </div>

                        <!-- start modal add form     -->
                        <div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newUserModalLabel">Add User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" action="<?= site_url("/User/new_User_form") ?>" method="POST" id="addUserForm">
                                            <div class="form-group row">
                                                <label for="Username" class="col-sm-3 col-form-label">User ame</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="Username" placeholder="input user name" name="Username">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Password" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="Password" placeholder="input password" name="Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Email" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="Email" placeholder="input email" name="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Status" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="Status" placeholder="input status" name="Status">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" id="submitButton" onclick="submit_user()">Submit</button>
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal add form     -->

                        <!-- start modal edit form     -->
                        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" action="<?= site_url("/user/edit_User_form") ?>" method="POST" id="editUserForm">
                                            <div class="form-group row">
                                                <label for="editUsername" class="col-sm-3 col-form-label">User name</label>
                                                <div class="col-sm-9">
                                                    <input type="hidden" class="form-control" id="editUid" name="editUid">
                                                    <input type="text" class="form-control" id="editUsername" name="editUsername">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="editPassword" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="editPassword" name="editPassword">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="editEmail" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="editEmail" name="editEmail">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="editStatus" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="editStatus" name="editStatus">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" id="editButton" onclick="update_user()">Submit</button>
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal edit form     -->

                        <!-- start modal delete form     -->
                        <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel-2" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserModalLabel-2">Delete User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>You want to dalete data of User</p>
                                        <p>ID: <output type="number" id="deleteUserId" name="deleteUserId"></p>
                                        <p>User name: <output type="text" id="deleteUsername" name="deleteUsername"></p>
                                        <p>Password: <output type="text" id="deletePassword" name="deletePassword"></p>
                                        <p>Email: <output type="text" id="deleteEmail" name="deleteEmail"></p>
                                        <p>Status: <output type="text" id="deleteStatus" name="deleteStatus"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" id="submitDeleteUser" onclick="submitDeleteUser()">Submit</button>
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal delete form     -->

                    </div>
                </div>
                <p class="card-description">
                    show all users in table User
                </p>
                <div class="table-responsive">
                    <table class="table" id="Users-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>User name</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>action edit</th>
                                <th>action delete</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Show Data Function();
    $(document).ready(function() {
        $('#Users-table').DataTable({
            "ajax": {
                "url": "<?php echo site_url("user/get_all_users") ?>",
                "dataSrc": "data",
            },
            "columns": [{
                    "data": "uid"
                },
                {
                    "data": "username"
                },
                {
                    "data": "password"
                },
                {
                    "data": "email"
                },
                {
                    "data": "status"
                },
            ],
            "columnDefs": [{
                    "targets": 5,
                    "data": "uid",
                    "render": function(data, type, row, meta) {
                        editButton = `<button type="button" class="btn btn-warning" id="editButton" data-toggle="modal" data-target="#editUserModal" onclick="edit_user(${data})">Edit</button>`
                        return editButton;
                    },
                },
                {
                    "targets": 6,
                    "data": "uid",
                    "render": function(data, type, row, meta) {
                        deleteButton = `<button type="button" class="btn btn-danger" id="deleteButton" data-toggle="modal" data-target="#deleteUserModal" onclick="delete_user(${data})">Delete</button>`
                        return deleteButton;
                    },
                }
            ]
        });
    });

    // Insert Function(); <Start>
    function submit_user() {
        var Username = $("#Username").val();
        var Password = $("#Password").val();
        var Email = $("#Email").val();
        var Status = $("#Status").val();

        var userDatas = {
            Username: Username,
            Password: Password,
            Email: Email,
            Status: Status
        };

        var saveData = $.ajax({
            type: 'POST',
            url: "<?= site_url("/user/new_user_form") ?>",
            data: userDatas,
            dataType: "text",
            success: function(resultData) {
                alert("Inserted");
                $('#newUserModal').modal('hide')
                location.reload();

            }
        })
    }
    // Edit Function(); <Start>
    function edit_user(uid) { //show data of current product before update
        var user_id = {
            uid: uid
        }

        var showData = $.ajax({
            type: 'POST',
            url: "<?= site_url("/user/show_user_editForm") ?>",
            data: user_id,
            dataType: "text",
            success: function(resultData) {
                userDetail = JSON.parse(resultData);
                var Uid = $("#editUid").val(userDetail.uid);
                var Username = $("#editUsername").val(userDetail.username);
                var Password = $("#editPassword").val(userDetail.password);
                var Email = $("#editEmail").val(userDetail.email);
                var Status = $("#editStatus").val(userDetail.status);
            }
        })
    }

    function update_user() { // Updata data to Users table
        var editUid = $("#editUid").val();
        var editUsername = $("#editUsername").val();
        var editPassword = $("#editPassword").val();
        var editEmail = $("#editEmail").val();
        var editStatus = $("#editStatus").val();

        var editUserDatas = {
            editUid: editUid,
            editUsername: editUsername,
            editPassword: editPassword,
            editEmail: editEmail,
            editStatus: editStatus
        };

        var saveData = $.ajax({
            type: 'POST',
            url: "<?= site_url("/user/edit_user_form") ?>",
            data: editUserDatas,
            dataType: "text",
            success: function(resultData) {
                alert("updated");
                $('#editUserModal').modal('hide')
                location.reload();
            }
        })
    }
    // Delete Function();
    function delete_user(uid) { //show data of current product before delete
        var user_id = {
            uid: uid
        }

        var showData = $.ajax({
            type: 'POST',
            url: "<?= site_url("/user/show_user_editForm") ?>",
            data: user_id,
            dataType: "text",
            success: function(resultData) {
                userDetail = JSON.parse(resultData);
                var Uid = $("#deleteUserId").val(userDetail.uid);
                var Username = $("#deleteUsername").val(userDetail.username);
                var Password = $("#deletePassword").val(userDetail.password);
                var Email = $("#deleteEmail").val(userDetail.email);
                var Status = $("#deleteStatus").val(userDetail.status);
            }
        })
    }

    function submitDeleteUser() { // Sent Uid to Controller:/user/delete_user_form -> Model:User_model->delete_user for change 	delete_status='delete'
        var Uid = $("#deleteUserId").val();
        var deleteUserDatas = {
            Uid: Uid,
        };
        var showData = $.ajax({
            type: 'POST',
            url: "<?= site_url("/user/delete_user_form") ?>",
            data: deleteUserDatas,
            dataType: "text",
            success: function(resultData) {
                $('#deleteUserModal').modal('hide')
                location.reload();
            }
        })
    }
</script>