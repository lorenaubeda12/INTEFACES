<?php
if(!empty($datos['usuarios'])) {
    $pal=explode(' ', $datos['query']);
    echo '<ul>'."\n";
    foreach( $datos['usuarios'] as $reg){
        $nombre=mb_strtoupper($reg['apellido_1'].' '.$reg['apellido_2'].', '.$reg['nombre']);
        $nombreplano=$nombre;
        foreach ($pal as $npal => $palabra) {
            $palabra=mb_strtoupper($palabra);
            $nombre=str_ireplace($palabra, 
                    '<span style="font-weight:bold;color:blue;">'
                    .$palabra.'</span>', $nombre);
        }
        echo "\t".'<li id="autocomplete_'.$reg['id_Usuario'].'" rel="'
                    .$reg['id_Usuario'].'_'
                    .mb_convert_encoding($nombreplano, 'ISO-8859-1').'">';
        echo trim(mb_convert_encoding($nombre, 'ISO-8859-1')).'</li>'."\n";
    
    }
    echo '</ul>';
}
?>