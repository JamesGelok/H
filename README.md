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

## 💡 Other variants might include something like this:

```php
<?php

use Html\html;
use Html\head;
use Html\title;
use Html\body;
use Html\h1;
use Html\img;
use Html\p;

echo html(
  head(
    title('Nice')
  ),
  body(
    h1('What up', ['style' => 'color: red;']),
    img(['src' => $imgSrc, 'height' => 40, 'width' => 40]),
    p('Hello, World!')
  )
);
```

## 💡 Caching

Resource on caching I found from a quick google search: [eyyyy](https://catswhocode.com/phpcache/)

since these are built with functions, might need to do something different.
