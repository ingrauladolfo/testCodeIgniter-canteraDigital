<?=$cabecera?>
<!-- <?php
    print_r($libro);
?> -->
    Formulario de editar
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Ingresar datos del libro</h5>
            <p class="card-text">
                        <form method="POST" action="<?=site_url('/actualizar')?>" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?=$libro['id']?>">
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" value="<?=$libro['nombre']?>" id="nombre" name="nombre" aria-describedby="nombre">
                            </div>
                            
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen</label>
                                <img src="<?=base_url()?>/uploads/<?=$libro['imagen']?>" alt="<?=$libro['nombre']?>" class="img-thumbnail" width="100">
                                <input type="file" class="form-control" value="<?=$libro['imagen']?>" id="imagen" name="imagen">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
            </p>
        </div>
    </div>        
<?=$pie?>