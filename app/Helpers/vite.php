<?php

function vite(string $entry)
{
    // If in development mode, return the dev server script tags
    if (isDev()) {
        return devScripts($entry);
    }

    // Handle production assets by reading the manifest
    return getProdAssets($entry);
}

function getDevServer()
{
    return $_ENV['VITE_DEV_SERVER'] ?? 'http://localhost:5173';
}

function isDev()
{
    return $_ENV['APP_ENV'] === 'development';
}

function getManifestPath()
{
    return __DIR__ . '/../../dist/.vite/manifest.json';
}

function devScripts(string $entry)
{
    $dev_server = getDevServer();
    return "<script type=\"module\" src=\"{$dev_server}/@vite/client\"></script>\n" .
        "<script type=\"module\" src=\"{$dev_server}/{$entry}\"></script>\n";
}

function getProdAssets(string $entry)
{
    // Set up the paths and environment variables
    $manifest_path = getManifestPath();

    // Check if the manifest file exists
    if (!file_exists($manifest_path)) {
        throw new \Exception('Vite manifest not found. Did you build the assets?');
    }

    // Read and decode the manifest once, and cache it
    static $manifest = null;
    if ($manifest === null) {
        $manifest = json_decode(file_get_contents($manifest_path), true);
    }

    // Check if the entry exists in the manifest
    if (!isset($manifest[$entry])) {
        throw new \Exception("Asset {$entry} not found in Vite manifest.");
    }

    // Generate CSS links if they exist
    $css = getProdStyles($manifest[$entry]['css'] ?? []);

    // Return the combined CSS and JS tags
    return $css .
        "<script type=\"module\" src=\"/../dist/{$manifest[$entry]['file']}\"></script>\n";
}

function getProdStyles(array $files)
{
    return empty($files)
        ? ''
        : implode(
                "\n",
                array_map(
                    fn($files) => "<link rel=\"stylesheet\" href=\"/../dist/{$files}\">",
                    $files
                )
            ) . "\n";
}

function asset(string $entry, string $type = 'images')
{
    // If in development mode, return the dev server script tags
    if (isDev()) {
        return getDevAssets($entry, $type);
    }

    return "/assets/$type/$entry";
}

function getDevAssets(string $entry, string $type = 'images')
{
    $dev_server = getDevServer();
    return $dev_server . "/src/assets/$type/$entry";
}
