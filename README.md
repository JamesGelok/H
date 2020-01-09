# H™Licious 😋
View Framework for PHP

```php
<?php

use Html as H;

echo H::html(
  H::head(
    H::title('Nice')
  ),
  H::body(
    H::h1('What up', ['style' => 'color: red;']),
    H::img(['src' => $imgSrc, 'height' => 40, 'width' => 40]),
    H::p('Hello, World!')
  )
);
```

