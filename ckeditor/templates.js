// Registramos las plantillas
CKEDITOR.addTemplates( 'default',
{
  // La ruta donde están las imágenes de las plantillas
  imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + 'templates/images/' ),

  // Definición de las plantillas
  templates :
  [
    {
      title: 'Plantilla 1',
      image: 'template1.gif',
      description: 'Descripci&oacute;n de la plantilla 1.',
      html:
        '<h2>Pantilla 1</h2>' +
        '<p>Inserte el texto aqu&iacute;.</p>'
    },
    {
      title: 'Plantilla 2',
      html:
      '<h3>Plantilla 2</h3>' +
      '<p>Inserte el texto aqu&iacute;.</p>'
    }
  ]
});