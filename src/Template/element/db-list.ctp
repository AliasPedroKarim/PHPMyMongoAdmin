<?php 	use PHPMyMongoAdmin\Model\Collection\DatabaseCollection; ?>
<aside id="SideBar">
	<?php 
		$manager = new DatabaseCollection('DataBase');//TO DO c'est moche !!
		$dbList = $manager->getDBList();
		echo $this->link('creat database',['controller'=>'database','action'=>'add'],['class'=>'btn-creatdb']);
	?>
	<ul>
	<?php foreach ($dbList as $db): ?>
		<li class="db-list">
			<?php ob_start(); ?>
				<span class="db-name">
					<?php echo $db->getName(); ?>
				</span>
				<span class="db-size">
					<?php echo $this->Size->bytesToSize($db->getSizeOnDisk()); ?>
				</span>
			<?php $content = ob_get_clean(); ?>
			<?php echo $this->link($content, ['controller'=>'database','action'=>'view','params'=>['dbName'=>$db->getName()]],['class'=>'db-link']);?>
		</li>
	<?php endforeach ?>
	</ul>
</aside>