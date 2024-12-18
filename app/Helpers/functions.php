<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function slugify($value)
{
    // Convert to lowercase
    $slug = strtolower($value);

    // Remove special characters
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

    // Replace spaces and repeated dashes with a single dash
    $slug = preg_replace('/[\s-]+/', '-', $slug);

    // Trim dashes from the beginning and end
    $slug = trim($slug, '-');

    return $slug;
}
