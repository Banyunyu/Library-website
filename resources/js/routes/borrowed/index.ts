import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../wayfinder'
/**
* @see \App\Http\Controllers\BorrowController::index
 * @see app/Http/Controllers/BorrowController.php:15
 * @route '/borrowed'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/borrowed',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\BorrowController::index
 * @see app/Http/Controllers/BorrowController.php:15
 * @route '/borrowed'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\BorrowController::index
 * @see app/Http/Controllers/BorrowController.php:15
 * @route '/borrowed'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\BorrowController::index
 * @see app/Http/Controllers/BorrowController.php:15
 * @route '/borrowed'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\BorrowController::destroy
 * @see app/Http/Controllers/BorrowController.php:90
 * @route '/borrowed/{borrowed}'
 */
export const destroy = (args: { borrowed: number | { id: number } } | [borrowed: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/borrowed/{borrowed}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\BorrowController::destroy
 * @see app/Http/Controllers/BorrowController.php:90
 * @route '/borrowed/{borrowed}'
 */
destroy.url = (args: { borrowed: number | { id: number } } | [borrowed: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { borrowed: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { borrowed: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    borrowed: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        borrowed: typeof args.borrowed === 'object'
                ? args.borrowed.id
                : args.borrowed,
                }

    return destroy.definition.url
            .replace('{borrowed}', parsedArgs.borrowed.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\BorrowController::destroy
 * @see app/Http/Controllers/BorrowController.php:90
 * @route '/borrowed/{borrowed}'
 */
destroy.delete = (args: { borrowed: number | { id: number } } | [borrowed: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})
const borrowed = {
    index: Object.assign(index, index),
destroy: Object.assign(destroy, destroy),
}

export default borrowed