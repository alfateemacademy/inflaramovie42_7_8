<?php

function getSiteOptionByKey($key)
{
    $options = App::make('options');

    return (isset($options[$key])) ? $options[$key] : null;
}

function getAverageRating($totalRatings, $count)
{
	return ($count > 0) ? $totalRatings / $count : 0;
}