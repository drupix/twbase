// To see, check and test:
// // Theming Tailwind with CSS Variables
// https://www.youtube.com/watch?v=MAtaT8BZEAo
//
// 07: Customizing Your Design System – Tailwind CSS: From Zero to Production
// https://www.youtube.com/watch?v=0l0Gx8gWPHk

// const { margin } = require('tailwindcss/defaultTheme');

const baseColors = {
  turquoise: {
    darkest: '#0891B2',  // cyan-600
    dark: '#06B6D4',     // cyan-500
    DEFAULT: '#22D3EE',  // cyan-400
    light: '#67E8F9',    // cyan-300
    lightest: '#A5F3FC', // cyan-200
  },
  primary: {
    darkest: '#1D4ED8',  // blue-700
    dark: '#2563EB',     // blue-600
    DEFAULT: '#3B82F6',  // blue-500
    light: '#60A5FA',    // blue-400
    lightest: '#93C5FD', // blue-300
  },
  secondary: {
    darkest: '#4F46E5',  // indigo-600
    dark: '#6366F1',     // indigo-500
    DEFAULT: '#818CF8',  // indigo-400
    light: '#A5B4FC',    // indigo-300
    lightest: '#C7D2FE', // indigo-200
  },
  success: {
    darkest: '#059669',  // green-600
    dark: '#10B981',     // green-500
    DEFAULT: '#34D399',  // green-400
    light: '#6EE7B7',    // green-300
    lightest: '#A7F3D0', // green-200
  },
  danger: {
    darkest: '#B91C1C',  // red-700
    dark: '#DC2626',     // red-600
    DEFAULT: '#EF4444',  // red-500
    light: '#F87171',    // red-400
    lightest: '#FCA5A5', // red-300
  },
  warning: {
    darkest: '#D97706',  // yellow-600
    dark: '#F59E0B',     // yellow-500
    DEFAULT: '#FBBF24',  // yellow-400
    light: '#FCD34D',    // yellow-300
    lightest: '#FDE68A', // yellow-200
  },
}

module.exports = {
  content: [
    './**/*.twig',
    '../../../{modules,themes}/custom/**/*.twig'
  ],
  safelist: [
    // Needed by twbase_utils module, see twbase_utils_editor_js_settings_alter().
    'tw-p-4',
    'tw-prose',
    // Needed in menu while switching between dark/light mode
    'tw-text-white',
    'tw-text-black',
    'tw-text-slate-200',
    'tw-text-slate-500',
  ],
  darkMode: 'class', // false or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        turquoise: {
          darkest: baseColors.turquoise.darkest,
          dark: baseColors.turquoise.dark,
          DEFAULT: baseColors.turquoise.DEFAULT,
          light: baseColors.turquoise.light,
          lightest: baseColors.turquoise.lightest,
        },
        primary: {
          darkest: baseColors.primary.darkest,
          dark: baseColors.primary.dark,
          DEFAULT: baseColors.primary.DEFAULT,
          light: baseColors.primary.light,
          lightest: baseColors.primary.lightest,
        },
        secondary: {
          darkest: baseColors.secondary.darkest,
          dark: baseColors.secondary.dark,
          DEFAULT: baseColors.secondary.DEFAULT,
          light: baseColors.secondary.light,
          lightest: baseColors.secondary.lightest,
        },
        success: {
          darkest: baseColors.success.darkest,
          dark: baseColors.success.dark,
          DEFAULT: baseColors.success.DEFAULT,
          light: baseColors.success.light,
          lightest: baseColors.success.lightest,
        },
        danger: {
          darkest: baseColors.danger.darkest,
          dark: baseColors.danger.dark,
          DEFAULT: baseColors.danger.DEFAULT,
          light: baseColors.danger.light,
          lightest: baseColors.danger.lightest,
        },
        warning: {
          darkest: baseColors.warning.darkest,
          dark: baseColors.warning.dark,
          DEFAULT: baseColors.warning.DEFAULT,
          light: baseColors.warning.light,
          lightest: baseColors.warning.lightest,
        },
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
              /* position: 'relative', */
              padding: '0.75rem 3rem 1rem 2.25rem',
              /*
              margin: '1rem',
              border: 'none',
              borderRadius: '1.5rem',
              */
              background: theme('colors.slate.100'),
            },
            'blockquote cite': {
              display: 'inline-block',
              fontSize: '.875em',
              lineHeight: '1.25rem',
              paddingBottom: '1.25rem',
            },
            /*
            'blockquote p:first-of-type::before, blockquote p:last-of-type::after': {
              fontFamily: 'Georgia, serif',
              position: 'absolute',
              fontWeight: '600',
              color: theme('colors.slate.400'),
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
            */
            // 'ol > li::before': {
            //   color: theme('colors.slate.800'),
            // },
          },
        },
        md: {
          css: {
            blockquote: {
              padding: '0.75rem 2rem 1rem 2.25rem',
            },
            'blockquote cite': {
              paddingBottom: '1rem',
            },
          },
        },
        sm: {
          css: {
            blockquote: {
              padding: '0.75rem 2.5rem 1rem 2.25rem',
            },
            'blockquote cite': {
              paddingBottom: '1rem',
            },
          },
        },
        dark: {
          css: {
            color: theme('colors.slate.200'),
            '[class~="lead"]': {
              color: theme('colors.slate.200'),
            },
            h1: {
              color: theme('colors.slate.200'),
            },
            h2: {
              color: theme('colors.slate.200'),
            },
            h3: {
              color: theme('colors.slate.200'),
            },
            h4: {
              color: theme('colors.slate.200'),
            },
            h5: {
              color: theme('colors.slate.200'),
            },
            h6: {
              color: theme('colors.slate.200'),
            },
            strong: {
              color: theme('colors.slate.200'),
            },
            code: {
              color: theme('colors.slate.400'),
            },
            pre: {
              backgroundColor: theme('colors.slate.900'),
            },
            blockquote: {
              color: theme('colors.slate.200'),
              background: theme('colors.slate.600'),
            },
            'ol > li::before': {
              color: theme('colors.slate.200'),
            },
            'thead th': {
              color: theme('colors.slate.200'),
            },
          }
        }
      })
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
  ],
  prefix: 'tw-'
}
