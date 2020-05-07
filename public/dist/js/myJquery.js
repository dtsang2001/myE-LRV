$(document).ready(function(){

	$('#file').change(function(x){

		$('#myViewChild').remove();
		$('#myViewParent').append(" <div id='myViewChild' class='clearfix'> </div> ");

		var files = x.target.files;
		var newFileList = Array.from(x.target.files);

		for (var i = 0, f; f = files[i]; i++) {
		
			$('#myViewChild').append(" <div id='myViewImage"+ i +"' class='myImage'> </div> ")
			$('#myViewImage'+i+'').append(" <img src='"+URL.createObjectURL(files[i])+"'> ");
			console.log(newFileList);

		};
	});

	$('#avatar').change(function(x){

		$('#myViewChild').remove();
		$('#myViewParent').append(" <div id='myViewChild' class='clearfix'> </div> ");

		var files = x.target.files;
		var newFileList = Array.from(x.target.files);

		for (var i = 0, f; f = files[i]; i++) {
		
			$('#myViewChild').append(" <div id='myViewImage"+ i +"' class='myFileAvatar'> </div> ")
			$('#myViewImage'+i+'').append(" <img src='"+URL.createObjectURL(files[i])+"' class='img-circle'> ");
			console.log(newFileList);

		};
	});

	$('#avatar_fe').change(function(x){

		$('#myViewChild').remove();
		$('#myViewParent').append(" <div id='myViewChild' class='clearfix'> </div> ");

		var files = x.target.files;
		var newFileList = Array.from(x.target.files);

		for (var i = 0, f; f = files[i]; i++) {
		
			$('#myViewChild').append(" <div id='myViewImage"+ i +"' class='myImage myImageFe'> </div> ")
			$('#myViewImage'+i+'').append(" <img class='profile-user-img img-fluid img-circle' src='"+URL.createObjectURL(files[i])+"'> ");
			console.log(newFileList);

		};
	});

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('#csrf_token').attr('value')
	    }
	});

	$.fn.ajaxPostParent = function(){
		var comment = $("#comment_parent").val();
		var id_product = $('#product_id').attr('value');
		var id_news = $('#news_id').val();
		var parent_comment_id = $("#parent_comment_id").val();

		$.ajax({

           	type:'POST',

           	url:'http://localhost/myProject/ajaxComment',

           	data:{'comment': comment, 'id_product':id_product, 'id_news':id_news, 'parent_comment_id':parent_comment_id},

           	success:function(data){

              	$('#box-cmt').prepend("<li id='cmt1_"+up+"' class='comment mycmt'></li>");
              	$('#cmt1_'+up).append("<div id='cmt2_"+up+"' class='comment-item clearfix'>  </div>");

              	$('#cmt2_'+up).append("<div class='comment-avatar'> <img class='avatar' src='"+ $('#auth_comment').attr("src") +"' style='width: 45px; height: 45px; object-fit: cover;' /> </div>");

              	$('#cmt2_'+up).append("<div id='cmt3_"+up+"' class='comment-content'> </div>");

              	$('#cmt3_'+up).append("<div id='cmt3_1_"+up+"' class='comment-meta'> <h5 itemprop='author' class='author_name'>"+ $('#auth_name_comment').text() +" </h5> <span class='comment-date'> <small> Vừa xong </small> </span> </div>");
              	$('#cmt3_1_'+up).append("<button id='a"+up+"' type='button' class='btn btn-link btn-cmt' style='float: right; padding-top: 0; color: black'> 0 bình luận </button>")

              	$('#cmt3_'+up).append("<div class='description' itemprop='description'> "+ comment +" </div>")

              	$('#cmt3_'+up).append("<div id='comment-child-a"+up+"' style='display: none;'> </div>");

              	$('#cmt3_'+up).append("<div id='cmt4_"+up+"' style='margin-top: 20px;'> </div>")

              	$('#cmt4_'+up).append("<div class='comment-avatar'> <img class='avatar' src='"+ $('#auth_comment').attr("src") +"' style='width: 38px; height: 38px; object-fit: cover;' /> </div>")

              	$('#cmt4_'+up).append("<div class='comment-content'> <div id='cmt5_"+up+"' class='input-group'> </div> </div>")

              	$('#cmt5_'+up).append("<input type='text' id='comment_child_a"+up+"' name='a"+up+"' class='post-enter form-control' placeholder='Trả lời'> <span class='input-group-btn'> <button name='a"+up+"' class='btn_reply_child btn btn-default' style='background: gray; border: 1px solid gray'><i class='glyphicon glyphicon-send'></i></button> </span>")

              	$('#cmt5_'+up).append("<input type='hidden' id='parent_comment_id_a"+up+"' name='parent_comment_id' value='"+data.id_comment+"' />")

              	$('#cmt5_'+up).append("<input type='hidden' id='id_product' name='id_product' value='"+data.id_product+"' />")

              	$('#count_parent_comment').text("("+$('.mycmt').length+")");

              	$("#comment_parent").val("");

              	up++;
           	}

        });
	}

	var up = 0;

	$("#btn_reply").click(function(){
		$.fn.ajaxPostParent();
	});

	$("#comment_parent").keypress(function(event){
		var keycodeParent = (event.keyCode ? event.keyCode : event.which);
		if (keycodeParent == '13') {
			$.fn.ajaxPostParent();
		}
	});

});

$.fn.ajaxPostChild = function(signal){
	var comment = $("#comment_child_"+signal).val();
	var id_product = $('#product_id').attr('value');
	var id_news = $('#news_id').val();
	var parent_comment_id = $("#parent_comment_id_"+signal).val();

	$.ajax({

       	type:'POST',

       	url:'http://localhost/myProject/ajaxComment',

       	data:{'comment': comment, 'id_product':id_product, 'id_news':id_news, 'parent_comment_id':parent_comment_id},

       	success:function(data){ 

       		$('#comment-child-'+signal).append("<div id='child_"+up_child+"' style='margin-top: 20px;'> </div>");



       		$('#child_'+up_child).append("<div class='comment-avatar user_comment_"+signal+"'> <img class='avatar' src='"+ $('#auth_comment').attr("src") +"' style='width: 38px; height: 38px; object-fit: cover;'> </div>")

       		$('#child_'+up_child).append("<div class='comment-meta'> <h5 itemprop='author' class='author_name'> "+ $('#auth_name_comment').text() +" </h5><span class='comment-date'><small> Vừa xong </small> </span> </div>")

       		$('#child_'+up_child).append("<div class='description' itemprop='description'> "+comment+" </div>")

          	$("#comment_child_"+signal).val("");

          	$('#comment-child-'+signal).show(500);

          	$('#count_child_comment_'+signal).text($('.user_comment_'+signal).length)

          	up_child++;
       	}

    });
}

var up_child = 0;

$(document).on('click', '.btn_reply_child', function(){
	$.fn.ajaxPostChild($(this).attr("name"));
});

$(document).on('keypress', '.post-enter', function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if (keycode == '13') {
		$.fn.ajaxPostChild($(this).attr("name"));
	}
});

$(document).on('click', '.btn-cmt', function(){
	$('#comment-child-'+$(this).attr("id")).toggle(500);
});