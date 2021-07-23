<!doctype html>
<html>
    <head>
        <title>Edit delete DataTables record with AJAX and PHP</title>

        <meta name="viewport" con tent="width=device-width, initial-scale=1.0">

        <!-- Datatable CSS -->
        <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

        <!-- jQuery Library -->
        <script src="jquery-3.5.1.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

        <!-- Datatable JS -->
        <script src="DataTables/datatables.min.js"></script>
        
    </head>
    <body >

        <div class='container'>

            <!-- Modal -->
            <div id="updateModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" >Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" required>            
                            </div>
                            <div class="form-group">
                                <label for="email" >Email</label>    
                                <input type="email" class="form-control" id="email"  placeholder="Enter email">                          
                            </div>      
                            <div class="form-group">
                                <label for="mobile" >mobile</label>
                                <input type="number" class="form-control" id="mobile"  placeholder="Enter mobile">               
                            </div>   
                            <div class="form-group">
                                 <label for="cars">Choose a department:</label>
                            <select id="department" name="department">
                                <option value="IT Analyst">IT Analyst</option>
                                <option value="IT Coordinator">IT Coordinator</option>
                                <option value="Network Administrator">Network Administrator</option>
                                <option value="Computer Systems Manager">Computer Systems Manager</option>
                            </select>
                            </div>
                            <div>
                             <label for="cars">Choose a designation:</label>
                            <select id="designation" name="designation">
                                <option value="Trainee Engineer">Trainee Engineer</option>
                                <option value="Software Engineer">Software Engineer</option>
                                <option value="System Analyst">System Analyst</option>
                                <option value="Programmer Analyst">Programmer Analyst</option>
                            </select>
                        </div>
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="txt_userid" value="0">
                            <button type="button" class="btn btn-success btn-sm" id="btn_save">Save</button>
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div id="viewModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">View</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" >Name</label>
                                <input type="text" class="form-control" id="name1" placeholder="Enter name" required readonly>            
                            </div>
                            <div class="form-group">
                                <label for="email" >Email</label>    
                                <input type="email" class="form-control" id="email1"  placeholder="Enter email" readonly>                           
                            </div>      
                            <div class="form-group">
                                <label for="mobile" >mobile</label>
                                <input type="number" class="form-control" id="mobile1"  placeholder="Enter mobile" readonly>               
                            </div>   
                            <div class="form-group">
                                 <label for="cars">Choose a department:</label>
                            <select id="department1" name="department" readonly>
                                <option value="IT Analyst">IT Analyst</option>
                                <option value="IT Coordinator">IT Coordinator</option>
                                <option value="Network Administrator">Network Administrator</option>
                                <option value="Computer Systems Manager">Computer Systems Manager</option>
                            </select>
                            </div>
                            <div>
                             <label for="cars">Choose a designation:</label>
                            <select id="designation1" name="designation" readonly>
                                <option value="Trainee Engineer">Trainee Engineer</option>
                                <option value="Software Engineer">Software Engineer</option>
                                <option value="System Analyst">System Analyst</option>
                                <option value="Programmer Analyst">Programmer Analyst</option>
                            </select>
                        </div>
                            
                        </div>
                        <div class="modal-footer">
<!--
                            <input type="hidden" id="txt_userid" value="0">
                            <button type="button" class="btn btn-success btn-sm" id="btn_save">Save</button>
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
-->
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div align="right">
                <div>
                <input type="button" class="btn btn-danger" onclick="location.href='logout.php';" value="Logout" /></div>
                <br>
                <form >
                <div class="form-group">
                                 <label for="cars">Choose a department:</label>
                            <select id="department_drop" name="department_drop" onchange="my_dep_fil(this.value)">
                                <option value=" ">Choose Department</option>
                                <option value="IT Analyst">IT Analyst</option>
                                <option value="IT Coordinator">IT Coordinator</option>
                                <option value="Network Administrator">Network Administrator</option>
                                <option value="Computer Systems Manager">Computer Systems Manager</option>
                            </select>
                            </div>
                </form>
                
            </div>
            <br>

            <!-- Table -->
            <table id='userTable' class='display dataTable' width='100%'>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>mobile</th>
                        <th>department</th>
                        <th>designation</th>
                        <th>Joining Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
            </table>

        </div>
        

        <!-- Script -->
        <script>
        $(document).ready(function(){

            // DataTable
            var userDataTable = $('#userTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'ajaxfile.php'
                },
                'columns': [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'mobile' },
                    { data: 'department' },
                    { data: 'designation' },
                    { data: 'date' },
                    { data: 'action' },
                ]
            });


            // Update record
            $('#userTable').on('click','.updateUser',function(){
                var id = $(this).data('id');

                $('#txt_userid').val(id);

                // AJAX request
                $.ajax({
                    url: 'ajaxfile.php',
                    type: 'post',
                    data: {request: 2, id: id},
                    dataType: 'json',
                    success: function(response){
                        if(response.status == 1){

                            $('#name').val(response.data.name);
                            $('#email').val(response.data.email);
                            $('#mobile').val(response.data.mobile);
                            $('#department').val(response.data.department);
                            $('#designation').val(response.data.designation);
                            
                            $('#name1').val(response.data.name);
                            $('#email1').val(response.data.email);
                            $('#mobile1').val(response.data.mobile);
                            $('#department1').val(response.data.department);
                            $('#designation1').val(response.data.designation);

                        }else{
                            alert("Invalid ID.");
                        }
                    }
                });

            });
            
            $('#userTable').on('click','.viewUser',function(){
                var id = $(this).data('id');

                $('#txt_userid').val(id);

                // AJAX request
                $.ajax({
                    url: 'ajaxfile.php',
                    type: 'post',
                    data: {request: 6, id: id},
                    dataType: 'json',
                    success: function(response){
                        if(response.status == 1){
                            
                            $('#name1').val(response.data.name);
                            $('#email1').val(response.data.email);
                            $('#mobile1').val(response.data.mobile);
                            $('#department1').val(response.data.department);
                            $('#designation1').val(response.data.designation);

                        }else{
                            alert("Invalid ID.");
                        }
                    }
                });

            });


            // Save user 
            $('#btn_save').click(function(){
                var id = $('#txt_userid').val();

                var name = $('#name').val().trim();
                var email = $('#email').val().trim();
                var mobile = $('#mobile').val().trim();
                var department = $('#department').val().trim();
                var designation = $('#designation').val().trim();

                if(name !='' && email != '' && department != '' && designation != ''){

                    // AJAX request
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {request: 3, id: id,name: name, email: email, mobile: mobile, department: department, designation: designation},
                        dataType: 'json',
                        success: function(response){
                            if(response.status == 1){
                                alert(response.message);

                                // Empty the fields
                                $('#id','#name','#email','#department','#designation','#date').val('');
                                $('#mobile').val('number');
                                $('#txt_userid').val(0);

                                // Reload DataTable
                                userDataTable.ajax.reload();

                                // Close modal
                                $('#updateModal').modal('toggle');
                            }else{
                                alert(response.message);
                            }
                        }
                    });

                }else{
                    alert('Please fill all fields.');
                }
            });


            // Delete record
            $('#userTable').on('click','.deleteUser',function(){
                var id = $(this).data('id');

                var deleteConfirm = confirm("Are you sure?");
                if (deleteConfirm == true) {
                    // AJAX request
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {request: 4, id: id},
                        success: function(response){

                            if(response == 1){
                                alert("Record deleted.");

                                // Reload DataTable
                                userDataTable.ajax.reload();
                            }else{
                                alert("Invalid ID.");
                            }
                            
                        }
                    });
                } 
                
            });
        });
        </script>
<!--
        <script>
        function my_dep_fil(value) {
            alert(value);
                    // AJAX request
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {request: 3,my_dep_fil: value},
                        dataType: 'json',
                        success: function(response){
                            if(response.status == 1){
                                alert(response.message);

                                // Empty the fields
                                $('#id','#name','#email','#department','#designation','#date').val('');
                                $('#mobile').val('number');
                                $('#txt_userid').val(0);

                                // Reload DataTable
                                userDataTable.ajax.reload();

                                // Close modal
                                $('#updateModal').modal('toggle');
                            }else{
                                alert(response.message);
                            }
                        }
                    });

                
          
        }
        </script>
-->
    </body>

</html>
