<form style="display: none;" id="frmInterop" action="<?= $sistema_destino->url ?>" method="POST">
    <?php foreach ($detalle_accesos as $detalle_acceso) { ?>
    <input type="text" name="<?= $detalle_acceso->credenciale->descripcion ?>" value="<?= $detalle_acceso->descripcion ?>">
    <?php } ?>
    <button type="submit" value="INGRESAR" name="Submit">enviar</button>
</form>
Redireccionando...
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#frmInterop').submit();
        }, 1000);
    });
</script>