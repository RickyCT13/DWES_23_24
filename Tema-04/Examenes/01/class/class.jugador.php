<?php

    /*
        Clase Jugador
    */

    Class Jugador {
        private $id;
        private $nombre;
        private $numero;
        private $pais;
        private $equipo;
        private $posiciones;
        private $contrato;

        /* Constructor con parámetros opcionales */
        public function __construct(
            $id = null,
            $nombre = null,
            $numero = null,
            $pais = null,
            $equipo = null,
            $posiciones = [],
            $contrato = null
        ) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->numero = $numero;
            $this->pais = $pais;
            $this->equipo = $equipo;
            $this->posiciones = $posiciones;
            $this->contrato = $contrato;
        }

        // Getters
        public function getId() {
            return $this->id;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getNumero() {
            return $this->numero;
        }
        public function getPais() {
            return $this->pais;
        }
        public function getEquipo() {
            return $this->equipo;
        }
        public function getPosiciones() {
            return $this->posiciones;
        }
        public function getContrato() {
            return $this->contrato;
        }

        // Setters
        public function setId($id) {
            $this->id = $id;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setNumero($numero) {
            $this->numero = $numero;
        }
        public function setPais($pais) {
            $this->pais = $pais;
        }
        public function setEquipo($equipo) {
            $this->equipo = $equipo;
        }
        public function setPosiciones($posiciones) {
            $this->posiciones = $posiciones;
        }
        public function setContrato($contrato) {
            $this->contrato = $contrato;
        }

    }

?>