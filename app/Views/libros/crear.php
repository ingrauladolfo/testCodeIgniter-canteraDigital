<?php $cabecera?>
Formulario de crear
<?php if(session('mensaje')){?>
<div class="alert alert-alert" role="alter">
    <?php echo session('mensaje');?>
</div>
<?php }?>
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos del libro</h5>
        <p class="card-text">
        <form method="POST" action="<?=site_url('/guardar')?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" value="<?=old('nombre')?>" class="form-control" id="nombre" name="nombre"
                    aria-describedby="nombre">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </p>
    </div>
</div>
<?php $pie?>