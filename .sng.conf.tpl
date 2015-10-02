location / {
  if ($uri ~ "\.php") {
    fastcgi_pass {{ php_bind  }};            
  }

  try_files $uri $uri/ /index.php?$query_string;
}
