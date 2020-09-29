<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>A Simple Page with CKEditor</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    </meta></head>
    <body>
        <form action="guardar_documento.php" method="POST">
		<select id="etiqueta" name="etiqueta" onchange="InsertHTML()">
			<option value="(NOMPERSONA)">Nombre persona</option>
			<option value="(DNIPERSONA)">DNI persona</option>	
		</select>
		<br>
		<br>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.			
				<input type="text" name="estado" id="estado"  checked="false"></input>
            </textarea>

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