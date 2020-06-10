<?php 

    function productos_json(&$boletos, &$etiquetas = 0, &$camisas = 0) {
        $dias = array(0 => 'un_dia', 1 => 'pase_completo', 2 => 'pase_2dias');
        $total_boletos = array_combine($dias, $boletos);
        $json = array();

        foreach ($total_boletos as $key => $boletos):
            $cantidad_boletos = (int) $boletos;
            if ($cantidad_boletos > 0) {
                $json[$key] = $cantidad_boletos;
            }

        endforeach;  

        $cantidad_camisas = (int) $camisas;
        $cantidad_etiquetas = (int) $etiquetas;

        if ($cantidad_camisas > 0) {
            $json['camisas'] = $cantidad_camisas;
        }
        if ($cantidad_etiquetas > 0) {
            $json['etiquetas'] = $cantidad_etiquetas;
        }
        
        return json_encode($json);
    }

    function eventos_json(&$eventos) {

        $eventos_json = array();

        foreach($eventos as $evento):

            $eventos_json['eventos'][] = $evento;

        endforeach;

        return json_encode($eventos_json);
    }
?>