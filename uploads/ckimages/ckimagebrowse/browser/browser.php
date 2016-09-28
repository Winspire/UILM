
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<base>
		<link rel="stylesheet" href="browser.css">
	</head>

	<body>
		<script type="text/x-template-html" id="js-template-image">
			<a href="javascript://" class="thumbnail js-image-link" data-url="%imageUrl%"><img src="%thumbUrl%"></a>
		</script>

		<ul class="folder-switcher" id="js-folder-switcher"></ul>

		<div class="images-container" id="js-images-container">Loading..</div>

		<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="browser.js"></script>

		<script type="text/javascript">
			CkEditorImageBrowser.init();
		</script>
	</body>
</html>
