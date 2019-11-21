$('#btn_search').click(function () {
    search_word = document.getElementById("search_word").value;

    if(search_word == ''){
        alert("Please fill in the blank");
    }else{
        search = "search.php?search_word=" + search_word;
        $(document).ready(function(){
            $('#items').load(search);
        });

    }
});

$('#btn_sell_item').click(function () {
    $(document).ready(function(){
        $('#items').load('upload.php');
    });
});

$('#btn_edit_info').click(function () {
    document.getElementById('private').style.display='block';
});
$('#btn_profile_update').click(function () {
    password = document.getElementById("update_password").value;
    repassword = document.getElementById("update_repassword").value;
    email = document.getElementById("update_email").value;
    address = document.getElementById("update_address").value;

    if(password == repassword){
        document.getElementById('private').style.display='none';
        document.location = "modify_profile.php?password=" + password + "&email=" + email + "&address=" + address;
    }else{
        alert("passwords don't match");
    }
});

$('#btn_logout').click(function () {
    document.location = "logout.php";
});