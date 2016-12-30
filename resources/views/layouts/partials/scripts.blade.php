<!--REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('/js/chosen.jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/colorpicker/bootstrap-colorpicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/nestable/jquery.nestable.js') }}" type="text/javascript"></script>
<script src="{!!asset('/plugins/summernote/summernote.min.js')!!}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/expanding.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/starrr.js') }}" type="text/javascript"></script>

<!-- <script src="{{ asset('/plugins/tinymce/tinymce.min.js') }}" type="text/javascript"></script> -->
<!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->
<script>
//     tinymce.init({
//   selector: 'textarea',
//   height: 500,
//   theme: 'modern',
//   plugins: [
//     'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//     'searchreplace wordcount visualblocks visualchars code fullscreen',
//     'insertdatetime media nonbreaking save table contextmenu directionality',
//     'emoticons template paste textcolor colorpicker textpattern imagetools'
//   ],
//   toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
//   toolbar2: 'print preview media | forecolor backcolor emoticons',
//   image_advtab: true,
//   templates: [
//     { title: 'Test template 1', content: 'Test 1' },
//     { title: 'Test template 2', content: 'Test 2' }
//   ],
//   content_css: [
//     '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
//     '//www.tinymce.com/css/codepen.min.css'
//   ],
//   forced_root_block: false,
//   file_picker_callback : elFinderBrowser
//  });

//     function elFinderBrowser (field_name, url, type, win) {
// 	  tinymce.activeEditor.windowManager.open({
// 	    file: "<?= url('elfinder/tinymce4') ?>",// use an absolute path!
// 	    title: 'elFinder 2.0',
// 	    width: 900,
// 	    height: 450,
// 	    resizable: 'yes'
// 	  }, {
// 	    setUrl: function (url) {
// 	      win.document.getElementById(field_name).value = url;
// 	    }
//   });
//   return false;
// }
</script>
 <script src="{{ asset('/js/custom.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout.