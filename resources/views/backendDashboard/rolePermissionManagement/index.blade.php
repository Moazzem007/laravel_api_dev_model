<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Roles and Permissions</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d1117;
            color: white;
            padding: 20px;
        }

        .container {
            background: #161b22;
            border: 1px solid #1f6feb;
            border-radius: 10px;
            box-shadow: 0 0 15px 3px #1f6feb;
            padding: 20px;
            margin-bottom: 30px;
        }

        .table {
            color: white;
        }

        .form-select, .form-control {
            background: #0d1117;
            border: 1px solid #1f6feb;
            color: white;
        }

        .form-select:focus, .form-control:focus {
            box-shadow: 0 0 10px #1f6feb;
            border-color: #1f6feb;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center mb-4">Assign Role to User</h3>
        <div class="mb-3">
            <select id="selectUser" class="form-select">
                <option>Select User</option>
                @if($users)
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if($roles)
                    @foreach($roles as $role)
                        <tr>
                            <td class="role-id">{{ $role->id }}</td>
                            <td class="role-name">{{ $role->name }}</td>
                            <td><input type="checkbox" class="role-status"></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="container">
        <h3 class="text-center mb-4">Assign Permission to Role</h3>
        <div class="mb-3">
            <label for="selectRole" class="form-label">Select Role</label>
            <select id="selectRole" class="form-select">
                <option selected disabled>Select Role</option>
                <option value="1">Role 1</option>
                <option value="2">Role 2</option>
            </select>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Permission Name 1</td>
                    <td><input type="checkbox" class="form-check-input"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Permission Name 2</td>
                    <td><input type="checkbox" class="form-check-input"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Permission Name 3</td>
                    <td><input type="checkbox" class="form-check-input"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>



    <script>
        $(document).ready(function() {
            $('#selectUser').change(function() {
                var userId = $(this).val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var url = '{{ route("get-user-roles")}}';
                $.ajax({
                    type: 'POST',
                    headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    url: url,
                    data: {ID:userId},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data[0]);
                        var roleIds = data.map(role => role.id);
                        $('.role-id').each(function() {
                            if (roleIds.includes(parseInt($(this).text()))) {
                                $(this).closest('tr').find('.role-status').prop('checked', true);
                            } else {
                                $(this).closest('tr').find('.role-status').prop('checked', false);
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        $('.role-id').each(function() {
                            $(this).closest('tr').find('.role-status').prop('checked', false);
                        });
                            console.error(xhr.responseText);
                    }
                });
            });
        });


        // Update role for user
        $('.role-status').on('change', function() {
            var userId = $('#selectUser').val();
            var roleId = $(this).closest('tr').find('.role-id').text();
            var roleName = $(this).closest('tr').find('.role-name').text();
            var status = $(this).prop('checked');
            
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var url = '{{ route("update-user-role")}}';
            $.ajax({
                type: 'POST',
                headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: url,
                data: {userId:userId, roleId:roleId, role:roleName, status:status},
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>



</body>
</html>
