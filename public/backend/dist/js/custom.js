$(document).ready(function(){
    $("#old_password").keyup(function(){
        var old_password = $("#old_password").val();
        // alert(old_password);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/check-admin-password',
            data:{ old_password : old_password},
            success:function(resp){
                // alert(resp);
                if(resp == "true"){
                    $("#check_password").html("<font color='green'>Current Password is correct! </font>");
                }else if(resp == "false"){
                    $("#check_password").html("<font color='red'>Current Password is Incorrect! </font>");
                }
            },error:function(){
                //alert('Error');
            }
        });
    });
});
$(function() {

    const element = document.getElementById("demoser");
    const tut = document.getElementById("tut");
    console.log(parent);
    //console.log(pageXOffset);
    // const v = window.scrollY;
    // console.log(v);
    var rect = element.getBoundingClientRect();
    console.log(rect.top, rect.right, rect.bottom, rect.left)
    //$(document).scrollTop(react.top);
    $(document).scrollTop(927);
    tut.scrollTop = 927;
    //fixLayoutHeight = 927;
    //element.offsetTop = 927;
    //elementpageYOffset = 927 ;
    //pageYOffset = 242 ;
    // window.addEventListener('scroll',()=>{
    //   let current = '';
    //   console.log(pageOffset.y);
    // });
    // window.scroll({
    //     top: 7500,
    //     left: 0,
    //     behavior: 'smooth'
    // });
});
