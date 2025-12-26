const { createElement, render } = wp.element;
const { getBlockType, createBlock } = wp.blocks;
const { dispatch } = wp.data;
const { Dashicon } = wp.components;

const PANEL_WIDTH = 80;

const QuickBlockPanel = () => {
    const blocks = [
        'core/paragraph',
        'core/image',
        'core/heading',
        'core/list',
        'core/quote',
    ];

    const insertBlock = (blockName) => {
        const { insertBlocks } = dispatch('core/block-editor');
        insertBlocks(createBlock(blockName));
    };

    const renderIcon = (icon) => {
        if (!icon) return createElement(Dashicon, { icon: 'block-default' });
        if (typeof icon === 'string') return createElement(Dashicon, { icon });
        if (typeof icon === 'object' && icon.src) {
            return typeof icon.src === 'string'
                ? createElement(Dashicon, { icon: icon.src })
                : icon.src;
        }
        return icon;
    };

    const renderBlockTitle = (title) => {
        return createElement(
            'div',
            {
                className: 'quick-block-button-title dis-none',
                title: title,
            },
            title
        );
    };

    return createElement(
        'div',
        { className: 'quick-block-panel' },
        blocks.map((blockName) => {
            const blockType = getBlockType(blockName);
            if (!blockType) return null;

            return createElement(
                'button',
                {
                    key: blockName,
                    className: 'quick-block-button',
                    onClick: () => insertBlock(blockName),
                    title: blockType.title,
                },
                renderIcon(blockType.icon),
           //     renderBlockTitle(blockType.title)
            );
        })
    );
};

// Mount safely inside skeleton body
wp.domReady(() => {
    const tryMount = () => {
        const bodyEl = document.querySelector('.interface-interface-skeleton__body');
        if (!bodyEl) {
            // Retry until skeleton is ready
            setTimeout(tryMount, 200);
            return;
        }

        if (!document.querySelector('#quick-block-panel-container')) {
            const container = document.createElement('div');
            container.id = 'quick-block-panel-container';
            bodyEl.prepend(container);
            render(createElement(QuickBlockPanel), container);

            // Shift editor canvas right
            const canvas = bodyEl.querySelector('.interface-interface-skeleton__canvas');
            if (canvas) {
                canvas.style.marginLeft = PANEL_WIDTH + 'px';
            }
        }
    };

    tryMount();
});
