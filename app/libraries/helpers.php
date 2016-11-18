<?php

function getSiteOptionByKey($key)
{
    $options = App::make('options');

    return (isset($options[$key])) ? $options[$key] : null;
}