$(document).ready(function() {
    var DOMAIN="https://inventory-s-m.herokuapp.com";
    var status=false;
    // Manage Category
    manage_category(1);
    function manage_category(pn) {
        $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{manageCategory:1,pageno:pn},
            success:function(response) {
               $('#get_category').html(response);
               
            }
        })
    }
    //page numeration 
    $("body").delegate(".page-link","click",function () {
        var pn=$(this).attr("pn");
        manage_category(pn);
    })
    //delete category
    $("body").delegate("#delete","click",function () {
        var did=$(this).attr("did");
        if (confirm("Are you sure ? You want to delete ! " + did)) {
            $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{deleteCategory:1,id:did},
            success:function(response) {
               if (response=="DEPENDENT CATEGORY") {
                 alert("Sorry! it can't be deleted");
               }
               if (response=="DELETED CATEGORY") {
                 alert("Deleted category");
                 
               }
             manage_category(1);
            }
            })
        }
    })
    //get Category Records
    fetch_category();
    function fetch_category() {
        $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{getCategory:1},
            success:function(response) {
                var role="<option value=\"0\">Role</option>";
                $("#parent-cat").html(role+response);
                $("#new-cat").html(role+response);
            }
        })
    }; 
    //edit Categorie
    $("body").delegate("#edit","click",function() {
        var eid=$(this).attr("eid");
           $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{editCategory:1,eid:eid},
            dataType:"JSON",
            success:function(response) {
                $("#update-category").val(response["category_name"]);
                $("#id").val(response["cid"]);
                $("#parent-cat").val(response["parent_cat"]);
               
            }
        })
    })
    //update Categorie
    $("#update-category-form").on("submit",function(){
        // var eid=$(this).attr("did");
        // $("#id-edit").val(eid);
        if ($("#update-category").val()=="") {
            $("#update-category").addClass("border-danger");
             $("#cat-error").html("<span class='text-danger'>Please Enter Category</span>");
        }
         $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:$("#update-category-form").serialize(),
            success:function(response) {
                alert(response);
            }
            
        })
        window.location.href=encodeURI(DOMAIN+"/manage_category.php");
        manage_category(1);
    })

//--------------------------- Managin Brand ------------------//
    // Manage Brand
    manage_brand(1);
    function manage_brand(pn) {
        $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{manageBrand:1,pageno:pn},
            success:function(response) {
               $('#get_brand').html(response);
               
            }
        })
    }
    //page numeration 
    $("body").delegate(".page-link","click",function () {
        var pn=$(this).attr("pn");
        manage_brand(pn);
    })
        //delete brand
    $("body").delegate("#deleteBrand","click",function () {
        var did=$(this).attr("did");
        if (confirm("Are you sure ? You want to delete ! " + did)) {
            $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{deleteBrand:1,id:did},
            success:function(response) {
               if (response=="DELETED") {
                 alert("Deleted Brand");
                 
               }
             manage_brand(1);
            }
            })
        }
    })
    //edite brand
        $("body").delegate("#editBrand","click",function() {
        var eid=$(this).attr("eid");
           $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{editBrand:1,eid:eid},
            dataType:"JSON",
            success:function(response) {
                $("#update-brand").val(response["brand_name"]);
                $("#id").val(response["bid"]);
                
               
            }
        })
    })
        //update Brand
    $("#update-brand-form").on("submit",function(){
        // var eid=$(this).attr("did");
        // $("#id-edit").val(eid);
        if ($("#update-brand").val()=="") {
            $("#update-brand").addClass("border-danger");
             $("#brnad-error").html("<span class='text-danger'>Please Enter Category</span>");
        }
         $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:$("#update-brand-form").serialize(),
            success:function(response) {
                alert(response);
            }
            
        })
        window.location.href=encodeURI(DOMAIN+"/manage_brand.php");
        manage_brand(1);
    })
//--------------------------- Managin Product ------------------//
// Manage Product
    manage_product(1);
    function manage_product(pn) {
        $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{manageProduct:1,pageno:pn},
            success:function(response) {
               $('#get_product').html(response);
               
            }
        })
    }
    //page numeration 
    $("body").delegate(".page-link","click",function () {
        var pn=$(this).attr("pn");
        manage_product(pn);
    })
        //edite Product
        $("body").delegate("#editProduct","click",function() {
        var pid=$(this).attr("pid");
           $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{editProduct:1,pid:pid},
            dataType:"JSON",
            success:function(response) {
                $("#new-product").val(response["product_name"]);
                $("#new-brand").val(response["bid"]);
                $("#new-cat").val(response["cid"]);
                $("#new-price").val(response["product_price"]);
                $("#new-quantity").val(response["product_stock"]);
                $("#new-date").val(response["date_added"]);
                $("#idproduct").val(response["pid"]);
                
               
            }
        })
    })
            //update Proudct
    $("#form-product-update").on("submit",function(){
        // var eid=$(this).attr("did");
        // $("#id-edit").val(eid);
        if ($("#new-product").val()=="") {
            $("#new-product").addClass("border-danger");
            $("#product-error").html("<span class='text-danger'>Please Enter Product</span>");
        }
        if ($("#new-cat").val()=="") {
            $("#new-cat").addClass("border-danger");
            $("#cat-error").html("<span class='text-danger'>Please Enter Category</span>");
        }
        if ($("#new-brand").val()=="") {
            $("#new-brand").addClass("border-danger");
            $("#brnd-error").html("<span class='text-danger'>Please Enter Brand</span>");
        }
        if ($("#new-price").val()=="") {
            $("#new-price").addClass("border-danger");
            $("#price-error").html("<span class='text-danger'>Please Enter Price</span>");
        }
        if ($("#new-quantity").val()=="") {
            $("#new-quantity").addClass("border-danger");
            $("#stock-error").html("<span class='text-danger'>Please Enter Stock</span>");
        }
         $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:$("#form-product-update").serialize(),
            success:function(response) {
                alert(response);
            }
            
        })
        window.location.href=encodeURI(DOMAIN+"/manage_product.php");
        manage_product(1);
    })
    fetch_brands();
    function fetch_brands() {
        $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{getBrand:1},
            success:function(response) {
                var choose="<option value=\"0\">choose</option>";
                $("#new-brand").html(choose+response);
                
               
            }
        })
    };
    //get Category Records
    // fetch_category();
    // function fetch_category() {
    //     $.ajax({
    //         method: "POST",
    //         url: DOMAIN+"/includes/process.php",
    //         data:{getCategory:1},
    //         success:function(response) {
                
    //             var choose="<option value=\"0\">choose</option>";
                
               
    //             $("#new-cat").html(choose+response);
               
    //         }
    //     })
    // };  
            //delete Product
    $("body").delegate("#deleteProduct","click",function () {
        var pid=$(this).attr("pid");
        if (confirm("Are you sure ? You want to delete ! " + pid)) {
            $.ajax({
            method: "POST",
            url: DOMAIN+"/includes/process.php",
            data:{deleteProduct:1,id:pid},
            success:function(response) {
               if (response=="DELETED") {
                 alert("Deleted Product");
                 
               }
             manage_product(1);
            }
            })
        }
    })
});
