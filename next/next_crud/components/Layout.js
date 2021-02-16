import Nav from './Nav'
import styles from '../styles/Layout.module.css'

const Layout = ({children}) => {
    return (
        <>
        <Nav/>
        <div>
            {/* <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">danger</div> */}
            <main >
            {children}
            </main>
        </div>
        </>
    )
}

export default Layout