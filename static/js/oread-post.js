 function followCategory(url,id,text,action,followers){
$.ajax({
  url: url,
  type: 'post',
  data: { 'id': id, 'text': text, 'action':action},
  datatype: 'html',
  success: function(rsp){


    switch(text) {
      case "follow":
      followers = parseInt(followers)+1;
      var span = $('<span/>').attr('class','followers').html((followers) + ' Followers');
      $(".followers").html(span);

var div = $('<div />').attr('class', 'follow-btn red').attr('onclick','followCategory("'+url+'","'+id+'","unfollow","'+action+'","'+(followers)+'")').html("Unfollow");
$(".follow-btn-link").html(div);

      break;
      case "unfollow":
      followers = parseInt(followers)-1;
      var span = $('<span/>').attr('class','followers').html((followers) + ' Followers');
      $(".followers").html(span);
     
     var div = $('<div />').attr('class', 'follow-btn').attr('onclick','followCategory("'+url+'","'+id+'","follow","'+action+'","'+(followers)+'")').html("Follow");
$(".follow-btn-link").html(div);
      break;
    }

  }
});
}

function addLikes(url,id,text,action){  
  
  var parEleID = "like_a_"+id;
  //var spantemp = $('<span />').attr('class', 'fa fa-spinner').html("");
  var likes = parseInt($.trim($('#like_span_'+id).text()));     
 // $('#'+parEleID).html(spantemp);

  $.ajax({
    url: url,
    type: 'post',
    data: { 'id': id, 'text': text, 'action':action},
    datatype: 'html',
    success: function(rsp){
var spanCount = $('<span />').attr('id', 'like_span_'+id);
      switch(text) {
        case "like":
        likes = likes+1;    
        spanCount.html(likes); 
        var span = $('<span />').attr('id', 'like_'+id).attr('class', 'fa fa-heart fa-lg').attr('onclick','addLikes("'+url+'","'+id+'","unlike","'+action+'")').css('color','#F00').html("");
        $('#'+parEleID).html(span).append(spanCount);        
        break;
        case "unlike":
        likes = likes-1;
        spanCount.html(likes);
        var span = $('<span />').attr('id', 'like_'+id).attr('class', 'fa fa-heart fa-lg').attr('onclick','addLikes("'+url+'","'+id+'","like","'+action+'")').css('color','#cbcbcb').html("");

        $('#'+parEleID).html(span).append(spanCount);
        break;
      }

    }
  });
}


function addLikes_(url,id,text,action) {
  $('.demo-table #tutorial-'+id+' li').each(function(index) {
    $(this).addClass('selected');
    $('#tutorial-'+id+' #rating').val((index+1));
    if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
      return false; 
    }
  });
  $.ajax({
    url: "add_likes.php",
    data:'id='+id+'&action='+action,
    type: "POST",
    beforeSend: function(){
      $('#tutorial-'+id+' .btn-likes').html("<img src='LoaderIcon.gif' />");
    },
    success: function(data){
      var likes = parseInt($('#likes-'+id).val());
      switch(action) {
        case "like":
        $('#tutorial-'+id+' .btn-likes').html('<input type="button" title="Unlike" class="unlike" onClick="addLikes('+id+',\'unlike\')" />');
        likes = likes+1;
        break;
        case "unlike":
        $('#tutorial-'+id+' .btn-likes').html('<input type="button" title="Like" class="like"  onClick="addLikes('+id+',\'like\')" />')
        likes = likes-1;
        break;
      }
      $('#likes-'+id).val(likes);
      if(likes>0) {
        $('#tutorial-'+id+' .label-likes').html(likes+" Like(s)");
      } else {
        $('#tutorial-'+id+' .label-likes').html('');
      }
    }
  });
}