import { Categoria } from "@/Pages/Welcome";
import MultipleMenu from "../MultipleMenu";
import SingleMenu from "../singleMenu";
import styles from './sidebar.module.scss';

export default function Sidebar({ categoria }: Readonly<{ categoria: Categoria }>) {
    return (
        <div className={styles.sidebar}>
            <h4 className={styles.sidebar}>{categoria.nome}</h4>
            {categoria.posts.map(post => <SingleMenu texto={post.title_aside} slug={post.slug} key={post.id} />)}
            {categoria.grupos.map(grupo => <MultipleMenu texto={grupo.title_aside} key={grupo.id} posts={grupo.posts} slug={grupo.slug}/>)}
        </div>
    )
}