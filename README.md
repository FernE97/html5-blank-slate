# html5 Blank Slate WordPress Foundation 6 Theme

html5 Blank Slate is a WordPress theme that is meant to start you off with just the basics, making it easy to customize the theme for your specific project. The theme incorporates Foundation 6 into WordPress.

## What you'll need
- [git](http://git-scm.com/)
- [NodeJS](http://nodejs.org/)
- [Ruby 1.9+](https://www.ruby-lang.org/)
- [Compass](http://compass-style.org/)
- [Bower](http://bower.io/)

### Prerequisites

**git**
```
brew install git
```

**NodeJS**
```
brew install node
```

**Ruby**
```
# RVM
\curl -L https://get.rvm.io | bash -s stable

# Ruby
rvm use ruby --install --default
```

**Compass**
```
gem install compass
```

**Bower**
```
npm install -g bower
```

### Setup

From the console, change directories into the WordPress Theme
```
cd {path}/wp-content/themes/{theme_name}
```

Run `bower update` to get required foundation files
```
bower update
```

Run `compass watch` to watch for changes to the scss files. This will compile any changes to the `/assets/css` directory.
```
compass watch
```
