import { Categoria } from '@/Pages/Welcome';
import Sidebar from '../sidebar';
import styles from './content.module.scss';

export default function Content({categorias} : Readonly<{categorias: Categoria[]}>){
    return (
        <section className={styles.content}>
            <div>
                {categorias.map(categoria => <Sidebar categoria={categoria}/>)}
            </div>
            <div>
                {`Em sua forma mais comum, o texto é como se segue:

"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et, sagittis ac, posuere eu, lectus. Nam mattis, felis ut adipiscing."
Nos países de língua inglesa o texto apresenta-se em forma um pouco diferente, apresentada a seguir:

"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."`}
            </div>
            <div></div>
        </section>
    )
}