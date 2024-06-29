import { Categoria } from "@/Pages/Welcome";
import MultipleMenu from "../MultipleMenu";
import SingleMenu from "../singleMenu";
import styles from './sidebar.module.scss';

export default function Sidebar({ categoria }: Readonly<{ categoria: Categoria }>) {
    return (
        <div className={styles.sidebar}>
            <h4 className={styles.sidebar}>{categoria.nome}</h4>
            {categoria.posts.filter(post => post.filho === false && post.tem_filhos === false).map(post => <SingleMenu texto={post.title_aside} key={post.id}/>)}
            {categoria.posts.filter(post => post.filho === false && post.tem_filhos === true).map(post => <MultipleMenu texto={post.title_aside} key={post.id} posts={categoria.posts.filter(el => el.id_pai === post.id)}/>)}
        </div>
    )
}