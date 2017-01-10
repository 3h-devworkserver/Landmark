function winheight($class){
        var win = $(window).height();
        win = (win < 200) ? 350 : win;
        $('.error .wrapper').height(win);
}

$(document).ready(function(){ 
	
    winheight();

    $('form textarea').summernote({
              height:300,
              codemirror: { // codemirror options
                theme: 'monokai'
              }
    }); 

    $('#example').DataTable();
    $('#college').select2({   placeholder: "Select a college", allowClear: true})
    $('#courselevel').select2({   placeholder: "Select a course level", allowClear: true})
    $('#course').select2({   placeholder: "Select a course", allowClear: true})
    $('#country').select2({   placeholder: "Select a country", allowClear: true})
    $('#countries').select2({  placeholder: "Select a country", allowClear: true  })
    $('.datepicker').datepicker({format:'yyyy-mm-dd'})
    
    //=========sidebar menu=============//

    $('.sidebar-menu li').on('click',function(){
        if(!$(this).hasClass() == 'active'){
            $(this).addClass('active')
            $('.sidebar-menu li').removeClass('active')
        }
    })

  $('.sidebar-menu li ul.treeview-menu').on('click',function(){
    if(!$(this).hasClass() == 'active'){
            $(this).addClass('active')
            $(this).parent('li').addClass('active')
            $('.sidebar-menu li').removeClass('active')
        }
  })
    $('#pcolor, #scolor, #color1, #color2, #color3, #color4, #color5, #color6').colorpicker();

    //---------static change ----------//
    $(document).on('change','#Option', function(){
    	var value = $(this).val()
    	if( value == 'img'){
    		$(this).parent().children('.wrap-background-img').show()
    		$(this).parent().children('.wrap-background-color').hide()    		
    	}else{
    		$(this).parent().children('.wrap-background-img').hide()
    		$(this).parent().children('.wrap-background-color').show()    		
    	}
    })

    //------slider add more --------//
    var clicks = 0; 
    $(document).on('click','.addmorebtn',function(){
        clicks++;
        $('.add .counter').val(clicks)
        //$('.add .sliderid').val(clicks)
        var count = $('.add .counter').val(); 
        //$('.add #sliderimg').attr('name','sliderimg'+clicks+'[]')
        $('.add .sliderimg').attr('id','sliderimg'+count)
        $('.add .iconimg').attr('id','iconimg'+count)
        //$('.add #iconimg').attr('name','iconimg'+clicks+'[]')
        $('.add .bgimg').attr('id','bgimg'+count)
        $('.add .iconimgs').attr('id','iconimgs'+count)        
        $('.add .textarea').attr('id','sliderdesc'+count)

        //$('.add #sliderimg'+count).attr('onchange','readURL(this, '+count+');')
         var html = $('.add').html()
        $('.form-horizontal #add-slider-wrap').append(html)
        if (clicks > 0) {
        $('#sliderimg'+count).attr('onchange','readURL(this, '+count+');')
        $('#iconimg'+count).attr('onchange','readURL1(this, '+count+');')
         $('form #add-slider-wrap #sliderdesc'+count).summernote({
              height:300,
              codemirror: { // codemirror options
                        theme: 'monokai'
                         }
            })
        }
        

    })

//-----------static add more --------------//
//$('.staticform').find('select').chosen()

 $(document).on('click','.addmoreblock',function(){
       clicks++;
        $('.addstatic .counter').val(clicks)
        //$('.add .sliderid').val(clicks)
        var count = $('.addstatic .counter').val();
        $('.addstatic .textarea').attr('id','pagedesc'+count)
        $('.addstatic #order').val(count);
        var html = $('.addstatic').html()
        $('.staticform').append(html)
        $('#pcolor, #scolor, #color1, #color2, #color3, #color4, #color5, #color6').colorpicker();
        if(clicks > 0){
        $('form .staticblock #pagedesc'+count).summernote({
              height:300,
              codemirror: { // codemirror options
                        theme: 'monokai'
                         }
            })
        }
 })

 //-----------add more country------------------------//

 $(document).on('click','.addmorecountry',function(){
       clicks++;
        $('.countryadd .counter').val(clicks)
        var count = $('.countryadd .counter').val(); 
        $('.countryadd .bgimg').attr('id','bgimg'+count)
        $('.countryadd #headerimg').attr('class','headerimg'+count)

        $('.countryadd .icon-upload').attr('id','icon-upload'+count)
        $('.countryadd .icon-uploadheader').attr('id','icon-uploadheader'+count)
        $('.countryadd .textarea').attr('id','pagedesc'+count)
        $('.countryadd .innertextarea').attr('id','innerpagedesc'+count)
        var html = $('.countryadd').html()
        $('.form-horizontal .country-wrap .firstsectionwrap').append(html)
        if (clicks > 0) {
        $('#icon-upload'+count).attr('onchange','readURL(this, '+count+');')
        $('#icon-uploadheader'+count).attr('onchange',"readfeatured10(this, 'headerimg"+count+"');")
         $('form .country-wrap #pagedesc'+count).summernote({
              height:200,
              codemirror: { // codemirror options
                        theme: 'monokai'
                         }
            })
         $('form .country-wrap #innerpagedesc'+count).summernote({
              height:300,
              codemirror: { // codemirror options
                        theme: 'monokai'
                         }
            })
        }
       
 })

//-----------add more College------------------------//

 $(document).on('click','.addmorecollege',function(){
       clicks++;
        $('.collegeadd .counter').val(clicks)
        var count = $('.collegeadd .counter').val(); 
        $('.collegeadd .bgimg').attr('id','bgimg'+count)
        $('.collegeadd #headerimg').attr('class','headerimg'+count)

        $('.collegeadd .icon-upload').attr('id','icon-upload'+count)
        $('.collegeadd .icon-uploadheader').attr('id','icon-uploadheader'+count)
        $('.collegeadd .textarea').attr('id','pagedesc'+count)
        $('.collegeadd .coursepagedesc').attr('id','coursepagedesc'+count)
        var html = $('.collegeadd').html()
        $('.form-horizontal .college-wrap ').append(html)
        if (clicks > 0) {
        $('#icon-upload'+count).attr('onchange','readURL(this, '+count+');')
        $('#icon-uploadheader'+count).attr('onchange',"readfeatured10(this, 'headerimg"+count+"');")
         $('form .college-wrap #pagedesc'+count).summernote({
              height:200,
              codemirror: { // codemirror options
                        theme: 'monokai'
                         }
            })
         $('form .college-wrap #coursepagedesc'+count).summernote({
              height:300,
              codemirror: { // codemirror options
                        theme: 'monokai'
                         }
            })

        }
       
 })

 //-----------add more course------------------------//

 $(document).on('click','.addmorecourses',function(){
       clicks++;
        $('.courseadd .counter').val(clicks)
        var count = $('.courseadd .counter').val(); 
        $('.courseadd .bgimg').attr('id','bgimg'+count)
        $('.courseadd #headerimg').attr('class','headerimg'+count)

        $('.courseadd .icon-upload').attr('id','icon-upload'+count)
        $('.courseadd .icon-uploadheader').attr('id','icon-uploadheader'+count)
        $('.courseadd .textarea').attr('id','pagedesc'+count)
        var html = $('.courseadd').html()
        $('.form-horizontal .course-wrap ').append(html)
        if (clicks > 0) {
        $('#icon-upload'+count).attr('onchange','readURL(this, '+count+');')
        $('#icon-uploadheader'+count).attr('onchange',"readfeatured10(this, 'headerimg"+count+"');")
         $('form .course-wrap #pagedesc'+count).summernote({
              height:200,
              codemirror: { // codemirror options
                        theme: 'monokai'
                         }
            })
        }
       
 })

 //-----------add college's tabs------------------------//

 $(document).on('click','.addmorecollegetab',function(){
       clicks++;
        $('.collegetabadd .counter').val(clicks)
        var count = $('.collegetabadd .counter').val();
        $('.collegetabadd .textarea').attr('id','pagedesc'+count)
        var html = $('.collegetabadd').html()
        $('.form-horizontal .collegetab-wrap .firstsectionwrap').append(html)
         if (clicks > 0) {
          $('form .collegetab-wrap #pagedesc'+count).summernote({
              height:200,
              codemirror: { // codemirror options
                        theme: 'monokai'
                         }
            })
        }
       
 })

  //-----------add course's tabs------------------------//

 $(document).on('click','.addmorecoursetab',function(){
       clicks++;
        $('.coursetabadd .counter').val(clicks)
        var count = $('.coursetabadd .counter').val();
        $('.coursetabadd .textarea').attr('id','pagedesc'+count)
        var html = $('.coursetabadd').html()
        $('.form-horizontal .coursetab-wrap ').append(html)
         if (clicks > 0) {
          $('form .coursetab-wrap #pagedesc'+count).summernote({
              height:200,
              codemirror: { // codemirror options
                        theme: 'monokai'
                         }
            })
        }
       
 })

  //-----------add country's universities------------------------//

 $(document).on('click','.addcountryuniversity',function(){
       clicks++;
        $('.countryuniversityadd .counter').val(clicks)
        var count = $('.countryuniversityadd .counter').val(); 
        $('.countryuniversityadd .bgimg').attr('id','bgimg'+count)
        $('.countryuniversityadd .icon-upload').attr('id','icon-upload'+count)
        var html = $('.countryuniversityadd').html()
        $('.form-horizontal .countryuniversity-wrap .firstsectionwrap').append(html)
        if (clicks > 0) {
        $('#icon-upload'+count).attr('onchange','readURL(this, '+count+');')
        }
       
 })

 //-----------add more country static block------------------------//

 $(document).on('click','.addcountryblock',function(){
       clicks++;
        $('.countryaddblock .counter').val(clicks)
        var count = $('.countryaddblock .counter').val(); 
        $('.countryaddblock .bgimg').attr('id','bgimg'+count)
        $('.countryaddblock .featuredimg').attr('id','featuredimg'+count)
        $('.countryaddblock .textarea').attr('id','pagedesc'+count)
        var html = $('.countryaddblock').html()
        $('.form-horizontal .countryblock-wrap .firstsectionwrap').append(html)
        $('#pcolor, #scolor, #color1, #color2, #color3, #color4, #color5, #color6').colorpicker();
        if (clicks > 0) {
        $('#featuredimg'+count).attr('onchange','readURL(this, '+count+');')
         $('form .countryblock-wrap #pagedesc'+count).summernote({
              height:300,
              codemirror: { // codemirror options
                        theme: 'monokai'
                         }
            })
        }
       
 })

 //-----------add more country section------------------------//

 $(document).on('click','.addcountrysection',function(){
       clicks++;
        $('.countryaddsection .counter').val(clicks)
        var count = $('.countryaddsection .counter').val(); 
        $('.countryaddsection .bgimg').attr('id','bgimg'+count)
        $('.countryaddsection #headerimg').attr('class','headerimg'+count)
        $('.countryaddsection .icon-upload').attr('id','icon-upload'+count)
        $('.countryaddsection .icon-uploadheader').attr('id','icon-uploadheader'+count)
        $('.countryaddsection .textarea').attr('id','pagedesc'+count)
        var html = $('.countryaddsection').html()
        $('.form-horizontal .countrysection-wrap .firstsectionwrap').append(html)
        if (clicks > 0) {
        $('#icon-upload'+count).attr('onchange','readURL(this, '+count+');')
        $('#icon-uploadheader'+count).attr('onchange',"readfeatured10(this, 'headerimg"+count+"');")
         $('form .countrysection-wrap #pagedesc'+count).summernote({
              height:300,
              codemirror: { // codemirror options
                        theme: 'monokai'
                     }
            })
        }
       
 })

 //-----------country add more menu------------------------//

 $(document).on('click','.addcountrymenu',function(){
       clicks++;
        $('.countrymenuadd .counter').val(clicks)
        var count = $('.countrymenuadd .counter').val(); 
        $('.countrymenuadd .bgimg').attr('id','bgimg'+count)
        $('.countrymenuadd #headerimg').attr('class','headerimg'+count)
        $('.countrymenuadd .icon-upload').attr('id','icon-upload'+count)
        $('.countrymenuadd .icon-uploadheader').attr('id','icon-uploadheader'+count)
        $('.countrymenuadd .textarea').attr('id','pagedesc'+count)
        var html = $('.countrymenuadd').html()
        $('.form-horizontal .countrymenu-wrap .firstsectionwrap').append(html)
       if (clicks > 0) {
        $('#icon-upload'+count).attr('onchange','readURL(this, '+count+');')
        $('#icon-uploadheader'+count).attr('onchange',"readfeatured10(this, 'headerimg"+count+"');")
         $('form .countrymenu-wrap #pagedesc'+count).summernote({
              height:300,
              codemirror: { // codemirror options
                        theme: 'monokai'
                     }
            })
        }
       
 })
 //-----------country accordion add more------------------------//

 $(document).on('click','.addcountryaccordion',function(){
       clicks++;
        $('.countryaddaccordion .counter').val(clicks)
        var count = $('.countryaddaccordion .counter').val(); 
        $('.countryaddaccordion .textarea').attr('id','pagedesc'+count)
        var html = $('.countryaddaccordion').html()
        $('.form-horizontal .countryaccordion-wrap .firstsectionwrap').append(html)
        if (clicks > 0) {
         $('form .countryaccordion-wrap #pagedesc'+count).summernote({
              height:300,
              codemirror: { // codemirror options
                        theme: 'monokai'
                     }
            })
        }
       
 })

 //-----------Universities Add------------------------//

 $(document).on('click','.addmoreuniversities',function(){
       clicks++;
        $('.universityadd .counter').val(clicks)
        var count = $('.universityadd .counter').val(); 
        var html = $('.universityadd').html()
        $('.form-horizontal .universitywrap .firstsectionwrap').append(html)
            
 })




    //-----------newsevent image upload ------------//

    $(document).on('click','#uploadimg .addimg',function(){
        clicks++;
            $('#uploadimg .box-body').append('<div class="wrap"><span class="btn btn-default btn-file"><i class="fa fa-folder-open"></i>Upload Image<input type="file" name="uploadimg[]" onchange="readURL12(this,'+clicks+');" accept="image/*" class="icon-upload"></span><img id="preview"  class="manage-width icon-img'+clicks+'" src="#" alt="Icon" style="display:none;" /></div>')
    })

     /* Delete event image uploaded */

    $(document).on('click','a#deleteimg',function(){
        var id = $(this).attr('data-id')
        var eid = $(this).attr('data-event-id')
        var _this = $(this);
         $.ajax({
            type: "POST",
            url: base_url+'/events/imgdelete',
            data: { 
                pid : id,
                eid : eid
                },
            dataType: 'json',
        })
       .done(function(data) { 
        console.log(data)
        _this.parent().children('img').attr('src','')
        //$('.bg-img.featured-img').css('background-image', 'url()')
       })
       .fail(function() { console.log('error'); })

    })

    //------------- Add Contact Backend ------------//

    $(document).on('click','#addcontact',function(){
        clicks++;
        $('.add-box-body .counter').val(clicks)
        var html = $('.add-box-body').html()
        $('.contactform .box').append(html)
    })

    /* Delete featured image */

    $(document).on('click','a#delete',function(){
        var id = $(this).attr('data-id')
        var returnurl = $(this).attr('data-url')
        var tables = $(this).attr('data-table')
         $.ajax({
            type: "POST",
            url: base_url+'/delete/featuredimg',
            data: { 
                pid : id,
                table : tables
                },
            dataType: 'json',
        })
       .done(function(data) { 
        $('.bg-img.featured-img').css('background-image', 'url()')
       })
       .fail(function() { console.log('error'); })

    })

    /* Menu Management */


  $('.dd').nestable({ 
    dropCallback: function(details) {
       
       var order = new Array();
       $("li[data-id='"+details.destId +"']").find('ol:first').children().each(function(index,elem) {
         order[index] = $(elem).attr('data-id');
       });

       if (order.length === 0){
        var rootOrder = new Array();
        $("#nestable > ol > li").each(function(index,elem) {
          rootOrder[index] = $(elem).attr('data-id');
        });
       }
       $.ajax({
            type: "POST",
            url: base_url+'/menus/order',
            data: { source : details.sourceId, 
                    destination: details.destId, 
                    order:JSON.stringify(order),
                    rootOrder:JSON.stringify(rootOrder) 
                },
            dataType: 'json',
        })
       .done(function(data) { 
          $( "#success-indicator" ).fadeIn(100).delay(1000).fadeOut();
       })
       .fail(function() { console.log('error'); })
     }
   });

  $('.delete_toggle').each(function(index,elem) {
      $(elem).click(function(e){
        e.preventDefault();
        // alert('here');
        $('#postvalue').attr('value',$(elem).attr('rel'));
        $('#deleteModal').modal('toggle');
      });
  });

 
})

 function readURL(input,id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // $('.bg-img')
                    //     .attr('src', e.target.result)
                    //     .width(150)
                    //     .height(200);
                    if(id == ''){
                        $('.bg-img').css('background-image','url('+ e.target.result + ')')
                        $('.bg-img').addClass('slider-image')
                    }else{
                        $('form .inner-wrap.second #bgimg'+id).css('background-image','url('+ e.target.result + ')')
                        $('form .inner-wrap.second #bgimg'+id).css({
                            'background-repeat':'no-repeat',
                            'background-size':'cover',
                            '-webkit-background-size':'cover',
                            'min-height': '400px',
                            'background-position':'center'
                        })
                   // $('.inner-wrap.second #bgimg'+id).addClass('slider-image')
                    }
                };

                reader.readAsDataURL(input.files[0]);
            }else{
                   if(id == ''){
                        $('.bg-img').css('background-image','url('+ e.target.result + ')')
                    }else{
                        $('form .inner-wrap.second #bgimg'+id).css('background-image','url()')
                    }
            }
} 

function readURL1(input,id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    if(id == ''){
                        $('form .icon-img')
                        .attr('src', e.target.result)
                        .width(110)
                        .height(110);
                    }else{

                    $('form .inner-wrap.second #iconimgs'+id)
                        .attr('src', e.target.result)
                        .width(110)
                        .height(110);
                    }
                    
                };

                reader.readAsDataURL(input.files[0]);
            }else{
                  if(id == ''){
                        $('form .icon-img')
                        .attr('src', '')
                        ;
                    }else{

                    $('form .inner-wrap.second #iconimgs'+id)
                        .attr('src', '')
                        ;
                    }
            }
}
function readURL12(input,id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    if(id == ''){
                        $('form .icon-imgs')
                        .attr('src', e.target.result);
                        $('form .icon-imgs').show()
                    }else{

                    $('form .icon-img'+id)
                        .attr('src', e.target.result);
                        $('form .icon-img'+id).show()
                    }
                    
                };

                reader.readAsDataURL(input.files[0]);
            }else{
                  if(id == ''){
                        $('form .icon-imgs')
                        .attr('src', '');
                    }else{

                    $('form .icon-img'+id)
                        .attr('src', '');
                    }
            }
}

function readfeatured(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                
                        $('.bg-img').addClass('featured-img')
                        $('.featured-img').css('background-image','url('+ e.target.result + ')')
                
                };

                reader.readAsDataURL(input.files[0]);
            }else{
                $('.featured-img').css('background-image','url()')
            }
} 
function readfeatured10(input,classname) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                $('form .'+classname).css('background-image','url('+ e.target.result + ')')
                };
                $('form .'+classname).show()
                $('form .'+classname).addClass('header-img')

                reader.readAsDataURL(input.files[0]);
            }else{
                $('form .'+classname).css('background-image','url()')
                $('form .'+classname).removeClass('header-img')
            }
} 
function readfeatured1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                
                       $('form .icon-img')
                        .attr('src', e.target.result)
                        $('form .icon-img').show()
                };

                reader.readAsDataURL(input.files[0]);
            }else{
                $('form .icon-img')
                        .attr('src', '')
            }
} 