import { Link } from "@inertiajs/react";
import styles from './Header.module.scss';
import logoDark from './logo_dark.svg';
import github from './github.svg';

export default function Header() {
    return (
        <header className={styles.header}>
            <div>
                <div>
                    <Link href="/"><img src={logoDark} alt="Logotipo do react em modo dark" /> React </Link>
                    <span>v18.3.1</span>
                </div>
                <div>
                    {/* <Link href="">Aprenda</Link> */}
                    {/* <Link href="">Referência</Link> */}
                    <Link href="">
                        <img src={github} alt="Link do repositório do GitHub"/>
                    </Link>
                </div>
            </div>
        </header>
    )
}