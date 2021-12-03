<?php
    class client_authentication_model {
        private $data = array();
        public function __get($name)
        {
            return $this->data[$name];
        }
        public function __set($name, $value)
        {
            $this->data[$name] = $value;
        }
    }