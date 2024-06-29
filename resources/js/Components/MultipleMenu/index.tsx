import { Link } from '@inertiajs/react';
import styles from './multipleMenu.module.scss';
import chevron from './chevron.svg';
import { Post } from '@/Pages/Welcome';

export default function MultipleMenu({texto, posts, active = true}: {texto: string; posts: Post[], active?: boolean}){
    return (
        <div>
            <Link href="/" className={`${styles.multiple} ${active ? styles.active : ''}`}>
                <div>{texto} <img src={chevron} alt='Leia!'/></div>
            </Link>
            {active && posts.map(post => 
                <Link href="/" className={`${styles.singleChild} ${active ? styles.activeChild : ''}`}>
                    <div>{post.title_aside}</div>
                </Link>
            )}
        </div>
    )
}