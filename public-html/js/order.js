$(document).ready(function() {
    var DOMAIN="http://localhost/inventory/public-html";
AddNewRow();
    $("#Add").click(function(){
        AddNewRow();
    })
    $("#Remove").click(function(){
        $("#invoice_item").children("tr:last").remove();
        calculate(0,0);
    })

    function AddNewRow(){
        var n=0;
        $.ajax({
            url:DOMAIN+"/includes/process.php",
            method:"POST",
            data:{getNewRow:1},
            success:function(response){
                $("#invoice_item").append(response);
                $(".number").each(function () {
                    $(this).html(++n);
                });
            }
        })
    }
    $("#invoice_item").delegate(".pid","change",function () {
        var id=$(this).val();
        var tr=$(this).parent().parent();
        $(".overlay").show();
        $.ajax({
            url:DOMAIN+"/includes/process.php",
            method:"POST",
            dataType:"json", 
            data:{getPriceAndQty:1,pid:id},
            success:function(response){
                tr.find(".tqty").val(response["product_stock"]);
                tr.find(".pro_name").val(response["product_name"]);
                tr.find(".qnty").val(1);
                tr.find(".price").val(response["product_price"]);
                tr.find(".ttl").html(tr.find(".qnty").val()*tr.find(".price").val());
                calculate(0,0);
            }
        })
    })
    $("#invoice_item").delegate(".qnty","keyup",function() {
        var qty=$(this);
        var tr=$(this).parent().parent();
        
        if (isNaN(qty.val())) {
            alert("Wa Khona dakhel chi 7aja ma3e9ola");
            qty.val(1)-0;
        }else{
            if ((qty.val()-0) > (tr.find(".tqty").val()-0)) {
                alert("Wa rah  Hadchi ktar makayn f stock ");
                qty.val(1)-0;
            }else{
                 tr.find(".ttl").html((qty.val()-0)*tr.find(".price").val());
                 calculate(0,0);
            }
        }
    })
    function calculate(disc,p){
        var sub=0;
        var tva=0.2;
        var discount=disc;
        var paid=p;
        $(".ttl").each(function () {
            sub =sub +($(this).html()*1);
        
        })
        $("#sub_total").val(sub);
        $("#total").val($("#sub_total").val()-($("#sub_total").val()*(discount/100)));
        $("#tva").val(($("#total").val())*tva);
        $("#net_total").val(($("#tva").val()*1)+($("#total").val()*1));
        $("#due").val(($("#net_total").val()*1)-paid);
        
    }
    $("#disc").keyup(function () {
            var disc=$(this).val();
            calculate(disc,0);
    })
    $("#paid").keyup(function () {
            var p=$(this).val();
            var disc=$("#disc").val();
            calculate(disc,p);
    })
    $("#order_form").click(function () {
        $invoice=$("#get_order_data").serialize();
        $.ajax({
            method:"POST",
            url:DOMAIN+"/includes/process.php",
            data:$("#get_order_data").serialize(),
            success:function (response) {
                if (response==="Order Completed") {
                    alert(response);
                    $("#get_order_data").trigger("reset");
                    if (confirm("Do You Want To Print The Order !")) {
                        window.location.href=DOMAIN+"/includes/invoice_bill.php?"+$invoice;
                    }
                }else{
                    alert("Error");
                }
                
            }
        })
    })
})
