import { Categoria, Texto } from '@/Pages/Welcome';
import Sidebar from '../sidebar';
import styles from './content.module.scss';

export default function Content({categorias, textos} : Readonly<{categorias: Categoria[], textos: Texto[]}>){
    return (
        <section className={styles.content}>
            <div>
                {categorias.map(categoria => <Sidebar key={categoria.id} categoria={categoria}/>)}
            </div>
            <div>
                {textos.map(texto => texto.corpo)}
            </div>
            <div></div>
        </section>
    )
}