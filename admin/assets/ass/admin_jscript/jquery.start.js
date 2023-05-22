// Start
$(document).ready(function(){
	// FCKeditor
	$("textarea.FCKeditor").each(function(){
		var oFCKeditor = new FCKeditor(this.name);
		oFCKeditor.BasePath	= 'fckeditor/' ;
		oFCKeditor.Config['SkinPath'] = 'skins/silver/';
		//default
		oFCKeditor.Width = '800';
		oFCKeditor.Height = '400px';
		oFCKeditor.ReplaceTextarea();
	});
	
});