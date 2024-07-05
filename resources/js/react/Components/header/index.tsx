import { Link } from "@inertiajs/react";
import styles from './Header.module.scss';
import logoDark from './logo_dark.svg';
import github from './github.svg';
import margnifying from '../icons/magnifying.svg';

export default function Header() {
    return (
        <header className={styles.header}>
            <nav>
                <div>
                    <Link href="/"><img src={logoDark} alt="Logotipo do react em modo dark" /> React </Link>
                    <span>v18.3.1</span>
                </div>
                <button>
                    <div>
                        <img src={margnifying} alt="Pesquise"/>
                        <p>Search</p>
                    </div>
                    <div>
                        <span>Ctrl</span>
                        <span>K</span>
                    </div>
                </button>
                <div>
                    <Link href="">Aprenda</Link>
                    <Link href="">Referência</Link>
                    <Link href="">Comunidade</Link>
                    <Link href="">Blog</Link>
                    <Link href="">
                        <img src={github} alt="Alternar entre modo escuro e claro"/>
                    </Link>
                    <Link href="">
                        <img src={github} alt="Tradução para outras linguagens"/>
                    </Link>
                    <Link href="">
                        <img src={github} alt="Link do repositório do GitHub"/>
                    </Link>
                </div>
            </nav>
        </header>
    )
}