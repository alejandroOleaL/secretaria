window.onload = function() {
  CKEDITOR.replace( 'editor',
  {
    toolbar : 'Full',
    templates_files : [ './templates.js' ]
  });
}