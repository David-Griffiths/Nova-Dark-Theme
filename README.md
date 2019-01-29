
<h1 align="center">
	Nova Dark Theme
</h1>

<p align="center">
	<strong>A dark theme for <a href="https://nova.laravel.com/">Laravel Nova</a> to save your tired eyes :eyes:</strong><br>
</p>

<p align="center">
  <a href="https://packagist.org/packages/david-griffiths/nova-dark-theme">
    <img src="https://poser.pugx.org/david-griffiths/nova-dark-theme/v/stable" alt="Latest Stable Version">
  </a>
  
  <a href="https://packagist.org/packages/david-griffiths/nova-dark-theme">
    <img src="https://poser.pugx.org/david-griffiths/nova-dark-theme/license" alt="License">
  </a>
</p>


![dark-shadow](https://user-images.githubusercontent.com/1121864/51878721-8bc49d00-2368-11e9-9983-a49e9afe18d0.png)

Installation
----------

This theme works in any Laravel app that uses Nova. Just require it and you're done.

`composer require david-griffiths/nova-dark-theme`

How It Works
----------

We use a css filter to invert the colors, then some manual tweaks for the sidebar and logo areas. So white becomes black, which you should keep in mind when adding any custom css colors.

Code Fields
----------

One item it doesn't style for you is the Nova `Code` field. I don't want impose a CodeMirror theme on you when you can [pick one from here](https://codemirror.net/demo/theme.html#default) and set it like this:

```php
Code::make('MyTextField')->options(['theme' => 'base16-light'])
```

(:exclamation: _Remember to pick a light coloured CodeMirror theme if you want it to appear dark in Nova after the colors get inverted_)


License
----------

MIT License (MIT). Please see [License File](LICENSE) for more.






