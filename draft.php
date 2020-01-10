<?php 

use funkml;

// you can get argument names here: 
/*
 https://stackoverflow.com/questions/2692481/getting-functions-argument-names
*/// I'm wondering if we could use that to tell if a function was given
// a variable or a primitive

$imgSrc = 'http://bit.ly/2sWsxzd';
$Joe = 'Joe';


// NOTE: 
//      problem: the H1 is currently invalid
//      solution: recursively check array attrs
// 
//      problem: heft! calling functions like this must be expensive?! well
//      solution: multiple layers of caching
//      solution: wrap the whole thing in a new Document() thing, or Document() function, and have that 
//                handle caching. That might require returning lightweight Template Objects,
//                                creating a map of changes? not sure
//      
// 
//      problem: functions, like Dir, that overload regular php functions 
//      solution1: use overloading and default to the regular php function unless called with a not
// 
echo html(
  head(
    title('Nice')
  ),
  body(
    h1("What up, $Joe", [["style" => "color: red"], 'hide']),
    img(['src' => $imgSrc, 'height' => 40, 'width' => 40]),
    p('Hello, World!'),
    button('Hey!', ['id' => 'clickMe']),
    script("
      console.log('i ran!');
      document.getElementById('clickMe')
        .addEventListener('click', () => {
          alert('Wow Cool!');
        }
      );
    ")
  )
);













// Q U E S T I O N S AND T H O U G H T S
// how handle props ? HashMap args
// extensibility? extend Html to do make view frameworks
// speed? it runs every time? caching?
// echo MDB::button('What up', ['primary'])

// Developer experience
// as in:
// 
// use Html::img
// . doesnt work yet,https://wiki.php.net/rfc/use-static-function
// . but there's this:
// . https://wiki.php.net/rfc/function_autoloading
// 
// . what about autonamespacing
// as in:
// 
// use Html/img;
// . check this out 
// . https://www.php.net/manual/en/language.namespaces.nsconstants.php
// . maybe that will work?

































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
        foreach ($args[$i] as $attr => $val) {
          if (is_numeric($attr)) {
            $attrs .=  " $val";
          } else {
            $attrs .= " $attr='$val'";
          }
        }
      }
      $i++;
    } while($i < $len);
    
    return [$attrs, $children];
  }
}
use Html as H;
// Main Root
function Html(...$args){return H::Html(...$args);}
// Document Metadata
function Base(...$args){return H::Base(...$args);}
function Head(...$args){return H::Head(...$args);}
//function Link(...$args){return H::Link(...$args);}
function Meta(...$args){return H::Meta(...$args);}
function Style(...$args){return H::Style(...$args);}
function Title(...$args){return H::Title(...$args);}
// Sectioning Root
function Body(...$args){return H::Body(...$args);}
// Content Sectioning
function Address(...$args){return H::Address(...$args);}
function Article(...$args){return H::Article(...$args);}
function Aside(...$args){return H::Aside(...$args);}
function Footer(...$args){return H::Footer(...$args);}
//function Header(...$args){return H::Header(...$args);}
function H1(...$args){return H::H1(...$args);}
function H2(...$args){return H::H2(...$args);}
function H3(...$args){return H::H3(...$args);}
function H4(...$args){return H::H4(...$args);}
function H5(...$args){return H::H5(...$args);}
function H6(...$args){return H::H6(...$args);}
function Hgroup(...$args){return H::Hgroup(...$args);}
function Main(...$args){return H::Main(...$args);}
function Nav(...$args){return H::Nav(...$args);}
function Section(...$args){return H::Section(...$args);}
// Text Content
function Blockquote(...$args){return H::Blockquote(...$args);}
function Dd(...$args){return H::Dd(...$args);}
//function Dir(...$args){return H::Dir(...$args);}
function Div(...$args){return H::Div(...$args);}
function Dl(...$args){return H::Dl(...$args);}
function Dt(...$args){return H::Dt(...$args);}
function Figcaption(...$args){return H::Figcaption(...$args);}
function Figure(...$args){return H::Figure(...$args);}
function Hr(...$args){return H::Hr(...$args);}
function Li(...$args){return H::Li(...$args);}
function Ol(...$args){return H::Ol(...$args);}
function P(...$args){return H::P(...$args);}
function Pre(...$args){return H::Pre(...$args);}
function Ul(...$args){return H::Ul(...$args);}
// Inline Text Semantics
function A(...$args){return H::A(...$args);}
function Abbr(...$args){return H::Abbr(...$args);}
function B(...$args){return H::B(...$args);}
function Bdi(...$args){return H::Bdi(...$args);}
function Bdo(...$args){return H::Bdo(...$args);}
function Br(...$args){return H::Br(...$args);}
function Cite(...$args){return H::Cite(...$args);}
function Code(...$args){return H::Code(...$args);}
function Data(...$args){return H::Data(...$args);}
function Dfn(...$args){return H::Dfn(...$args);}
function Em(...$args){return H::Em(...$args);}
function I(...$args){return H::I(...$args);}
function Kbd(...$args){return H::Kbd(...$args);}
function Mark(...$args){return H::Mark(...$args);}
function Q(...$args){return H::Q(...$args);}
function Rb(...$args){return H::Rb(...$args);}
function Rp(...$args){return H::Rp(...$args);}
function Rt(...$args){return H::Rt(...$args);}
function Rtc(...$args){return H::Rtc(...$args);}
function Ruby(...$args){return H::Ruby(...$args);}
function S(...$args){return H::S(...$args);}
function Samp(...$args){return H::Samp(...$args);}
function Small(...$args){return H::Small(...$args);}
function Span(...$args){return H::Span(...$args);}
function Strong(...$args){return H::Strong(...$args);}
function Sub(...$args){return H::Sub(...$args);}
function Sup(...$args){return H::Sup(...$args);}
//function Time(...$args){return H::Time(...$args);}
function Tt(...$args){return H::Tt(...$args);}
function U(...$args){return H::U(...$args);}
//function Var(...$args){return H::Var(...$args);}
function Wbr(...$args){return H::Wbr(...$args);}
// Image And Multimedia
function Area(...$args){return H::Area(...$args);}
function Audio(...$args){return H::Audio(...$args);}
function Img(...$args){return H::Img(...$args);}
function Map(...$args){return H::Map(...$args);}
function Track(...$args){return H::Track(...$args);}
function Video(...$args){return H::Video(...$args);}
//function Applet(...$args){return H::Applet(...$args);}
function Embed(...$args){return H::Embed(...$args);}
function Iframe(...$args){return H::Iframe(...$args);}
function Noembed(...$args){return H::Noembed(...$args);}
function Object(...$args){return H::Object(...$args);}
function Param(...$args){return H::Param(...$args);}
function Picture(...$args){return H::Picture(...$args);}
function Source(...$args){return H::Source(...$args);}
// Scripting
function Canvas(...$args){return H::Canvas(...$args);}
function Noscript(...$args){return H::Noscript(...$args);}
function Script(...$args){return H::Script(...$args);}
// Demarcating Edits
function Del(...$args){return H::Del(...$args);}
function Ins(...$args){return H::Ins(...$args);}
// Table Content
function Caption(...$args){return H::Caption(...$args);}
function Col(...$args){return H::Col(...$args);}
function Colgroup(...$args){return H::Colgroup(...$args);}
function Table(...$args){return H::Table(...$args);}
function Tbody(...$args){return H::Tbody(...$args);}
function Td(...$args){return H::Td(...$args);}
function Tfoot(...$args){return H::Tfoot(...$args);}
function Th(...$args){return H::Th(...$args);}
function Thead(...$args){return H::Thead(...$args);}
function Tr(...$args){return H::Tr(...$args);}
// Forms
function Button(...$args){return H::Button(...$args);}
function Datalist(...$args){return H::Datalist(...$args);}
function Fieldset(...$args){return H::Fieldset(...$args);}
function Form(...$args){return H::Form(...$args);}
function Input(...$args){return H::Input(...$args);}
function Label(...$args){return H::Label(...$args);}
function Legend(...$args){return H::Legend(...$args);}
function Meter(...$args){return H::Meter(...$args);}
function Optgroup(...$args){return H::Optgroup(...$args);}
function Option(...$args){return H::Option(...$args);}
function Output(...$args){return H::Output(...$args);}
function Progress(...$args){return H::Progress(...$args);}
function Select(...$args){return H::Select(...$args);}
function Textarea(...$args){return H::Textarea(...$args);}
// Interactive Elements
function Details(...$args){return H::Details(...$args);}
function Dialog(...$args){return H::Dialog(...$args);}
function Menu(...$args){return H::Menu(...$args);}
function Menuitem(...$args){return H::Menuitem(...$args);}
function Summary(...$args){return H::Summary(...$args);}
// Web Components
function Content(...$args){return H::Content(...$args);}
function Element(...$args){return H::Element(...$args);}
function Shadow(...$args){return H::Shadow(...$args);}
function Slot(...$args){return H::Slot(...$args);}
function Template(...$args){return H::Template(...$args);}
// Obsolete And Deprecated Elements
//function Acronym(...$args){return H::Acronym(...$args);}
function Applet(...$args){return H::Applet(...$args);}
function Basefont(...$args){return H::Basefont(...$args);}
function Bgsound(...$args){return H::Bgsound(...$args);}
function Big(...$args){return H::Big(...$args);}
function Blink(...$args){return H::Blink(...$args);}
function Center(...$args){return H::Center(...$args);}
function Command(...$args){return H::Command(...$args);}
//function Content(...$args){return H::Content(...$args);}
//function Dir(...$args){return H::Dir(...$args);}
//function Element(...$args){return H::Element(...$args);}
function Font(...$args){return H::Font(...$args);}
function Frame(...$args){return H::Frame(...$args);}
function Frameset(...$args){return H::Frameset(...$args);}
function Image(...$args){return H::Image(...$args);}
function Isindex(...$args){return H::Isindex(...$args);}
function Keygen(...$args){return H::Keygen(...$args);}
function Listing(...$args){return H::Listing(...$args);}
function Marquee(...$args){return H::Marquee(...$args);}
//function Menuitem(...$args){return H::Menuitem(...$args);}
function Multicol(...$args){return H::Multicol(...$args);}
function Nextid(...$args){return H::Nextid(...$args);}
function Nobr(...$args){return H::Nobr(...$args);}
//function Noembed(...$args){return H::Noembed(...$args);}
function Noframes(...$args){return H::Noframes(...$args);}
function Plaintext(...$args){return H::Plaintext(...$args);}
//function Shadow(...$args){return H::Shadow(...$args);}
function Spacer(...$args){return H::Spacer(...$args);}
function Strike(...$args){return H::Strike(...$args);}
//function Tt(...$args){return H::Tt(...$args);}
function Xmp(...$args){return H::Xmp(...$args);}
