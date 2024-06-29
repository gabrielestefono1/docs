import { Link } from '@inertiajs/react';
import styles from './singleMenu.module.scss';

export default function SingleMenu({texto, active = false}: {texto: string; active?: boolean}){
    return (
        <Link href="/" className={`${styles.single} ${active ? styles.active : ''}`}>
            <div>
                {texto}
            </div>
        </Link>
    )
}