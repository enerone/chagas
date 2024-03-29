<!-- jQuery Form Validation code -->
  <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register-form").validate({
    
        // Specify the validation rules
        rules: {
            firstname: "required",
            lastname: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            agree: "required"
        },
        
        // Specify the validation error messages
        messages: {
            firstname: "Please enter your first name",
            lastname: "Please enter your last name",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address",
            agree: "Please accept our policy"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
</head>
<body>

  <!--  The form that will be parsed by jQuery before submit  -->
  <form action="" method="post" id="register-form" novalidate="novalidate">
  
    <div class="label">First Name</div><input type="text" id="firstname" name="firstname" /><br /><br/>
    <div class="label">Last Name</div><input type="text" id="lastname" name="lastname" /><br /><br/>
    <div class="label">Email</div><input type="text" id="email" name="email" /><br /><br/>
    <div class="label">Password</div><input type="password" id="password" name="password" /><br /><br/>
    <div style="margin-left:140px;"><input type="submit" name="submit" value="Submit" /></div>
    
  </form>
  
