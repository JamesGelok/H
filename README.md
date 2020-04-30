# H™Licious 😋
Experimental View Framework for PHP. 
I mostly made this for fun. Not suitable for production environments.

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

## 💡 Building & Caching

Resource on caching I found from a quick google search: [eyyyy](https://catswhocode.com/phpcache/)

WesBos small simple: [WesBos](https://wesbos.com/simple-php-page-caching-technique/)

## 💡 REFER TO FUNCTIONS

### 💡 Refer to php functions (post request, or reload?!?!)

Idea, reference php functions via post somehow?

Pass a function to the prop onClick to a funkml tag, and use http post to run the function in the funkml tag.
I'd love to get a list of jquery functions and bring those in completely. onHover? onMouseEnter, onMoustLeave 

### 💡 Refer to Javascript functions

maybe signal this with JS()? Not sure yet.

## 💡 Extensibility (make your own funkml components)



