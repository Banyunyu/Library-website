import LoginController from './LoginController'
import RegisterController from './RegisterController'
const Auth = {
    LoginController: Object.assign(LoginController, LoginController),
RegisterController: Object.assign(RegisterController, RegisterController),
}

export default Auth