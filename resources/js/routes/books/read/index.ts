import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\BookController::page
 * @see app/Http/Controllers/BookController.php:71
 * @route '/books/{book}/read/page/{page}'
 */
export const page = (args: { book: number | { id: number }, page: string | number } | [book: number | { id: number }, page: string | number ], options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: page.url(args, options),
    method: 'get',
})

page.definition = {
    methods: ["get","head"],
    url: '/books/{book}/read/page/{page}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\BookController::page
 * @see app/Http/Controllers/BookController.php:71
 * @route '/books/{book}/read/page/{page}'
 */
page.url = (args: { book: number | { id: number }, page: string | number } | [book: number | { id: number }, page: string | number ], options?: RouteQueryOptions) => {
    if (Array.isArray(args)) {
        args = {
                    book: args[0],
                    page: args[1],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        book: typeof args.book === 'object'
                ? args.book.id
                : args.book,
                                page: args.page,
                }

    return page.definition.url
            .replace('{book}', parsedArgs.book.toString())
            .replace('{page}', parsedArgs.page.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\BookController::page
 * @see app/Http/Controllers/BookController.php:71
 * @route '/books/{book}/read/page/{page}'
 */
page.get = (args: { book: number | { id: number }, page: string | number } | [book: number | { id: number }, page: string | number ], options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: page.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\BookController::page
 * @see app/Http/Controllers/BookController.php:71
 * @route '/books/{book}/read/page/{page}'
 */
page.head = (args: { book: number | { id: number }, page: string | number } | [book: number | { id: number }, page: string | number ], options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: page.url(args, options),
    method: 'head',
})
const read = {
    page: Object.assign(page, page),
}

export default read