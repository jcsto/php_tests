<?php

spl_autoload_register(function ($clase) {
    include 'App/core/' . $clase . '.php';
});
