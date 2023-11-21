<?php

/*
        Tabla de Usuarios.

        Es un array donde cada elemento es un objeto de la clase
        Usuario.
    */

class ArrayJugadores {
    private $tabla;

    public function __construct() {
        $this->tabla = [];
    }

    public function getTabla() {
        return $this->tabla;
    }
    public function setTabla($tabla) {
        $this->tabla = $tabla;
    }

    /**
     * Comprueba que el registro se encuentre en la tabla. De lo contrario, imprime un mensaje de error y detiene la ejecución.
     * @param int $indice
     */
    public function validarRegistro($indice) {
        if (!$this->tabla[$indice]) {
            echo "Error: Registro no encontrado";
            exit();
        }
    }

    public function crudCreate($jugador) {
        $this->tabla[] = $jugador;
    }
    public function crudRead($indice) {
        $this->validarRegistro($indice);
        return $this->tabla[$indice];
    }
    public function crudUpdate($indice, $jugadorActualizado) {
        $this->validarRegistro($indice);
        $this->tabla[$indice] = $jugadorActualizado;
    }
    public function crudDelete($indice) {
        $this->validarRegistro($indice);
        unset($this->tabla[$indice]);
    }

    public static function getPaises() {
        $paises = array("Afganistán","Albania", "Alemania", "Andorra", "Angola", "Antigua y Barbuda", "Arabia Saudita", "Argelia", "Argentina", "Armenia", "Australia", "Austria", "Azerbaiyán", "Bahamas", "Bangladés", "Barbados", "Baréin", "Bélgica", "Belice", "Benín", "Bielorrusia", "Birmania", "Bolivia", "Bosnia y Herzegovina", "Botsuana", "Brasil", "Brunéi", "Bulgaria", "Burkina Faso", "Burundi", "Bután", "Cabo Verde", "Camboya", "Camerún", "Canadá", "Catar", "Chad", "Chile", "China", "Chipre", "Ciudad del Vaticano", "Colombia", "Comoras", "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", "Cuba", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", "Emiratos Árabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "España", "Estados Unidos", "Estonia", "Etiopía", "Filipinas", "Finlandia", "Fiyi", "Francia", "Gabón", "Gambia", "Georgia", "Ghana", "Granada", "Grecia", "Guatemala", "Guyana", "Guinea", "Guinea ecuatorial", "Guinea-Bisáu", "Haití", "Honduras", "Hungría", "India", "Indonesia", "Irak", "Irán", "Irlanda", "Islandia", "Islas Marshall", "Islas Salomón", "Israel", "Italia", "Jamaica", "Japón", "Jordania", "Kazajistán", "Kenia", "Kirguistán", "Kiribati", "Kuwait", "Laos", "Lesoto", "Letonia", "Líbano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Luxemburgo", "Madagascar", "Malasia", "Malaui", "Maldivas", "Malí", "Malta", "Marruecos", "Mauricio", "Mauritania", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montenegro", "Mozambique", "Namibia", "Nauru", "Nepal", "Nicaragua", "Níger", "Nigeria", "Noruega", "Nueva Zelanda", "Omán", "Países Bajos", "Pakistán", "Palaos", "Palestina", "Panamá", "Papúa Nueva Guinea", "Paraguay", "Perú", "Polonia", "Portugal", "Reino Unido", "República Centroafricana", "República Checa", "República de Macedonia", "República del Congo", "República Democrática del Congo", "República Dominicana", "República Sudafricana", "Ruanda", "Rumanía", "Rusia", "Samoa", "San Cristóbal y Nieves", "San Marino", "San Vicente y las Granadinas", "Santa Lucía", "Santo Tomé y Príncipe", "Senegal", "Serbia", "Seychelles", "Sierra Leona", "Singapur", "Siria", "Somalia", "Sri Lanka", "Suazilandia", "Sudán", "Sudán del Sur", "Suecia", "Suiza", "Surinam", "Tailandia", "Tanzania", "Tayikistán", "Timor Oriental", "Togo", "Tonga", "Trinidad y Tobago", "Túnez", "Turkmenistán", "Turquía", "Tuvalu", "Ucrania", "Uganda", "Uruguay", "Uzbekistán", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Yibuti", "Zambia", "Zimbabue");
        return $paises;
    }

    public static function getPosiciones() {
        $posiciones = [
            'Portero',
            'Central',
            'Lateral',
            'Mediocentro',
            'Centrocampista',
            'Extremo',
            'Delantero'
        ];
        asort($posiciones);
        return $posiciones;
    }

    public static function getEquipos() {
        $equipos = [
            'Real Madrid',
            'Barcelona',
            'Betis',
            'Sevilla',
            'Valencia',
            'Rayo Vallecano',
            'Ath Bilbao',
            'Levante',
            'Real Sociedad',
            'Osasuna'
        ];
        asort($equipos);
        return $equipos;
    }

    public static function getEncabezado() {
        $encabezado = [
            'Id',
            'Nombre',
            'Num',
            'Pais',
            'Equipo',
            'Posiciones',
            'Contrato',
            'Acciones'
        ];
        return $encabezado;
    }

    # Devuelve el array con los nombres de las posiciones de un jugador
    public static function listaPosiciones($indicesPosiciones, $posiciones) {
        /*$arrayPosiciones = [];
        foreach($indicesPosiciones as $indice) {
            $arrayPosiciones[] = $posiciones[$indice];
        }
        asort($arrayPosiciones);
        return $arrayPosiciones;*/
        $aux = [];
        foreach ($indicesPosiciones as $indice) {
            $aux[] = $posiciones[$indice];
        }
        asort($aux);
        return $aux;
    }

    public function getDatos() {
        $jugadores = [
            new Jugador(
                1,
                "Marco Asensio",
                10,
                58,
                0,
                [4, 5, 6],
                7000000
            ),
            new Jugador(
                2,
                "Ansu Fati",
                10,
                58,
                1,
                [5, 6],
                4500000
            ),
            new Jugador(
                3,
                "Sergio Canales",
                10,
                58,
                2,
                [4, 5],
                3500000
            )
        ];
        $this->tabla = array_merge($this->tabla, $jugadores);
    }

}
