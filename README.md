# MAMP Homepage

Here is a little upgrade for MAMP htdocs default index (working for WAMP, Apache ... too).

### 1.Components

This index contains : 
- A list of your projects folders
- Live tools for encrypting (MD5 and SHA1)
- Live tools for create slug from string

### 2.Installation

Clone this repo into your htdocs folder

```sh
git clone https://github.com/fsalber/MampHomepage.git homepage
```

Copy file from "homepage" folder into your root folder and then remove "homepage" folder.

```sh
cp -R homepage/ ./
rm -rf homepage
```

### 2.Usage

Juste access the page from your webserver : HTTP://YOURHOST/index.php

It's working :)