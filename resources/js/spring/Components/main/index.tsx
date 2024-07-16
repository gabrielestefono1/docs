import { Link, usePage } from "@inertiajs/react";
import styles from "./index.module.scss";
import { useContext } from "react";
import { OrdemContext } from "@/spring/contexts/OrdemContext";
import Breadcrumb from "./Breadcrumb";
import ReactMarkdown from "react-markdown";
import { Ordenavel } from "@/spring/interfaces/OrdenacaoGeral";

interface MainProps{
    objetoAtual: Ordenavel;
}

export default function Main({objetoAtual}: Readonly<MainProps>) {
    const { data } = useContext(OrdemContext);
    const { url } = usePage();
    const itemAtual = data.find((el) => url.includes(el.ordenavel.slug));
    return (
        <div className={styles.main}>
            <div>
                <Link href="/">Spring Framework</Link>
                <Breadcrumb
                    titulo={itemAtual?.ordenavel.titulo ?? ""}
                    filhos={itemAtual?.ordenavel.ordenacao_grupo}
                    slug={itemAtual?.ordenavel.slug ?? ""}
                />
            </div>
            <div>
                <h1>{objetoAtual.titulo}</h1>
                <ReactMarkdown>{objetoAtual.descricao}</ReactMarkdown>
                <ReactMarkdown>{objetoAtual.descricao}</ReactMarkdown>
            </div>
        </div>
    );
}
