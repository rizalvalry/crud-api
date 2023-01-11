
<html>
<head>
    <title>CURD REST API - Rizal Valry</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="container">
        <br />
        <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="<?= base_url(); ?>/asset/bootstrap-solid.svg" width="30" height="30" alt="">
  </a>
  <?= base_domain(); ?>
</nav>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">List Customers in Codeigniter 4</h3>
                    </div>
                    <div class="col-md-6" align="right">
                        <button type="button" id="add_button" class="btn btn-info btn-xs">Add New</button>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <span id="success_message"></span>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<div class="modal" tabindex="-1" id="userModal" role="dialog">
  <div class="modal-dialog" role="document">
  
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
                <form method="post" id="user_form">
                <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <span id="name_error" class="text-danger"></span>
                    <br />
                    </div>
                    <div class="form-group">

                    <label>Email</label>
                    <input type="text" name="email" id="email" class="form-control" />
                    <span id="email_error" class="text-danger"></span>
                    <br />
                    </div>

                    <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" />
                    <span id="password_error" class="text-danger"></span>
                    <span id="password_alert" class="text-danger">Fill Required!</span>
                    <br />
                    </div>

                    <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control" id="gender">
                      
                        <option id="gendervalue" value="" selected>- Select Gender -</option>
                        <option value="Men" id="gendervalue"> Men </option>
                        <option value="Women" id="gendervalue"> Women </option>
                                          
                    </select>
                    <span id="gender_error" class="text-danger"></span>
                    <br />
                    </div>

                    <div class="form-group">
                    <label>Status</label>
                    <select name="is_married" id="is_married" class="form-control">
                        <option id="is_marriedvalue" value="" selected>- Select Status -</option>
                        <option value="Single" > Single </option>
                        <option value="Married" > Married </option>
                        <option value="Divorced" > Divorced </option>
                    </select>
                    <span id="is_married_error" class="text-danger"></span>
                    <br />
                    </div>
                    
                    <div class="form-group">
                    <label>Address</label>
                    <textarea type="address" name="address" id="address" value="" class="form-control" >
                    </textarea>
                    <span id="address_error" class="text-danger"></span>
                    <br />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id" />
                    <input type="hidden" name="data_action" id="data_action" value="Insert" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    
    function fetch_data()
    {
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{data_action:'fetch_all'},
            success:function(data)
            {
                $('tbody').html(data);
            }
        });
    }

    fetch_data();

    $('#add_button').click(function(){
        $('#user_form')[0].reset();
        $('.modal-title').text("Add User");
        $('#action').val('Add');
        $('#data_action').val("Insert");
        $('#userModal').modal('show');
        $('#password_alert').hide();
        
    });

    // insert
    $(document).on('submit', '#user_form', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url() . 'test_api/action' ?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
                // console.log(data.status);
                if(data.status.code === 200)
                {
                    $('#user_form')[0].reset();
                    $('#userModal').modal('hide');
                    fetch_data();
                    if($('#data_action').val() == "Insert")
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Inserted</div>');
                    }
                }

                if(data.status.code === 401)
                {
                    console.log(data.status.code);
                    $('#name_error').html(data.name_error);
                    $('#email_error').html(data.email_error);
                    $('#password_error').html(data.password_error);
                    $('#gender_error').html(data.gender_error);
                    $('#is_married_error').html(data.is_married_error);
                    $('#address_error').html(data.address_error);
                }
            }
        })
    });

    // update
    $(document).on('click', '.edit', function(){
        var user_id = $(this).attr('id');
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{user_id:user_id, data_action:'fetch_single'},
            dataType:"json",
            success:function(data)
            {
                console.log(data.is_married);
                $('#userModal').modal('show');
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#password').val(data.password);
                $('#gendervalue').val(data.gender);
                $('#is_marriedvalue').val(data.is_married);
                $('#address').val(data.address);
                $('.modal-title').text('Edit User');
                $('#user_id').val(user_id);
                $('#action').val('Edit');
                $('#data_action').val('Edit');
                $('#name_error').hide();
                $('#email_error').hide();
                $('#password_error').hide();
                $('#gender_error').hide();
                $('#is_married_error').hide();
                $('#address_error').hide();
                $('#password_alert').show();
            }
        })
    });

    // delete
    $(document).on('click', '.delete', function(){
        var user_id = $(this).attr('id');
        if(confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                url:"<?php echo base_url(); ?>test_api/action",
                method:"POST",
                data:{user_id:user_id, data_action:'Delete'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.status.code === 200)
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
                        fetch_data();
                    }
                }
            })
        }
    });
    
});
</script>