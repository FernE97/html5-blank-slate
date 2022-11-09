module.exports = {
  extends: ['airbnb-base', 'plugin:vue/vue3-recommended', 'plugin:prettier/recommended'],
  env: {
    browser: true,
    node: true,
    es2022: true
  },
  parserOptions: {
    ecmaVersion: 2022
  },
  rules: {
    'no-console': 'off',
    'global-require': 'off',
    'no-use-before-define': 'off',
    'no-new': 'off',
    'no-unused-vars': 'warn',

    // override airbnb config to allow ForOfStatement
    'no-restricted-syntax': [
      'error',
      {
        selector: 'ForInStatement',
        message:
          'for..in loops iterate over the entire prototype chain, which is virtually never what you want. Use Object.{keys,values,entries}, and iterate over the resulting array.'
      },
      {
        selector: 'LabeledStatement',
        message: 'Labels are a form of GOTO; using them makes code confusing and hard to maintain and understand.'
      },
      {
        selector: 'WithStatement',
        message: '`with` is disallowed in strict mode because it makes code impossible to predict and optimize.'
      }
    ],

    // override airbnb config for devDependencies
    'import/no-extraneous-dependencies': ['error', { devDependencies: true }],

    // ignore aliased import paths
    'import/no-unresolved': ['error', { ignore: ['^@'] }],

    'prettier/prettier': [
      'error',
      {},
      {
        usePrettierrc: true
      }
    ]
  },
  plugins: ['vue', 'prettier']
}
