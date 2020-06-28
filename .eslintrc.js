module.exports = {
  env: {
    browser: true,
    es2020: true,
  },
  extends: [
    "plugin:vue/essential",
    "airbnb-base",
    "plugin:prettier/recommended",
  ],
  parserOptions: {
    ecmaVersion: 11,
    parser: "@typescript-eslint/parser",
    sourceType: "module",
  },
  plugins: ["vue", "@typescript-eslint"],
  rules: {
    "vue/component-name-in-template-casing": ["error", "PascalCase"],
    "no-console": process.env.NODE_ENV === "production" ? "error" : "off",
    "no-debugger": process.env.NODE_ENV === "production" ? "error" : "off",
    "prettier/prettier": [
      "error",
      {
        singleQuote: true,
        trailingComma: "es5",
        semi: true,
        htmlWhitespaceSensitivity: "ignore",
        useVoidTags: true,
      },
    ],
  },
};
