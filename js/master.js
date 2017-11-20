  var base = 'http://vidakovic.si/matura';

$('.user-posts').on('click', function(e){
  e.preventDefault();
  var id = $(this).data("id");
  $('.user-posts').parent().addClass('active');
  $('.user-comments').parent().removeClass('active');
  $('.user-saved').parent().removeClass('active');
  $.get(base + "/user/" +id+ "/posts", function( data ) {
  $( ".profile-content" ).html( data );
});
});

$('.user-comments').on('click', function(e){
  e.preventDefault();
  var id = $(this).data("id");
  $('.user-posts').parent().removeClass('active');
  $('.user-saved').parent().removeClass('active');
  $('.user-comments').parent().addClass('active');
  $.get(base + "/user/" +id+ "/comments", function( data ) {
  $( ".profile-content" ).html( data );
});
});

$('.user-saved').on('click', function(e){
  e.preventDefault();
  var id = $(this).data("id");
  $('.user-posts').parent().removeClass('active');
  $('.user-comments').parent().removeClass('active');
  $('.user-saved').parent().addClass('active');
  $.get(base + "/user/" +id+ "/saved", function( data ) {
  $( ".profile-content" ).html( data );
});
});

$('.user-comments').on('click', function(e){
  e.preventDefault();
});

$('.share').on('click', function(e){
  e.preventDefault();
  $(this).toggleClass('active');
  var share_container = $(this).parent().parent().parent().find('.share-container');
  share_container.slideToggle();
  share_container.find('span').on('click', function() {
    $(this).parent().slideUp();
    $(this).parent().parent().find('.share').removeClass('active');
  });
});



$('.menu-trigger').on('click', function(){
  $(this).toggleClass('open');
  $('.user-menu-mobile').toggleClass('open');
});

$('.users li .delete-user').on('click', function(){
  var id = $(this).parent().data("id");
  var user = $(this).parent();
  if (confirm('Do you really want to delete this user?')) {
    $.ajax({
        url: 'users/' + id + '/delete',
        type: "POST", // not POST, laravel won't allow it
        success: function(data){
          var data = $(data.comments);
          user.slideUp();
        }
    });

  } else {

  };
  
});

$('.edit-post').one('click', function() {
  $('.overlay').toggleClass('visible');
  $('.overlay .loading-spinner').show();
  var id = $(this).data("id");
  var kind = $(this).data("kind");
  var title =  $('.overlay .popup .content form .title');
  var url =  $('.overlay .popup .content form .url');
  var text =  $('.overlay .popup .content form .text');
    $.ajax({
        url: 'post/' + id + '/info',
        type: "POST", // not POST, laravel won't allow it
        success: function(data){
        $('.overlay .popup .content form').attr('data-id', id);
          if (kind == 1) {
               var data = $(data);
              var popup = $('.overlay .popup');
             $('.overlay .loading-spinner').hide(50);
               title.show();
               title.val(data[0].post.title);
               url.show();
               $('.overlay .popup .content form .url input').val(data[0].post.link);
               text.hide();
               console.log(data[0].post)
              $('.overlay .popup .content').delay(60).queue(function (next) { 
                $(this).css('opacity', '1');
                 next(); 
               });
          } else if (kind == 2) {
              var data = $(data);
              var popup = $('.overlay .popup');
              $('.overlay .loading-spinner').hide(50);
               title.show();
               title.val(data[0].post.title);
               text.show();
               CKEDITOR.instances.text.setData(data[0].post.text);
               $('.overlay form #textloke').val(data[0].post.text);
              $('.overlay .popup .content').delay(60).queue(function (next) { 
                $(this).css('opacity', '1');
                 next(); 
               });
          };;
          $('.overlay .loading-spinner').hide(50);
          $('.overlay .popup .content').delay(60).queue(function (next) { 
            $(this).css('opacity', '1');
             next(); 
           });
          var data = $(data);
          var popup = $('.overlay .popup');
          popup.find('.content form #title').val(data[0].post.title);
        }
    });

});

$('.overlay span').on('click', function() {
  $('.overlay').removeClass('visible');
  $('.overlay .popup .content').css('opacity', '0');
});

$('.post-update').on('submit', function(e) {
  e.preventDefault();
  var form = $('.overlay .popup .content form');
  var formData = form.serialize();
  var post = $(this).parent();
  // var novtext = form.find('#moj');
  // var text = form.find('#text').val();
  // novtext.val(text);
  // console.log(novtext.val());
  var id = $(this).data("id");
  $.ajax({
      url: 'post/' + id + '/update',
      type: "POST", 
      dataType: 'json',
      data: formData,
      success: function(data){
        var data = $(data);
        console.log(post);
        $('.overlay').removeClass('visible');
        $('.overlay .popup .content').css('opacity', '0');
      }
    });

});


  $('.confirm').one('click', function(e){
    e.preventDefault();
    var div = $(this).parent().parent().find('.unconfirmed');
    var text = $(this).parent().parent().find('.unconfirmed p');
    var btn = $(this).parent().parent().find('.unconfirmed a');
    var id = $(this).data("id");
    $.ajax({
        url: base+ '/post/' + id + '/confirm',
        type: "POST", // not POST, laravel won't allow it
        dataType: 'json',
        success: function(data){
          var data = $(data); // the HTML content your controller has produced
          div.css('opacity', '1');
          text.fadeOut();
          btn.html('Confirmed!').addClass('confirmed').delay(3000).fadeTo(500, 0);
        }
        });
  });

$('.delete').one('click', function(e){
  e.preventDefault();
  var post = $(this).parent().parent().parent();
  var id = $(this).data("id");
  $.ajax({
      url: base + '/post/' + id + '/delete',
      type: "POST", // not POST, laravel won't allow it
      dataType: 'json',
      success: function(data){
        var data = $(data); // the HTML content your controller has produced
        post.slideUp();
      }
      });
});


$('.save').one('click', function(e){
  e.preventDefault();
  var link = $(this);
  var id = $(this).data("id");
  $.ajax({
      url: base + '/post/' + id + '/save',
      type: "POST", // not POST, laravel won't allow it
      dataType: 'json',
      success: function(data){
        var data = $(data); // the HTML content your controller has produced
        console.log(data);
        link.html('unsave');
        link.toggleClass('save unsave');
      }
      });
});

$('.unsave').one('click', function(e){
  e.preventDefault();
  var link = $(this);
  var id = $(this).data("id");
  $.ajax({
      url: base + '/post/' + id + '/unsave',
      type: "POST", // not POST, laravel won't allow it
      dataType: 'json',
      success: function(data){
        var data = $(data); // the HTML content your controller has produced
        console.log(data);
        link.html('save');
        link.toggleClass('unsave save');
      }
      });
});


$('.upvote-post').one('click', function(e){
  e.preventDefault();
  var id = $(this).data("id");
  var span = $(this).parent().find('.votes-num');
  var voted = $(this).children();
  var downvoted = $(this).parent().find('.downvote-post').children();
  $.ajax({
      url: base + '/post/' + id + '/upvote',
      type: "POST", // not POST, laravel won't allow it
      dataType: 'json',
      success: function(data){
        var data = $(data); // the HTML content your controller has produced
        if (data[0].success === 1) {
          voted.removeClass('voted');
          span.html(parseInt(span.html(), 10)-1);
          console.log('voted, but changing to nothing');
        } else if (data[0].success === 2) {
          voted.addClass('voted');
          downvoted.removeClass('voted');
          span.html(parseInt(span.html(), 10)+2);
        } else if(data[0].success === 3) {
          voted.addClass('voted');
          downvoted.removeClass('voted');
          span.html(parseInt(span.html(), 10)+1);

        };
      }
      });
});

$('.downvote-post').one('click', function(e){
  e.preventDefault();
  var id = $(this).data("id");
  var span = $(this).parent().find('.votes-num');
  var voted = $(this).children();
  var downvoted = $(this).parent().find('.upvote-post').children();
  $.ajax({
      url: base + '/post/' + id + '/downvote',
      type: "POST", // not POST, laravel won't allow it
      dataType: 'json',
      success: function(data){
        var data = $(data); // the HTML content your controller has produced
        if (data[0].success === 1) {
          voted.removeClass('voted');
          console.log(data[0].message);
          console.log(data[0].success);
          span.html(parseInt(span.html(), 10)+1);
          console.log('voted, but changing to downvote');
        } else if (data[0].success === 2) {
          voted.removeClass('voted');
          downvoted.addClass('voted');
          console.log(data[0].message);
          console.log(data[0].success);
          span.html(parseInt(span.html(), 10)-2);
        } else if(data[0].success === 3) {
          voted.addClass('voted');
          downvoted.removeClass('voted');
          span.html(parseInt(span.html(), 10)-1);

        };
      }
      });
});



$('.upvote-comment').one('click', function(e){
  e.preventDefault();
  var id = $(this).parent().parent().parent().parent().data("id");
  $.ajax({
      url: base + '/comment/' + id + '/upvote',
      type: "POST", // not POST, laravel won't allow it
      dataType: 'json',
      success: function(data){
        var data = $(data); // the HTML content your controller has produced
        if (data[0].success === 1) {
          console.log('already voted, decrementing votes');
        } else if (data[0].success === 2) {
          console.log('voted');
        } else if(data[0].success === 3) {
          console.log('voted');
        };
      }
      });
});

$('.downvote-comment').one('click', function(e){
  e.preventDefault();
  var id = $(this).parent().parent().parent().parent().data("id");
  $.ajax({
      url: base + '/comment/' + id + '/downvote',
      type: "POST", // not POST, laravel won't allow it
      dataType: 'json',
      success: function(data){
        var data = $(data); // the HTML content your controller has produced
        if (data[0].success === 1) {
          console.log('already voted, decrementing votes');
        } else if (data[0].success === 2) {
          console.log('voted');
        } else if(data[0].success === 3) {
          console.log('voted');
        };
      }
      });
});


// Admin

$('.edit-user').on('click', function(e) {
  e.preventDefault();
  var id = $(this).parent().data('id');
  console.log(id);
  $('.overlay').addClass('visible');
  $('.overlay .popup .content').css('opacity', '1');
  $.ajax({
        type:'GET',
        url: base + '/popup/user/' + id + '/edit',
        dataType: "html",
        async: false,
        cache: false,
        success: function(data)
        {
            var data = $(data); 
            var content = data[4];
            $('.overlay .popup').html(data);
            $('.overlay .popup .content').css('opacity', '1');
        }
      });

});

$('.user-update').on('submit', function(e) {
  e.preventDefault();
  return false;
  // var form = $('.overlay .popup .content form');
  // var formData = form.serialize();
  // var id = $(this).data("id");
  // $.ajax({
  //     url: base + '/popup/user/' + id + '/ediz',
  //     type: "POST", 
  //     dataType: 'json',
  //     data: formData,
  //     success: function(data){
  //       var data = $(data);
  //       console.log(post);
  //       $('.overlay').removeClass('visible');
  //       $('.overlay .popup .content').css('opacity', '0');
  //     }
  //   });

});

$('.top span').on('click', function() {
  $('.overlay').removeClass('visible');
  $('.overlay .popup .content').css('opacity', '0');
});


$('.addsubform').submit(function(e){
  e.preventDefault();
  var sub = $(this).find('.add-sub').val();
  var input = $('.subforums li:last-child input');
  var form = $(this);
  var dataFrom = form.serialize()
  $.ajax({
      url: base + '/admin/addforum',
      type: "POST", 
      dataType: 'json',
      data: dataFrom,
      success: function(data){
        if (sub === "") {

        } else {
          var data = $(data); 
          $('.subforums li:last-child').prev().after('<li><a href="s/'+sub+'" title="'+sub+'">'+sub+'</a><span class="edit"><i class="icon ion-edit"></i></span><span class="delete"><i class="icon ion-ios-trash"></i></span></li>')
          $('.subs li:last-child').after('<li><a href="s/'+sub+'" title="'+sub+'">'+sub+'</a></li>')
          input.val('');
        };
      }
      });
});

$('.more-mobile').on('click', function() {
  $('.mobile-actions').addClass('show');
});

$('.mobile-actions .bg').on('click', function() {
  $('.mobile-actions').removeClass('show');
});