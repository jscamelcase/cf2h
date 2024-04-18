<?php

/**
 * Get the base path
 * @params string $path
 * @return string
 */
function basePath($path = '')
{
  return __DIR__ . '/' . $path;
}

/**
 * Load a view
 * 
 * @param string $name
 * @return void
 * 
 */
function loadPartial($name, $data = [])
{
  $partialPath = basePath("app/views/partials/{$name}.php");
  if (file_exists($partialPath)) {
    extract($data);
    require $partialPath;
  } else {
    echo "Partial {$partialPath} not found!";
  }
}

/**
 * Load a view
 *
 * @param string $name
 * @return void
 *
 */
function loadView($name, $data = [])
{
  $viewPath = basePath("app/views/{$name}.view.php");
  extract($data);
  if (file_exists($viewPath)) {
    require $viewPath;
  } else {
    echo "View {$viewPath} not found!";
  }
}

function sanitize($dirty)
{
  return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}

/**
 * Redirect to a given URL
 * 
 * @param string $url
 * @return void
 */
function redirect($url)
{
  header("Location: {$url}");
}
