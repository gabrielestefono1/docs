import { Categoria, Texto } from "@/react/Pages/Welcome";
import Sidebar from "../sidebar";
import styles from "./content.module.scss";
import ReactMarkdown from "react-markdown";
import Main from "../main";

export default function Content() {
    {/* <ReactMarkdown>{texto.corpo}</ReactMarkdown> */}
    return (
        <section className={styles.content}>
            <div className={styles.sidebar}></div>
            <div className={styles.content}>
                <Main/>
                <div className={styles.info}></div>
            </div>
        </section>
    );
}
