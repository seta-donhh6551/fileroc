jQuery(document).ready(function($){
    var object = $(".star-button span");
    var active = $(".review-star .star-active");
    var title = $('.review-star-title');
    $('#number-star').val(3);
    object.click(function(){
        number = $(this).attr("role");
        width  = number*16;
        switch(number){
            case "1" : text = "Tồi tệ"; break;
            case "2" : text = "Kém"; break;
            case "3" : text = "Tạm được"; break;
            case "4" : text = "Rất tốt"; break;
            case "5" : text = "Tuyệt vời"; break;
            default  : text = ""; break;
        }
        $('#number-star').val(number);
        active.width(width+'px');
        title.html(text);
    });
    //submit review
    $('.form-items input[type=submit]').click(function(){
       var name = $('input[name=name]').val();
       var email = $('input[name=email]').val();
       var title = $('input[name=title]').val();
       var review = $('textarea[name=review]').val();
       var post_id = $('input[name=post_id]').val();
       var star = $('#number-star').val();
       var error = $('div.errors');
       if(name == '' || email == '' || title == '' || review == ''){
           error.show().html('<span class="red">Trường * yêu cầu</span> nhập dữ liệu');
           return false;
       }
       if(name.length < 5){
          error.show().html('Tên yêu cầu từ 5 kí tự trở lên');
          return false;
       }
       if(validateEmail(email) == false){
           error.show().html('Email không đúng định dạng');
           return false;
       }
       if(title.length < 5){
          error.show().html('Tiêu đề cầu từ 5 kí tự trở lên');
          return false;
       }
       if(review.length < 10){
          error.show().html('Nội dung đánh giá yêu cầu từ 10 kí tự trở lên');
          return false;
       }
       error.show().removeClass('err-icon').html('<img src="'+window.location.origin+'/img/loading.gif" />');
       setTimeout(function(){
        $.post(window.location.origin+'/home/posts/review', {name:name, email:email, title:title, review:review, star:star, post_id:post_id}, function(result){
            if(result == 'voted'){
                error.addClass('err-icon').show().html('Bạn đã đánh giá phần mềm này rồi!');
                return false;
            }
            if(result == 'true'){
                location.reload(true);
            }           
        });
       }, 3000);
    });
    
    //validate email
    function validateEmail(email) {
        var rule = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        return rule.test(email);
    }
    //when focus
    $('.review-form-body input').focus(function(){
        $('div.errors').html('').hide();
    });
});