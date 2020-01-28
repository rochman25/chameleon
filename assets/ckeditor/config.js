/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function(config) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	// The toolbar groups arrangement, optimized for two toolbar rows.

	config.toolbarGroups = [
		{ name: "clipboard", groups: ["clipboard", "undo"] },
		{ name: "editing", groups: ["find", "selection", "spellchecker"] },
		{ name: "links" },
		// { name: "insert" },
		// { name: "forms" },
		{ name: "tools" },
		{ name: "document", groups: ["mode", "document", "doctools"] },
		{ name: "others" },
		"/",
		{ name: "basicstyles", groups: ["basicstyles", "cleanup"] },
		{
			name: "paragraph",
			groups: ["list", "indent", "blocks", "align", "bidi"]
		},
		{ name: "styles" },
		{ name: "colors" },
		{ name: "about" }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removePlugins = "image";
	config.removePlugins = "easyImage";
	config.cloudServices_tokenUrl = "http://localhost/anemia_desi";
	config.cloudServices_uploadUrl =
		"http://localhost/anemia_desi/assets/upload/";
	config.removeButtons = "Underline,Subscript,Superscript";
	// config.filebrowserImageBrowseUrl =
	// 	"http://localhost/anemia_desi/assets/kcfinder/browse.php";
	// Set the most common block elements.
	config.format_tags = "p;h1;h2;h3;pre";

	// let url = "http://localhost/anemia_desi/";
	// config.filebrowserBrowseUrl = url + "assets/ckfinder/ckfinder.html";
	// config.filebrowserImageBrowseUrl =
	// 	url + "assets/ckfinder/browse.php?type=images";
	// config.filebrowserFlashBrowseUrl =
	// 	url + "assets/ckfinder/browse.php?type=flash";
	// config.filebrowserUploadUrl = url + "assets/kcfinder/upload.php?type=files";
	// config.filebrowserImageUploadUrl =
	// 	url + "assets/ckfinder/upload.php?type=images";
	// config.filebrowserFlashUploadUrl =
	// 	url + "assets/ckfinder/upload.php?type=flash";
	// config.filebrowserWindowWidth = "1000";
	// config.filebrowserWindowHeight = "700";
};
