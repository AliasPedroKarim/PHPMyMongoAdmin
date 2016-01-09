<?php 
$link = ['controller'=>'document'];
$link = ['action'=>'add'];
$link['params']['namespace'] = $namespace;
if(isset($doc)){
	$link['action'] ='edit';
	$link['params']['id'] = $doc->_id.'';
}
?>
<section id="Document">
	<header><h1>Document: <?php echo $namespace;?></h1></header>
	<nav>
		<ul>
			<li><span class="btn-menu-save">save</span></li>
			<?php if (!isset($doc)): ?>
				<li><input type="file" id="loadDocument"/><label class="btn-menu-import" for="loadDocument">import</label></li>
			<?php else: ?>
				<li><span class="btn-menu-delete error">delete</span></li>
			<?php endif ?>
			<li><span class="btn-menu-file">export</span></li>
			<li></li>
		</ul>
	</nav>
	<section>
		<div id="editor"></div>
	</section>
	<footer>
		<div>
			<h4>User Manual</h4>
			<nav>
				<ul>
					<li><a href="https://docs.mongodb.org/manual/core/crud-introduction/" target="_blank">CRUD Introduction</a></li>
				</ul>
			</nav>
		</div>
		<div>
			<h4><a href="http://php.net/manual/en/book.bson.php" target="_blank">MongoDB\BSON</a></h4>
			<dl class='bson-type'>
				<dt>ObjectID</dt><dd>{ "$oid": "5690010baba47e1f98007e7f" }</dd>
				<dt>Regex</dt><dd>{ "$regex": "/[a-zA-Z]*/", "$options": "g" }</dd>
				<dt>Timestamp</dt><dd>{ "$timestamp":{ "t": 1452278027,"i": 0 } }</dd>
				<dt>UTCDateTime</dt><dd>{ "$date": 1452278027 }</dd>
			</dl>
			<span class="legend">see documentation for mor information</span>
		</div>
	</footer>
</section>
<?php $this->addCss('/vendor/jsoneditor/jsoneditor.min.css'); ?>
<?php $this->addJs('/vendor/jsoneditor/jsoneditor.min.js'); ?>
<?php $this->startScript() ?>

<script type="text/javascript">
$(document).ready(function(){
	var container = document.getElementById('editor');
	var option = {
		mode: 'code',
		modes:['code', 'text', 'tree', 'view'],
		history:1,
		indentation:4,
		error: function (err) {
			alert(err.toString());
		}
	}
	var editor = new JSONEditor(container, option);
	var reader = new FileReader();

	<?php if(isset($doc)): ?>
		var json = <?php echo MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($doc)); ?>;
		editor.set(json);
	<?php endif ?>
	var link = <?php echo '\''.$this->request->url($link).'\''; ?>;

	reader.onload = function(event){
		var text = event.target.result;
		editor.set(JSON.parse(text));
	};

	$('#loadDocument').on('change',function(event){
		reader.readAsText($(this)[0].files[0]);
	});

	$('.btn-menu-save').on('click',function(event){
		var json = editor.get();
		console.log(link);
		$.post(link,{json:JSON.stringify(json)},function(data){
			console.log(data);
			if(data.result){
				window.location.replace(data.url);
			}else{
				var text = '<div class="flash-message error">'+data.message+'<div>';
				$("#Flash-Message").html(text);
				console.log(data);
			}
		},'json');
	});

	$('.btn-menu-file').on('click',function(event){
		var blob = new Blob([editor.getText()], {type: 'application/json;charset=utf-8'});
		var url = URL.createObjectURL(blob);
		window.open(url);
	});
});
</script>
<?php $this->stopScript() ?>