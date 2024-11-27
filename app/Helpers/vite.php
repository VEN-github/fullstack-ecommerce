<?php

function vite(string $entry)
{
  // Set up the paths and environment variables
  $dev_server = $_ENV['VITE_DEV_SERVER'] ?? 'http://localhost:5173';
  $is_dev = $_ENV['APP_ENV'] === 'development';
  $manifest_path = __DIR__ . '/../../dist/.vite/manifest.json';

  // If in development mode, return the dev server script tags
  if ($is_dev) {
    return devScripts($dev_server, $entry);
  }

  // Handle production assets by reading the manifest
  return getProdAssets($manifest_path, $entry);
}

function devScripts(string $server, string $entry)
{
  return "<script type=\"module\" src=\"{$server}/@vite/client\"></script>\n" .
    "<script type=\"module\" src=\"{$server}/{$entry}\"></script>\n";
}

function getProdAssets(string $manifest_path, string $entry)
{
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
  return $css . "<script type=\"module\" src=\"/../dist/{$manifest[$entry]['file']}\"></script>\n";
}

function getProdStyles(array $files)
{
  return empty($files) ? '' : implode("\n", array_map(fn($files) => "<link rel=\"stylesheet\" href=\"/../dist/{$files}\">", $files)) . "\n";
}
