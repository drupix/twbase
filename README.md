# TWBase Theme

A Starter theme for Drupal built with [Tailwind CSS](https://tailwindcss.com/).

[![tailwindcss](https://img.shields.io/badge/tailwindcss-%3E%3D%202.2.7-blue.svg?style=flat-square&logo=tailwindcss)](https://tailwindcss.com)
[![drupal](https://img.shields.io/badge/drupal-^9-blue.svg?style=flat-square&logo=drupal)](https://drupal.org/)
[![LICENSE](https://img.shields.io/github/license/drupix/twbase?style=flat-square)](https://raw.githubusercontent.com/drupix/twbase/master/LICENSE.txt)

**:warning: WARNING: TWBase is under development and not yet ready for production 🐞**

## Recommended Modules

As TWBase Theme use [Tailwind Typography](https://github.com/tailwindlabs/tailwindcss-typography) I recommends you to install [TWBase Theme Utilities](https://github.com/drupix/twbase_utils) modules with this theme. It load the `styles.css` provided by **TWBase Theme** and add the `prose` (`tw-prose`) extra class to the editor `body` to reflects the frontend while editing node in admin section. Otherwise the content in your editor may look slightly poor and naked... 🙀. The module also provide an admin interface to control the frontpage showcase content and last but not least: it allows you to define showcase and related options per content type 🥳.

## Demo

You can view a very [basic demo](https://twbase-theme.drupal-solutions.ch/) with the [TWBase Theme Utilities](https://github.com/drupix/twbase_utils) modules installed.

## Development dependencies

* [tailwindcss](https://tailwindcss.com/) ^2.2.17
  * All is said!
* [postcss](https://github.com/postcss/postcss)
  * Transforming styles with JS plugins
* [postcss-cli](https://github.com/postcss/postcss-cli)
  * CLI for postcss
* [postcss-import](https://github.com/postcss/postcss-import)
  * PostCSS plugin to inline @import rules content
* [autoprefixer](https://github.com/postcss/autoprefixer)
  * Parse CSS and add vendor prefixes to rules by Can I Use
* [chokidar](https://github.com/paulmillr/chokidar) / [chokidar-cli](https://github.com/open-cli-tools/chokidar-cli)
  * Minimal and efficient cross-platform file watching library
* [cssnano](https://github.com/cssnano/cssnano)
  * A modular minifier, built on top of the PostCSS ecosystem.

To install all dependencies run **`npm install`** from theme root directory.

## CSS compilation

### Development compilation

The Just-In-Time mode (**`jit`** ) is activated in `tailwind.config.js` which allows to compile css on the fly... bzzzzz...

To **watch** changes while *"playing"* with `css` and html `class`, run  **`npm run watch`** from theme root directory.

### Building for production

When building for production, you should always use Tailwind’s purge option to tree-shake unused styles and optimize your final build size.

**📌 As I'm a little 🐒 still learning the intricacies of Tailwind, this part needs refinement.**

```javascript
// tailwind.config.js
module.exports = {
  mode: 'jit',
  purge: {
    // mode: "all",
    // enabled: true,
    preserveHtmlElements: false,
    options: {
      keyframes: true,
    },
    content: [
      './**/*.twig',
      '../../../{modules,themes}/custom/**/*.twig'
    ],
  },
  ...
}
```

By default, for development purpose the outputed css file is not minified. To minify it, uncomment `cssnano` in the plugins section of `postcss.config.js` :

```javascript
// postcss.config.js
module.exports = {
  plugins: {
    'postcss-import': {},
    tailwindcss: {},
    autoprefixer: {},
    //Uncomment this to minify the outputed css file
//     cssnano: {
//       preset: "default",
//     },
  }
}
```

When you're happy with all this, **build** the final css file by running the command **`npm run build`** from theme root directory.

## Credits

### Creator

It's me! **drupix**

* <https://drupal-solutions.ch>
* <https://github.com/drupix>

### Icons + Demo Images

* [Font Awesome](https://fontawesome.com/)
* [Unsplash](https://unsplash.com/)

### Other

* All contributors of [Tailwind CSS](https://github.com/tailwindlabs/tailwindcss/graphs/contributors)
* All contributors of [PostCSS](https://github.com/postcss/postcss/graphs/contributors) and [PostCSS CLI](https://github.com/postcss/postcss-cli/graphs/contributors)
* All contributors of [postcss-import](https://github.com/postcss/postcss-import/graphs/contributors)
* All contributors of [autoprefixer](https://github.com/postcss/autoprefixer/graphs/contributors)
* [Paul Miller](https://github.com/paulmillr) and [all contributors](https://github.com/paulmillr/chokidar/graphs/contributors) of [chokidar](https://github.com/paulmillr/chokidar) and [Chokidar CLI](https://github.com/open-cli-tools/chokidar-cli/graphs/contributors)
* All contributors of [cssnano](https://github.com/cssnano/cssnano/graphs/contributors)
* All the other guys I forgot to mention here

Special thanks to [Bob den Otter 🌷🇳🇱](https://github.com/bobdenotter) and [all contributors of Bolt](https://github.com/bolt/bolt) default theme who opened my eyes with Tailwind.

---

## License

The MIT License (MIT)

Copyright (c) 2021 Enzo Di Resta (aka drupix)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

TWBase incorporates [Font Awesome](https://fontawesome.com/).
Font Awesome is distributed under the terms of the [Font Awesome Free License](https://github.com/FortAwesome/Font-Awesome#license).

TWBase incorporates photographs from [Unsplash](https://unsplash.com).
