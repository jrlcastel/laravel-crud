import styles from '../styles/Layout.module.css'

const Entry = ({children}) => {
    return (
        <>
        <Nav/>
        <div>
            <main className={styles.main}>
            {children}
            </main>
        </div>
        </>
    )
}

export default Layout