import Auth from './Auth'
import AboutController from './AboutController'
import BookController from './BookController'
import BorrowController from './BorrowController'
import FavoriteController from './FavoriteController'
import Admin from './Admin'
const Controllers = {
    Auth: Object.assign(Auth, Auth),
AboutController: Object.assign(AboutController, AboutController),
BookController: Object.assign(BookController, BookController),
BorrowController: Object.assign(BorrowController, BorrowController),
FavoriteController: Object.assign(FavoriteController, FavoriteController),
Admin: Object.assign(Admin, Admin),
}

export default Controllers