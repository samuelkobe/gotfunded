module.exports = {
  content: ["./**/*.php", "./**/*.css"],
  theme: {
    extend: {
      cursor: {
        close:
          "url(/Users/samkobe/Local Sites/got-funded/app/public/wp-content/themes/gotfunded/src/assets/view-project-bright.svg), pointer",
      },
      colors: {
        brand: {
          main: "#FFFFFF",
          alt: "#C2DDF0",
          third: "#006aff",
          third_dark: "#0051C3",
          fourth: "#e22d57",
          fourth_dark: "#BC2B4E",
          black: "#000000",
          light_grey: "#B1B1B1",
          dark_grey: "#4D4D4D",
          darkest_grey: "#2D2D2D",
        },
      },
      boxShadow: {
        'custom': '0 4px 6px -4px rgb(0 0 0 / 0.3)',
      },
      flexShrink: {
        4: 4,
      },
      fontFamily: {
        sans: ["Khula", "sans-serif"],
        title: ["Anek Telugu", "san-serif"],
      },
      minWidth: {
        "1/2": "50%",
        "1/3": "33.3334%",
      },
      minHeight: {
        0: "0",
        "1/4": "25%",
        "1/2": "50%",
        "3/4": "75%",
        full: "100%",
      },
      spacing: {
        "1/2": "50%",
        "1/3": "33.3334%",
        "1/4": "25%",
        "1/6": "16.6667%",
        "1/8": "12.5%",
        "1/12": "8.3333%",
        "1/24": "4.1667%",
        video: "56.6667%",
      },
      transitionDuration: {
        0: "0ms",
      },
      transitionDelay: {
        0: "0ms",
      },
      transitionProperty: {
        height: "height",
        "transform-height": "transform, height",
      },
      width: {
        "3/8": "37.5%",
        "5/8": "62.5%",
      },
      zIndex: {
        1: "1",
      },
    },
  },
  plugins: [],
};
