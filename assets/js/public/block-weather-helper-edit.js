
( function( blocks, element ) {
    let el = element.createElement;

    blocks.registerBlockType( 'block/block-weather-helper',
        {
            title: 'Block Weather Helper',
            icon: 'admin-customizer',
            category: 'common',
            edit: ( props ) => {
                return el(
                    'div',
                    { className: 'weather-helper-block' },
                    'The city and weather will be displayed here'
                );
            },
            save: ( props ) => {
                return el(
                    'div',
                    { className: 'weather-helper-block' },
                    'The city and weather will be displayed here'
                );
            },
        }
    );

} )(
    window.wp.blocks,
    window.wp.element,
);
