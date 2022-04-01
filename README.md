# h5bs Theme
## Requirements

- [nodejs](https://nodejs.org/en/)

### NVM (Node Version Manager)

NVM is not required but is recommended for installing different node versions for various projects.

```bash
# install / update nvm
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash

# install latest LTS node version
nvm install --lts

# install latest LTS node version and migrate existing installed packages
nvm install 'lts/*' --reinstall-packages-from=current

# use latest LTS version
nvm use --lts
```

## Setup

From the console, change directories into the WordPress theme.

```
cd {path}/wp-content/themes/{theme_name}
```

Run `npm install` to install the dependencies from `package.json`

```
npm install
```

## Local development

[Vite](https://vitejs.dev/) is used as a build tool to handle the frontend tooling. When working locally you will run
`npm run dev` to start the dev server and it will handle compiling the JavaScript and SCSS and will inject those changes
automatically. It is also set up to auto-reload when any changes are made to the php files. If you need to add any 
extra php paths to watch, you can edit the `vite.config.js` file under `plugins` and `liveReload`.

```bash
# start dev server
npm run dev
```

The `src/main.js` is set up as the main entry point. This file will be used to import SCSS as well as JavaScript. This
is pulled into the theme by the `vite('main.js')` function in the `header.php` file. If you need to add multiple entry
points, you can edit the `vite.config.js` file under `build:` `rollupOptions:`. Once that is added you will then need to
add an additional `vite('secondary.js')` function to the `header.php` file to pull in the new file.

```js
// single entry point
// ...
build: {
  rollupOptions: {
    input: '/main.js',
  },
}
// ...

// multiple entry points
// ...
build: {
  rollupOptions: {
    input: {
      main: '/main.js',
      secondary: '/secondary/js',
    }
  },
}
// ...
```

`npm run build` will compile all of the assets into the `dist` folder at the root. The `dist` folder will then need to
be uploaded to the production server when ready. The `is_development()` function under `lib/assets.php` is used to 
determine if the app is running in a development environment or production environment. If you need to test the 
production assets in the `dist` folder you can temporarily update the `is_development()` function to return `false`.

```bash
# build for production
npm run build
```

## Images

There is an `@images` alias set up for the `/src/assets/images` path. This can be used in both SCSS and JS files. You
can add additional path aliases in the `vite.config.js` file such as `@fonts` if needed.

```scss
body {
  background-image: url('@images/bg-image.jpg');
}
```

```js
import bgImage from '@images/bg-image.jpg'

document.body.style.backgroundImage = `url(${bgImage})`
```

## External packages

Use npm to manage packages. For example if you wanted to add axios to a project you would run `npm i axios` which
would add axios as a dependency to the `package.json` file and to your `node_modules` folder.

```bash
npm i axios
```

To include it in the project, at the top of your JavaScript file add an import.

```js
import axios from 'axios'
```

Then use as intended.

```js
axios
  .get('https://jsonplaceholder.typicode.com/users/1')
  .then((response) => {
    // handle success
    console.log(response)
  })
  .catch((error) => {
    // handle error
    console.log(error)
  })
```

## Linters

You can use the recommended VS Code extensions to have real-time linting errors and fixes in your editor. Search for
`@recommended` in the extensions tab. Or you can run the following commands to lint the JavaScript or SCSS files.

```bash
# run eslint on JS files
npx eslint "src/**/*.js" --fix

# run stylelint on SCSS files
npx stylelint "src/**/*.scss" --fix
```
