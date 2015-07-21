<?php

/**
 * json.class.php
 *
 * Parent class that returns an object in JSON format.
 *
 * @version 1.0
 * @author Eric Horodyski
 */

namespace Helpers{
    
    abstract class Json
    {
        public function toJSON($obj, $opts = NULL) { return $opts == NULL ? json_encode($obj) : json_encode($obj, $opts); }

        public function fromJSON($string) { return json_decode($string, true); }
    }
}