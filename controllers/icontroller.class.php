<?php
/** * IController.class.php * * IController interface. * * @version 1.0 * @author Eric Horodyski */
namespace Interfaces{
    interface IController    {        public function Get();        public function Post();        public function Put();        public function Delete();    }}
