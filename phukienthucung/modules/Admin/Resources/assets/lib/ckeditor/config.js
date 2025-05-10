CKEDITOR.editorConfig = function (config) {
	config.toolbarGroups = [
		{ name: 'document', groups: ['mode', 'document', 'doctools'] },
		{ name: 'clipboard', groups: ['clipboard', 'undo'] },
		{ name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing'] },
		{ name: 'forms', groups: ['forms'] },
		{ name: 'insert', groups: ['insert'] },
		{ name: 'tools', groups: ['tools'] },
		{ name: 'links', groups: ['links'] },
		{ name: 'about', groups: ['about'] },
		'/',
		{ name: 'styles', groups: ['styles'] },
		{ name: 'colors', groups: ['colors'] },
		{ name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
		{ name: 'paragraph', groups: ['align', 'list', 'indent', 'blocks', 'bidi', 'paragraph', 'Blockquote'] },
		'/',
		{ name: 'others', groups: ['others'] }
	];

	config.removeButtons = 'exportPdf,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,ShowBlocks,Flash,Smiley,SpecialChar,PageBreak,Iframe,Language,CreateDiv,BidiRtl,BidiLtr,Anchor,Superscript,Subscript';
	config.removePlugins = 'easyimage, cloudservices, exportpdf';
	config.extraPlugins = 'justify,youtube,tableresize,autosave,image2,blockquote';

	config.image2_alignClasses = ['image-left', 'image-center', 'image-right'];

	config.image2_captionedClass = 'image-captioned';

	config.height = '200px';
};