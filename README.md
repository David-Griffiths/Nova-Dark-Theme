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
    <img src="https://poser.pugx.org/david-griffiths/nova-dark-theme/downloads" alt="Downloads">
  </a>
  
  <a href="https://packagist.org/packages/david-griffiths/nova-dark-theme">
    <img src="https://poser.pugx.org/david-griffiths/nova-dark-theme/license" alt="License">
  </a>
</p>

<p align="center">
  <a href="https://user-images.githubusercontent.com/1121864/52905434-20b50a80-3232-11e9-8755-4e7ea49ca771.gif">
    <img src="https://user-images.githubusercontent.com/1121864/52905434-20b50a80-3232-11e9-8755-4e7ea49ca771.gif" alt="Dark Theme Toggle Switch">
  </a>
</p>

Installation
----------

First use composer to pull in the project:

`composer require david-griffiths/nova-dark-theme`

(Remember that you can install multiple themes with Nova. So you don't have to choose between this and another.)

Next you need to activate dark mode. To help you, there are several convenience commands included...

Add/Remove Toggle Switch From Menu
----------

This is probably what you're looking for, as it lets you easily turn on dark mode at night.

![toggle](https://user-images.githubusercontent.com/1121864/52905532-6d4d1580-3233-11e9-9b30-e75625615db4.png) 

`php artisan nova-dark-theme:add-switch`

If you've not made an over-writeable copy of Nova's user menu (the one in the top right), this command does that first of all. Then it adds the Vue component, which will look like this:

```php
        <li>
            <nova-dark-theme-toggle
                label="{{ __('Dark Theme') }}"
            ></nova-dark-theme-toggle>
        </li>
    </ul>
</dropdown-menu>
```

---

To remove the switch from your menu, you could edit the file yourself, or run this:

`php artisan nova-dark-theme:remove-switch`

Set Dark Mode On/Off By Default
----------

This can be used with the toggle switch or without it. If you're not using the toggle switch then when you set dark mode ON, it will stay on and not be changeable by users. If you _are_ using the switch, then the below commands will only set the theme state when the page first loads. The user will then be able to flip the switch whenever they like.

`php artisan nova-dark-theme:on`

`php artisan nova-dark-theme:off`

These commands add or remove a css class called `nova-dark-theme` from the HTML tag in Nova's main layout template.
Again, we copy this file to your resources directory (if you've not done so already) before making the change.

(:exclamation: _You might need to run `php artisan view:clear` or `php artisan view:cache` before seeing the results_)


How The CSS Works
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

