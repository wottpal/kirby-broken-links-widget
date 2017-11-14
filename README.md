# 🔗 Broken Links Checker Widget by [@wottpal](https://twitter.com/wottpal)

<!-- Buttons -->
![Release](https://img.shields.io/github/release/wottpal/kirby-broken-links-widget/all.svg)
[![MIT](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/wottpal/kirby-broken-links-widget/master/LICENSE)
[![Tweet](https://img.shields.io/twitter/url/https/github.com/wottpal/kirby-broken-links-widget.svg?style=social)](https://twitter.com/intent/tweet?text=&#x2693;&#x20;&#x41;&#x6E;&#x63;&#x68;&#x6F;&#x72;&#x2D;&#x48;&#x65;&#x61;&#x64;&#x69;&#x6E;&#x67;&#x73;&#x20;&#x66;&#x6F;&#x72;&#x20;&#x40;&#x67;&#x65;&#x74;&#x6B;&#x69;&#x72;&#x62;&#x79;&#x20;&#x62;&#x79;&#x20;&#x40;&#x77;&#x6F;&#x74;&#x74;&#x70;&#x61;&#x6C;&url=https://git.io/v7aFU)


A panel-widget for the [Kirby CMS](https://getkirby.com) which shows broken links within the pages.


![Screenshot of the Broken-Links Panel-Widget](demo.png)

_Disclaimer:_ This is a pre-release and it is not feature-complete yet. (see *Roadmap* below)


# Installation

Use [Kirby's CLI](https://github.com/getkirby/cli) and install the plugin via: `kirby plugin:install wottpal/kirby-broken-links-widget` or place the repo manually under `site/plugins` (without the `kirby-` prefix).

🎉 **That's it.**


# Options

The following options can be set globally in your `config.php` with `c::set($key, $value = null)`. You can also set multiple keys with `c::set([$key => $value, ..])`. 🤓

**Please prefix every key with `broken-links.`!**

key               | default | description
----------------- | ------- | ------------------------------------------------
`include-external`     | `false`     | Not only test for internal links but also for external ones.*
`include-fields`     | `['text']`     | Use other fields than `text` to search for broken links.
`exclude-pages`     | `[]`     | Page-IDs to exclude from broken link search.
`exclude-links`     | `['/error']`     | Page-IDs or external links to exclude from broken link search.

\* **Not recommended yet because it only works synchonously with the page-load of your panel which will slow everything quite down a bit.**


# Changelog

Have a look at the [releases page](https://github.com/wottpal/kirby-anchor-headings/releases).


# Roadmap

- [x] Make pages excludable
- [x] Make fields user-definable
- [ ] Do checks asynchronously
- [ ] Check for internet-connection (if external links are enabled)



# 💰‍ Pricing
Just kidding. This plugin is totally free. Please consider following [me](https://twitter.com/wottpal) on Twitter if it saved your day.

[![Twitter Follow](https://img.shields.io/twitter/follow/wottpal.svg?style=social&label=Follow)](https://twitter.com/wottpal)

You can also check out one of [my other Kirby-plugins](https://wottpal.com/items/my-kirby-plugins):

* [Lightbox-Gallery](https://github.com/wottpal/kirby-lightbox-gallery) - Easily inline beautifully aligned galleries with lightbox-support powered by PhotoSwipe.
* [HTML5-Video Kirbytag](https://github.com/wottpal/kirby-video) - Adds a kirbytag for embedding HTML5-videos with a variety of features.
* [Anchor-Headings](https://github.com/wottpal/kirby-anchor-headings) - A kirby field-method which enumerates heading-elements, generates IDs for anchor-links and inserts custom markup based on your needs.
