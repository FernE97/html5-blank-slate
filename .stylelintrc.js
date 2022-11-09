module.exports = {
  extends: ['stylelint-config-recommended', 'stylelint-config-prettier'],
  rules: {
    'color-named': 'always-where-possible',
    'max-nesting-depth': 3,
    'no-duplicate-selectors': null,
    'at-rule-no-unknown': [
      true,
      {
        ignoreAtRules: ['tailwind', 'apply', 'layer', 'variants', 'responsive', 'screen']
      }
    ]
  }
}
