<?php

    class SecureHash {
        
        private $hash_type = "sha512";
        private $hash_text = "";
        private $pre_hash = true;
        private $pre_hash_type = "crc32";
        private $sep_caracter = "=";

        private function isPair($number) {
            if ($number%2 == 0) {
                return true;
            }

            return false;
        }

        private function getPreHash($string) {
            $string_array = str_split($string, 1);
            $string_number = 0;

            foreach($string_array as $char) {
                $ascii_char = ord($char);

                if ($this->isPair($ascii_char)) {
                    $string_number -= $ascii_char;
                } else {
                    $string_number += $ascii_char;
                }

            }

            if ($this->pre_hash) {
                return hash($this->pre_hash_type, $string_number);
            }

            return $string_number;

        }

        function Hash($string) {
            $pre_hash = $this->getPreHash($string);
            $b64_string = base64_encode($string);

            $hash_string = sprintf("%s%s%s%s%s", $this->hash_text, $this->sep_caracter, $pre_hash, $this->sep_caracter, $b64_string);

            $hashed_string = hash($this->hash_type, $hash_string);

            return $hashed_string;

        }

        function verifyHash($string, $hash) {
            $hash_string = $this->Hash($string);

            if ($hash_string===$hash) {
                return true;
            }

            return false;

        }

    }

?>