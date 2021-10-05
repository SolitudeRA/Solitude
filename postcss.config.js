module.exports = {
    plugins: [
        require('postcss-sorting')({
            order: [
                'at-rules',
                'dollar-variables',
                'declarations',
                'custom-properties',
                'rules',
            ],

            'properties-order': "alphabetical",

            'unspecified-properties-position': 'bottom',
        }),

    ]
}