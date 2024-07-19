import { Categoria, Texto } from "@/react/Pages/Welcome";
import Sidebar from "../sidebar";
import styles from "./content.module.scss";
import ReactMarkdown from "react-markdown";

export default function Content({
    categorias,
    textos,
}: Readonly<{ categorias: Categoria[]; textos: Texto[] }>) {
    return (
        <section className={styles.content}>
            <div>
                {categorias.map((categoria) => (
                    <Sidebar key={categoria.id} categoria={categoria} />
                ))}
            </div>
            <div>
                {textos.map((texto) => (
                    <>
                        <ReactMarkdown>{texto.corpo}</ReactMarkdown>
                        <hr />
                    </>
                ))}
            </div>
            <div className={styles.infoBar}></div>
        </section>
    );
}
