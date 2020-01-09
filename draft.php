<?php

class Html {
  public static function __callStatic($name, $args) {
    [$attrs, $children] = self::prep($name, $args);
    return "<$name$attrs>$children</$name>";
  }
  private static function prep($name, $args) {
    [$attrs, $children] = ['', ''];

    if (!($len = count($args))) return [$attrs, $children];

    $i = 0;
    do {
      if (gettype($args[$i]) === 'string') $children .= $args[$i];
      if (gettype($args[$i]) === 'array' ) {
        foreach ($args[$i] as $attr => $val) $attrs .= " $attr='$val'";
      }
      $i++;
    } while($i < $len);
    
    return [$attrs, $children];
  }
}

use Html as H;

$imgSrc = 'https://images.pexels.com/photos/3095527/pexels-photo-3095527.jpeg';

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

// Q U E S T I O N S AND T H O U G H T S
// how handle props ? HashMap args
// extensibility? extend Html to do make view frameworks
// speed? it runs every time? caching?
// echo MDB::button('What up', ['primary'])
