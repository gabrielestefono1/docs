import { Link, usePage } from "@inertiajs/react";
import styles from "./index.module.scss";
import { Fragment, useContext } from "react";
import { OrdemContext } from "@/spring/contexts/OrdemContext";
import Breadcrumb from "./Breadcrumb";
import ReactMarkdown from "react-markdown";
import { Ordenavel, TextoOrdenacao } from "@/spring/interfaces/OrdenacaoGeral";

interface MainProps {
    objetoAtual: Ordenavel;
    textos?: TextoOrdenacao[];
}

export default function Main({ objetoAtual, textos }: Readonly<MainProps>) {
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
                {textos?.map((texto) => (
                    <Fragment key={texto.texto.id}>
                        <h2>{texto.texto.titulo}</h2>
                        <ReactMarkdown>{texto.texto.descricao}</ReactMarkdown>
                    </Fragment>
                ))}
                {(objetoAtual.titulo_anterior ||
                    objetoAtual.titulo_proximo) && (
                    <div className={styles.navigation}>
                        <div className={styles.anterior}>
                            {objetoAtual.titulo_anterior && (
                                <>
                                    <span>Anterior</span>
                                    <div>
                                        <div></div>
                                        <a href={objetoAtual.slug_anterior}>
                                            {objetoAtual.titulo_anterior}
                                        </a>
                                    </div>
                                </>
                            )}
                        </div>
                        <div className={styles.proximo}>
                            {objetoAtual.titulo_proximo && (
                                <>
                                    <span>Próximo</span>
                                    <div>
                                        <a href={objetoAtual.slug_proximo}>
                                            {objetoAtual.titulo_proximo}
                                        </a>
                                        <div></div>
                                    </div>
                                </>
                            )}
                        </div>
                    </div>
                )}
            </div>
        </div>
    );
}
