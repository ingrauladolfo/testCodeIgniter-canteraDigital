<?=$cabecera?>
    <a href="<?=base_url('crear')?>" class="btn btn-info" type="button">Crear un libro</a>
    <br>       
    <br>
    <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            <tbody>
                   <?php foreach($libros as $libro): ?>
                    <tr>
                        <td><?=$libro['id']?></td>
                        <td>
                            <img src="<?=base_url()?>/uploads/<?=$libro['imagen']?>" alt="<?=$libro['nombre']?>" class="img-thumbnail" width="100">
                        </td>
                        <td><?=$libro['nombre']?></td>
                        <td><a href="<?=base_url('crear')?>" class="btn btn-primary" type="button" >Crear</a>/<a href="<?=base_url('editar/'.$libro['id'])?>" class="btn btn-success" type="button">Editar</a>/
                          <a href="<?=base_url('borrar/'.$libro['id'])?>" class="btn btn-danger" type="button" >Borrar</a>  
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
<?= $pie?>
   