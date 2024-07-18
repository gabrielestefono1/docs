import { Head } from "@inertiajs/react";
import { ReactNode, useContext, useEffect } from "react";
import Header from "../Components/header";
import styles from "./layout.module.scss";
import Sidebar from "../Components/sidebar";
import InfoBar from "../Components/infoBar";
import { OrdemContext } from "../contexts/OrdemContext";
import { Ordem } from "../interfaces/OrdenacaoGeral";
import favicon from '../images/favicon.ico';

export default function Layout({
    children,
    title,
    ordens,
}: Readonly<{ children: ReactNode; title: string; ordens: Ordem[] }>) {
    const body = document.body;
    body.className = "spring";

    const { setData } = useContext(OrdemContext);
    useEffect(() => {
        setData(ordens);
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
    }, [setData]);
    return (
        <>
            <Head title={title} />
            <Header />
            <section className={styles.layout}>
                <Sidebar />
                <div className={styles.content}>
                    {children}
                    <InfoBar />
                </div>
            </section>
            <div>Footer</div>
        </>
    );
}
