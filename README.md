# h5bs Theme
## Requirements

- [nodejs](https://nodejs.org/en/)
- [yarn](https://yarnpkg.com/en/docs/install)
### NVM (Node Version Manager)

NVM is not required but is recommended for installing different node versions for various projects.

```bash
# install / update nvm
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.38.0/install.sh | bash

# install latest LTS node version
nvm install --lts

# use latest LTS version
nvm use --lts
```

## Setup

From the console, change directories into the WordPress theme.

```
cd {path}/wp-content/themes/{theme_name}
```

Run `yarn` to install the dependencies from `package.json`

```
yarn
```

## Local development

[Vite](https://vitejs.dev/) is used as a build tool to handle the frontend tooling. When working locally you will run
`yarn dev` to start the dev server and it will handle compiling the javascript and scss and will inject those changes
automatically. It is also set up to auto-reload when any changes are made to the php files. If you need to add any 
extra php paths to watch, you can edit the `vite.config.js` file under `plugins` and `liveReload`.

Once you are ready to push to production run `yarn build` to compile the assets. This will create a `dist` folder at
the root which will then needed to be uploaded to the production server.

```bash
# start dev server
yarn dev

# build for production
yarn build
```

## Images

There is an `@images` alias set up for the path to the images directory. This can be used in both the scss and js files.

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

Use yarn to manage packages. For example if you wanted to add axios to a project you would run `yarn add axios` which
would add axios as a dependency to the `package.json` file and to your `node_modules` folder.

```bash
yarn add axios
```

To include it in the project, at the top of your javascript file add an import.

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
`@recommended` in the extensions tab. Or you can run the following commands to lint the javascript or scss files.

```bash
# run eslint on js files
npx eslint "src/**/*.js" --fix

# run stylelint on scss files
npx stylelint "src/**/*.scss" --fix
```
