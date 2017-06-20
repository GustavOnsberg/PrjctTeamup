<?php
include("php_includes/quill_base.php");

if (!isset($documentId)) {
	$documentId = 1;
}





if (!isset($text)) {
	$text = "";
}
if (!isset($saveAction)) {
	$saveAction = "index.php";
}
if (!isset($textId)) {
	$textId = 0;
}
if (!isset($editLink)) {
	$editLink = "#";
}
if (!isset($edit)) {
	$edit = false;
}
if (!isset($canEdit)) {
	$canEdit = false;
}


?>

<?php

if (!$edit && $canEdit) {
	echo ("<button onmouseup='edit()' style='float: left;'>Edit</button><br><br>	");
}

else if ($edit) {
	echo "
	<button onmouseup='discard()' style='float: left;''>Discard</button>
	<form action='".$saveAction."' method='POST'>
		<input type='hidden' name='textId' id='textId' value=".$textId.">
		<input type='hidden' name='text' id='text' value=''>
		<input type='submit' value='Save' onmousedown='save()' id='saveButton'>
		<p style='float: right;'>/2000000 character used</p>
		<p id='characterCount' style='float: right;'>0</p>
	</form>
	<script>
		var textInnerHTML = '';
		setInterval(function (){
		textInnerHTML = (String)(encodeURI(document.getElementsByClassName('ql-editor')[0].innerHTML));
		document.getElementById('characterCount').innerHTML = textInnerHTML.length;}, 1000);
	</script>";
}


?>


<div id="toolbar"></div>
<div id="editor" style = 'height: auto;'></div>

<script>

function edit(){
	window.location.href = "<?php echo $editLink ?>";
}

function save(){
	document.getElementById('text').value = encodeURI(document.getElementsByClassName("ql-editor")[0].innerHTML);
}

function discard() {
	window.location.href = "profile.php";
}







var toolbarOptions = [
	['bold', 'italic', 'underline'],
	['code-block'],
	[{ 'align': [] }],
	[{ 'size': ['small', false, 'large', 'huge'] }],
	[{ 'color': [] }],
	[{ 'font': [] }],
	['link', 'image', 'video'],

	['clean']
];

var quill = new Quill('#editor', {
 	modules: {
		<?php
		if ($edit) {
			echo "toolbar: toolbarOptions";
		}
		else {
			echo "toolbar: false";
		}
		?>
	},
	theme: 'snow'
});
<?php
if ($edit) {
	echo "quill.enable(true);";
}
else {
	echo "quill.enable(false);";
}
?>

window.onload = function(){
	document.getElementsByClassName("ql-editor")[0].innerHTML = decodeURI("<?php echo($text) ?>");
	<?php
	if (!$edit) {
	echo ("document.getElementsByClassName('ql-editor')[0].style.height = 'auto';");
	}
	else {
		echo ("document.getElementsByClassName('ql-editor')[0].style.height = '80vh';");
	}
	?>
}
</script>