const { defineConfig } = require("@vue/cli-service");

module.exports = defineConfig({
  transpileDependencies: [
    "vuetify", // Add any other dependencies you want to transpile
  ],
  configureWebpack: {
    module: {
      rules: [
        {
          test: /\.m?jsx?$/,
          use: {
            loader: "babel-loader",
            options: {
              presets: ["@vue/cli-plugin-babel/preset"],
            },
          },
        },
      ],
    },
  },
});
