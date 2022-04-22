<?php
ini_set('display_errors', 0);
error_reporting(0);

 if (file_exists("latexTables.txt")) {
    $lista = file_get_contents("latexTables.txt");
    $lista_array = explode("\n", $lista);
	$lista_array = preg_grep("/^[ ]/",$lista_array);
	
    foreach($lista_array as $lista_item) {        
		$tmp_str = explode("&", $lista_item);
        $array_latex[] = array($tmp_str[0],strtr($tmp_str[1], "\\", " "),strtr($tmp_str[2], "\\", " "));
		
				
    }
}
 else {
    echo 'arquivo não encontrado';
}
?>
<html>
<table>
		<?php foreach( $array_latex as $output){?>						
			<tr>
			<?php if($output[0] && $output[1]){?>
			<td><?php echo $output[0]; ?> </td>
			<td><?php echo $output[1]; ?> </td>
			<td><?php echo $output[2] ?> </td>
			<?php }?>
			<?php }?>						
			</tr>
</table>
<html>
