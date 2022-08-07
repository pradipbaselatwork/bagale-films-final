$(document).ready(function(){
    // alert('hello its me');

    //ajax for views count
    $(".viewscount").click(function() {
        // alert('hello its me');
        var viewscount_id= $(this).attr("viewscount_id");
        console.log(viewscount_id);
        $.ajax({
            type:'post',
            url:'/update-views',
            data:{
                viewscount_id:viewscount_id
            },
            success:function(response) {
            
            },error:function(){
                alert("Error");
            }
        });
});

});