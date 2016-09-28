<?php

// Required: anonymous function reference number as explained above.
$funcNum = $_GET['CKEditorFuncNum'] ;
// Optional: instance name (might be used to load a specific configuration file or anything else).
$CKEditor = $_GET['CKEditor'] ;
// Optional: might be used to provide localized messages.
$langCode = $_GET['langCode'] ;
 
// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
$url = 'http://localhost/uilm/uploads/ckimages/'.$_FILES['NewFile']['tmp_name'];
// Usually you will only assign something here if the file could not be uploaded.
$message = '';
 
echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";

// Get the CKEditor Callback
$CKEcallback = $_GET['CKEditorFuncNum'];
 
//pass it on to file upload function
FileUpload( $sType, $sCurrentFolder, $sCommand, $CKEcallback );
 
 // Notice the last paramter added to pass the CKEditor callback function
function FileUpload( $resourceType, $currentFolder, $sCommand, $CKEcallback = '' )
{
	if (!isset($_FILES)) {
		global $_FILES;
	}
	$sErrorNumber = '0' ;
	$sFileName = '' ;
 
        //PATCH to detect a quick file upload.
	if (( isset( $_FILES['NewFile'] ) && !is_null( $_FILES['NewFile']['tmp_name'] ) ) || (isset( $_FILES['upload'] ) && !is_null( $_FILES['upload']['tmp_name'] ) ))
	{
		global $Config ;
 
                 //PATCH to detect a quick file upload.
		$oFile = isset($_FILES['NewFile']) ? $_FILES['NewFile'] : $_FILES['upload'];
 
		// Map the virtual path to the local server path.
		$sServerDir = ServerMapFolder( $resourceType, $currentFolder, $sCommand ) ;
 
		// Get the uploaded file name.
		$sFileName = $oFile['name'] ;
		$sFileName = SanitizeFileName( $sFileName ) ;
 
		$sOriginalFileName = $sFileName ;
 
		// Get the extension.
		$sExtension = substr( $sFileName, ( strrpos($sFileName, '.') + 1 ) ) ;
		$sExtension = strtolower( $sExtension ) ;
 
		if ( isset( $Config['SecureImageUploads'] ) )
		{
			if ( ( $isImageValid = IsImageValid( $oFile['tmp_name'], $sExtension ) ) === false )
			{
				$sErrorNumber = '202' ;
			}
		}
 
		if ( isset( $Config['HtmlExtensions'] ) )
		{
			if ( !IsHtmlExtension( $sExtension, $Config['HtmlExtensions'] ) &&
				( $detectHtml = DetectHtml( $oFile['tmp_name'] ) ) === true )
			{
				$sErrorNumber = '202' ;
			}
		}
 
		// Check if it is an allowed extension.
		if ( !$sErrorNumber && IsAllowedExt( $sExtension, $resourceType ) )
		{
			$iCounter = 0 ;
 
			while ( true )
			{
				$sFilePath = $sServerDir . $sFileName ;
 
				if ( is_file( $sFilePath ) )
				{
					$iCounter++ ;
					$sFileName = RemoveExtension( $sOriginalFileName ) . '(' . $iCounter . ').' . $sExtension ;
					$sErrorNumber = '201' ;
				}
				else
				{
					move_uploaded_file( $oFile['tmp_name'], $sFilePath ) ;
 
					if ( is_file( $sFilePath ) )
					{
						if ( isset( $Config['ChmodOnUpload'] ) && !$Config['ChmodOnUpload'] )
						{
							break ;
						}
 
						$permissions = 0777;
 
						if ( isset( $Config['ChmodOnUpload'] ) && $Config['ChmodOnUpload'] )
						{
							$permissions = $Config['ChmodOnUpload'] ;
						}
 
						$oldumask = umask(0) ;
						chmod( $sFilePath, $permissions ) ;
						umask( $oldumask ) ;
					}
 
					break ;
				}
			}
 
			if ( file_exists( $sFilePath ) )
			{
				//previous checks failed, try once again
				if ( isset( $isImageValid ) && $isImageValid === -1 && IsImageValid( $sFilePath, $sExtension ) === false )
				{
					@unlink( $sFilePath ) ;
					$sErrorNumber = '202' ;
				}
				else if ( isset( $detectHtml ) && $detectHtml === -1 && DetectHtml( $sFilePath ) === true )
				{
					@unlink( $sFilePath ) ;
					$sErrorNumber = '202' ;
				}
			}
		}
		else
			$sErrorNumber = '202' ;
	}
	else
		$sErrorNumber = '202' ;
 
	$sFileUrl = CombinePaths( GetResourceTypePath( $resourceType, $sCommand ) , $currentFolder ) ;
	$sFileUrl = CombinePaths( $sFileUrl, $sFileName ) ;
 
	if($CKEcallback == '')
	{
		SendUploadResults( $sErrorNumber, $sFileUrl, $sFileName ) ;
	}
	else
	{
		//issue the CKEditor Callback
		SendCKEditorResults ($sErrorNumber, $CKEcallback, $sFileUrl, $sFileName);
	}
	exit ;
}

?>
<script>
window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl, function() {
  // Get the reference to a dialog window.
  var element, dialog = this.getDialog();
  // Check if this is the Image dialog window.
  if (dialog.getName() == 'image') {
    // Get the reference to a text field that holds the "alt" attribute.
    element = dialog.getContentElement( 'info', 'txtAlt' );
    // Assign the new value.
    if ( element )
      element.setValue( "alt text" );
  }
  ...
  // Return false to stop further execution - in such case CKEditor will ignore the second argument (fileUrl)
  // and the onSelect function assigned to a button that called the file browser (if defined).
  [return false;]
});


</script>

