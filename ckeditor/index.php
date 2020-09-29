<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SECRETARÍA DE CONTRALORÍA Y TRANSPARENCIA GUBERNAMENTAL</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="ckeditor.js" type="text/javascript"></script>
		<script src="editor.js"></script>
		<link rel="stylesheet" href="css/estilos.css"
    </meta>
	
	  <style type="text/css">
 p { color: red; font-family: Verdana; }
  </style>
	</head>
    <body>
        <form action="guardar_documento.php" method="POST">
		<select id="etiqueta" name="etiqueta" onchange="InsertHTML()">
			<option value="(NOMPERSONA)">Nombre persona</option>
			<option value="(DNIPERSONA)">DNI persona</option>	
		</select>
		<br>
		<br>
            <textarea name="editor1" id="editor1" rows="100" cols="150">
                SECRETARÍA DE CONTRALORÍA Y TRANSPARENCIA GUBERNAMENTAL
				<p id="parrafo">RESGUARDO INTERNO DE BIENES MUEBLES</p>
									<div> </div>
				<input type="text"  id="cargo" name="cargo" >
            </textarea>
			<input type="checkbox" name="estado" id="estado" value="1" checked="true"></input>
									

            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
			<script>
				function InsertHTML() {
				// Get the editor instance that we want to interact with.
				var editor = CKEDITOR.instances.editor1;
				var value = document.getElementById( 'etiqueta' ).value;

				// Check the active editing mode.
				if ( editor.mode == 'wysiwyg' )
				{
					// Insert HTML code.
					// https://docs.ckeditor.com/ckeditor4/docs/#!/api/CKEDITOR.editor-method-insertHtml
					editor.insertHtml( value );
				}
				else
					alert( 'You must be in WYSIWYG mode!' );
}
			</script>
        </form>
    </body>
</html>