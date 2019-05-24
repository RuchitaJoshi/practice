<?php
/**
 * Created by PhpStorm.
 * User: rujul
 * Date: 5/2/19
 * Time: 10:38 AM
 */

function create($class, $attributes = []){
    return factory($class)->create($attributes);
}

function make($class, $attributes = []){
    return factory($class)->make($attributes);
}