
<?
	include("ckeditor/ckeditor.php");
	$CKEditor = new CKEditor();
	$CKEditor->returnOutput = true;
	$CKEditor->basePath = 'ckeditor/';
	
	$config['toolbar'] = array(
		array( 'Source','-',
			  'NewPage','Preview','Templates','-',
			  'Cut','Copy','Paste','PasteText','PasteFromWord','-',
			  'Undo','Redo','-',
			  'Find','Replace','-',
			  'SelectAll','RemoveFormat','-',
			  'Maximize', 'ShowBlocks'),
		'/',
		array('Bold','Italic','Underline','Strike','-',
			  'Subscript','Superscript','-',
			  'NumberedList','BulletedList','-',
			  'Outdent','Indent','Blockquote','-',
			  'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-',
			  'Link','Unlink','Anchor','-',
			  'Image','Flash','Table','HorizontalRule','SpecialChar'
			  ),
		'/',
		array('Format','Font','FontSize','-',
			  'TextColor','BGColor')
	);
	//$config['removePlugins']='elementspath';
	$config['removePlugins']='resize';
	$config['resize_enabled ']=false;
	
	$CKEditor->config['width'] = 890;
	$CKEditor->config['height'] = 300;
?>