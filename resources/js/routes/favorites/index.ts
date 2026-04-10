import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../wayfinder'
/**
* @see \App\Http\Controllers\FavoriteController::index
 * @see app/Http/Controllers/FavoriteController.php:15
 * @route '/favorites'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/favorites',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\FavoriteController::index
 * @see app/Http/Controllers/FavoriteController.php:15
 * @route '/favorites'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\FavoriteController::index
 * @see app/Http/Controllers/FavoriteController.php:15
 * @route '/favorites'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\FavoriteController::index
 * @see app/Http/Controllers/FavoriteController.php:15
 * @route '/favorites'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\FavoriteController::destroy
 * @see app/Http/Controllers/FavoriteController.php:69
 * @route '/favorites/{book}'
 */
export const destroy = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/favorites/{book}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\FavoriteController::destroy
 * @see app/Http/Controllers/FavoriteController.php:69
 * @route '/favorites/{book}'
 */
destroy.url = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { book: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { book: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    book: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        book: typeof args.book === 'object'
                ? args.book.id
                : args.book,
                }

    return destroy.definition.url
            .replace('{book}', parsedArgs.book.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\FavoriteController::destroy
 * @see app/Http/Controllers/FavoriteController.php:69
 * @route '/favorites/{book}'
 */
destroy.delete = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})
const favorites = {
    index: Object.assign(index, index),
destroy: Object.assign(destroy, destroy),
}

export default favorites