function showCustomers(){
    $.ajax({
        url:"admin/customer.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showStatistics(){
    $.ajax({
        url:"admin/statistic.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showNotifications(){
    $.ajax({
        url:"admin/notification.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showWallet(){
    $.ajax({
        url:"admin/wallet.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showProduct(){
    $.ajax({
        url:"admin/product.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showBudget(){
    $.ajax({
        url:"admin/budget.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}