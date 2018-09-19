<?php
$pre = '../';
require_once("../includes/php/model.php");
$ponteiro = new model();
$dbResultCargo = $ponteiro->selectCargo(intval($_GET['area']));
?>

<option value="">Informe o cargo prentendida</option>
<?php
if(mysql_num_rows($dbResultCargo) != 0){
    while($dbRow = mysql_fetch_array($dbResultCargo)){

?>
        <option value="<?php echo $dbRow['cargo_id'] ?>" ><?php echo $dbRow['nome'] ?></option>
<?php
    }
}
?>
                               