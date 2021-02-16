import Link from 'next/link'
import navStyles from '../styles/Nav.module.css'


const Nav = () => {
    
    return (
        <nav className={navStyles.nav}>
            <ul>
                <li><Link href='/'>Home</Link></li>
                <li><Link href='/items'>Items</Link></li>
                <li><Link href='/cashiers'>Cashiers</Link></li>
                <li><Link href='/receipts'>Receipts</Link></li>
                <li><Link href='/sales'>Sales</Link></li>
                <li><Link href='/customers'>Customers</Link></li>
            </ul>
        </nav>
    )
}

export default Nav