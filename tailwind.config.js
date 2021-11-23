const { margin } = require('tailwindcss/defaultTheme');

module.exports = {
  mode: 'jit',
  purge: {
    // mode: "all",
    // enabled: true,
    // enabled: false,
    preserveHtmlElements: false,
    options: {
      keyframes: true,
    },
    content: [
      './**/*.twig',
      '../../../{modules,themes}/custom/**/*.twig'
    ],
  },
  darkMode: 'class', // false or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'my-color': '#a83232',
      },
      // See https://github.com/tailwindlabs/tailwindcss-typography/blob/master/src/styles.js
      typography: (theme) => ({
        DEFAULT: {
          css: {
            maxWidth: null,
            a: {
              color: 'inherit',
            },
            blockquote: {
              position: 'relative',
              // fontSize: '1.125em',
              // fontStyle: 'italic',
              // fontWeight: 'inherit',
              padding: '1.25rem 3rem 1.5rem 2.25rem',
              margin: '1rem',
              border: 'none',
              borderRadius: '1.5rem',
              // color: theme('colors.gray.700'),
              background: theme('colors.gray.100'),
            },
            'blockquote cite': {
              display: 'inline-block',
              fontSize: '.875em',
              lineHeight: '1.25rem',
            },
            'blockquote p:first-of-type::before, blockquote p:last-of-type::after': {
              fontFamily: 'Georgia, serif',
              position: 'absolute',
              fontWeight: '600',
              color: theme('colors.gray.400'),
            },
            'blockquote p::before': {
              content: '“',
              fontSize: '4.5rem',
              lineHeight: '1',
              marginRight: '-2rem',
              right: '100%',
              top: '.5rem',
            },
            'blockquote p::after': {
              content: '”',
              bottom: '-1rem',
              fontSize: '8rem',
              lineHeight: '2.5rem',
              right: '1.25rem',
              top: 'auto',
            },
            // 'ol > li::before': {
            //   color: theme('colors.gray.800'),
            // },
          },
        },
        md: {
          css: {
            blockquote: {
              margin: '1rem 3rem',
            },
          },
        },
        dark: {
          css: {
            color: theme('colors.gray.200'),
            '[class~="lead"]': {
              color: theme('colors.gray.200'),
            },
            h1: {
              color: theme('colors.gray.200'),
            },
            h2: {
              color: theme('colors.gray.200'),
            },
            h3: {
              color: theme('colors.gray.200'),
            },
            h4: {
              color: theme('colors.gray.200'),
            },
            h5: {
              color: theme('colors.gray.200'),
            },
            h6: {
              color: theme('colors.gray.200'),
            },
            strong: {
              color: theme('colors.gray.200'),
            },
            code: {
              color: theme('colors.gray.400'),
            },
            pre: {
              backgroundColor: theme('colors.gray.900'),
            },
            blockquote: {
              color: theme('colors.gray.200'),
              background: theme('colors.gray.600'),
            },
            'ol > li::before': {
              color: theme('colors.gray.200'),
            },
            'thead th': {
              color: theme('colors.gray.200'),
            },
          }
        }
      })
    },
  },
  variants: {
    extend: {
      typography: ['dark']
    },
  },
  plugins: [
//    require('@tailwindcss/jit'),
    require('@tailwindcss/typography'),
  ],
  // important: true,
  prefix: 'tw-'
}
