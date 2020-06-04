<?php 
    function cargar_dependencias_header() {
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace('.php', "", $archivo);

        switch($pagina) {
           case 'index':
            echo '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />';
            echo '<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>';
            echo '<link rel="stylesheet" href="css/colorbox.css">';
                break;
           case 'invitados':
                echo '<link rel="stylesheet" href="css/colorbox.css">';
                break;
            case 'conferencia':
                echo "<link rel='stylesheet' href='node_modules/lightbox2/src/css/lightbox.css'>";
                break;       
        }
    }

    function cargar_dependencias_footer() {
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace('.php', "", $archivo);

        switch($pagina) {
           case 'index':
            echo '<script src="js/jquery.animateNumber.js"></script>';
            echo '<script src="js/jquery.countdown.js"></script>';
            echo '<script src="js/main.js"></script>';
            echo '<script src="node_modules/jquery-colorbox/jquery.colorbox.js"></script>';
            echo '<script src="js/invitados.js"></script>';
                break;
           case 'invitados':
                echo '<script src="node_modules/jquery-colorbox/jquery.colorbox.js"></script>';
                echo '<script src="js/invitados.js"></script>';
                break;
            case 'conferencia':
                echo '<script src="node_modules/lightbox2/src/js/lightbox.js"></script>';
                break;      
            case 'registro':
                echo '<script src="js/registro.js"></script>';     
        }
    }
?>