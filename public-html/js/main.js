$(document).ready(function() {
    var DOMAIN="https://inventory-s-m.herokuapp.com/public-html";
    var status=false;
    $("#register_form").on("submit",function() {
       
        var name=$("#username");
        var email=$("#email");
        var pass1=$("#password1");
        var pass2=$("#password2");
        var type=$("#usertype");
        var e_patt=new RegExp(/^([a-z][<>%\$])*@([a-z0-9]+)*(\.[a-z0-9]{2,4})+$/);
        //name validation
        if (name.val() === "" || name.val().length<6 ) {
            name.addClass("border-danger");
            $("#u_error").html("<span>Please Enter Name And Name should be More Than 6 carractere</span>");
            status=false;
        }else{
            name.removeClass("border-danger");
             $("#u_error").html("");
             status=true;
        }
        //email validation
         if (e_patt.test(email.val())) {
            email.addClass("border-danger");
            $("#e_error").html("<span>Please Enter Valide Email Adresse </span>");
            status=false;
        }else{
            email.removeClass("border-danger");
             $("#e_error").html("");
             status=true;
        }
        //password Validation
         if (pass1.val()===""|| pass1.val().length<9 ) {
            pass1.addClass("border-danger");
            $("#p1_error").html("<span>Please Enter Valide Password and Password should be more thaan 9 carractere </span>");
            status=false;
        }else{
            pass1.removeClass("border-danger");
             $("#p1_error").html("");
             status=true;
        }
        //password Validation
         if (pass2.val()===""|| pass2.val().length<9 ) {
            pass2.addClass("border-danger");
            $("#p2_error").html("<span>Please Enter Valide Password and Password should be more thaan 9 carractere </span>");
            status=false;
        }else{
            pass2.removeClass("border-danger");
             $("#p1_error").html("");
             status=true;
        }
        //type Validation
         if (type.val()==="") {
            pass1.addClass("border-danger");
            $("#t_error").html("<span>Please Choose a Type of User</span>");
            status=false;
        }
        //Pawword Matched
         if (pass1.val()==pass2.val()&&status==true) {
            $.ajax({
                type: "POST",
                url: DOMAIN+"/includes/process.php",
                data: $('#register_form').serialize(),
                success: function (response) {
                    if (response=='This mail is Already Exist') {
                        alert('it seems that you are smilar ');
                    }else if(response=='Something Eroor'){
                        alert('Something Eroor');
                    }else{
                        window.location.href=encodeURI(DOMAIN+"/index.php?msg=You are register now you can login");
                    }
                }
            });
        }else{
            pass1.addClass("border-danger");
            $("#p2_error").html("<span> Password doesn't matched </span>");
            status=false;
        }

    })

    //login user part
    $("#login_form").on("submit",function() {
        
        var email=$("#email-login");
        var pass=$("#password-login");
        if (email.val()==="") {
            email.addClass("border-danger");
            $("#em_error").html("<span>it seems you are not registred</span>");
            status=false;
        }else{
             email.removeClass("border-danger");
             $("#em_error").html("");
             status=true;
        }
          if (pass.val()==="") {
            pass.addClass("border-danger");
            $("#ps_error").html("<span>invalid password</span>");
            status=false;
        }else{
             pass.removeClass("border-danger");
             $("#ps_error").html("");
             status=true;
        }
        if (status) {
            $(".overlay").show();
            $.ajax({
                method: "POST",
                url: DOMAIN+"/includes/process.php",
                data: $("#login_form").serialize(),
                success: function (response) {
                    
                    if (response=="You Have To register First") {
                        $(".overlay").hide();
                        email.addClass("border-danger");
                        $("#em_error").html("<span class='text-danger'>it seems you are not registred</span>");
                        status=false;
                    }
                    else if(response=="PASSWORD doesnt Matched"){
                        $(".overlay").hide();
                        password.addClass("border-danger");
                        $("#ps_error").html("<span class='text-danger'>PASSWORD doesnt Matched</span>");
                        status=false;
                    }else{
                        $(".overlay").hide();
                       window.location.href=encodeURI(DOMAIN+"/dashboard.php");
                    }
                }
        })
        }
    });
    //Add Category
    $("#form-category").on("submit",function() {
     var category=$("#category-name");
     var category_parent=$("#parent-cat");
     if (category.val()==="") {
           category.addClass("border-danger");
            $("#cat-error").html("<span>invalid password</span>");
            status=false;
     }else{
           category.removeClass("border-danger");
           $("#cat-error").html();
           status=true;
     }
     if (category_parent.val()==="") {
           category_parent.addClass("border-danger");
            $("#parent-error").html("<span>invalid password</span>");
            status=false;
     }else{
           category_parent.removeClass("border-danger");
           $("#parent-error").html();
           status=true;
     }
     if (status) {
       $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:$("#form-category").serialize(),
            success:function(response) {
                if (response=="category Added") {
                    category.removeClass("border-danger");
                    $("#cat-error").html("<span class=\"btn-success\">Category Added With Success</span>");
                    $("#category-name").val("");
                    $("#parent-cat").val("");
                     window.location.href=encodeURI(DOMAIN+"/manage_category.php");
                    fetch_category();
                }else{
                    alert(response);
                }
               
            }
      })
     
     }
    });
//Add Product
    $("#form-product").on("submit",function() {
   
       $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:$("#form-product").serialize(),
            success:function(response) {
                if (response=="Product Added") {
                    alert('Product Added With Success');
                }else{
                    console.log(response);
                }
               window.location.href=encodeURI(DOMAIN+"/dashboard.php");
            }
      })
    });
//get Category Records
    fetch_category();
    function fetch_category() {
        $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{getCategory:1},
            success:function(response) {
                var role="<option value=\"0\">Role</option>";
                var choose="<option value=' '>choose</option>";
                $("#parent-cat").html(role+response);
               
                $("#select-cat").html(choose+response);
               
            }
        })
    }; 
//get Brands Records
    fetch_brands();
    function fetch_brands() {
        $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{getBrand:1},
            success:function(response) {
                var choose="<option value=\"0\">choose</option>";
                $("#select-brand").html(choose+response);
                
               
            }
        })
    }; 
 
    //Add Brand
    $('#form-brand').on("submit",function() {
        if ($('#brand-name').val()==="") {
            $('#brand-name').addClass("border-danger");
            $('#brand-error').html("<span>Please Enter Valid Value</span>");
            status=false;
        }else{
            $('#brand-name').removeClass("border-danger");
            $('#brand-error').html("");
            status=true;
        }
        if (status) {
            $.ajax({
                method:"POST",
                url:DOMAIN+"/includes/process.php",
                data:$('#form-brand').serialize(),
                success:function (response) {
                    if (response==='Brand Added') {
                        $('#brand-error').html("<span class=\"btn-success\">Brand Added With Success</span>");
                    }else{
                        alert(response);
                    }
                }

            })
        }
    })
})
