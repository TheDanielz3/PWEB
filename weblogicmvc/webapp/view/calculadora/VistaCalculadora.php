<?php use ArmoredCore\WebObjects\URL;
use ArmoredCore\WebObjects\Layout;

Layout::includeLayout('header');

?>

<form action="<?= URL::toRoute('calculadora/show')?>"  method="post">
    Numero 1: <input type="number" name="valor1">
    Numero 2: <input type="number" name="valor2">
    <input type="submit" name="calcular">
</form>

<?php Layout::includeLayout('header'); ?>