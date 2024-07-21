import { Head } from "@inertiajs/react";
import { ReactNode, useContext, useEffect } from "react";
import Header from "../Components/header";
import styles from "./layout.module.scss";
import Sidebar from "../Components/sidebar";
import InfoBar from "../Components/infoBar";
import { OrdemContext } from "../contexts/OrdemContext";
import { TituloContext } from "../contexts/TitulosContext";
import { Ordem, Titulo } from "../interfaces/OrdenacaoGeral";
import favicon from "../images/favicon.ico";

interface LayoutProps {
    children: ReactNode;
    title: string;
    ordens: Ordem[];
    titulos: Titulo[];
    pagina: string;
}

export default function Layout({
    children,
    title,
    ordens,
    titulos,
    pagina,
}: Readonly<LayoutProps>) {
    const body = document.body;
    body.className = "spring";

    const { setData: setOrdem } = useContext(OrdemContext);

    const { setData: setTitulos } = useContext(TituloContext);

    useEffect(() => {
        setOrdem(ordens);
        setTitulos(titulos);
        const head = document.head;
        let link = document.createElement("link");
        let oldLink = document.getElementById("dynamic-link");
        if (oldLink) {
            head.removeChild(oldLink);
        }
        link.rel = "icon";
        link.type = "image/x-icon";
        link.href = favicon;
        link.id = "dynamic-link";
        head.appendChild(link);
    }, [setOrdem, setTitulos]);

    return (
        <>
            <Head title={title} />
            <Header />
            <section className={styles.layout}>
                <Sidebar />
                <div className={styles.content}>
                    {children}
                    <InfoBar pagina={pagina}/>
                </div>
            </section>
            <div>Footer</div>
        </>
    );
}
