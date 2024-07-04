import { Categoria } from "@/react/Pages/Welcome";
import MultipleMenu from "../MultipleMenu";
import SingleMenu from "../singleMenu";
import styles from './sidebar.module.scss';

export default function Sidebar() {
    return (
        <div className={styles.sidebar}>
            <h4 className={styles.sidebar}>Título</h4>
            <SingleMenu/>
            <SingleMenu/>
            <SingleMenu/>
            {/* <MultipleMenu texto={grupo.title_aside} key={grupo.id} posts={grupo.posts} slug={grupo.slug}/> */}
        </div>
    )
}