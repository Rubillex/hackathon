export const route = (path: string, name: string, layout: string = 'main') => ({
    path,
    name,
    meta: {
        layout
    }
});
