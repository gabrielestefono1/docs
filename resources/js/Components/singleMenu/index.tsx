import { Link, usePage } from '@inertiajs/react';
import styles from './singleMenu.module.scss';

export default function SingleMenu({texto, slug}: {texto: string; slug: string}){
    const router = usePage();
    const active = router.url.replace('/', '') == slug;
    return (
        <Link href={`/${slug}`} className={`${styles.single} ${active ? styles.active : ''}`}>
            <div>{texto}</div>
        </Link>
    )
}