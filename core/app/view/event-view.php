<?php
$jb  = EventData::getById($_GET["id"]);
?>

<div class="container">
<div class="row">
<div class="col-md-12">
<h1><?php echo $jb->title; ?></h1>
    <?php if($jb->image!=""):?>
      <img src="admin/uploads/<?php echo $jb->image; ?>" class="img-responsive" >
    <?php endif; ?>
<br><div class="panel panel-default">
<div class="panel-body">
<label>Descripcion breve</label>
<p><?php echo $jb->brief; ?></p>
<label>Contenido</label>
<p><?php echo $jb->content; ?></p>
<label>Fecha inicio</label>
<p><?php echo $jb->start_at; ?></p>
<label>Fecha fin</label>
<p><?php echo $jb->finish_at; ?></p>
<label>Categoria</label>
<p><?php echo CategoryData::getById($jb->category_id)->name; ?></p>


</div>
</div>





</div>
</div>
</div>
<br><br><br><br>